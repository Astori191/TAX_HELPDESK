<?php
function db_open()
{
    $servername = "localhost";
    $username = "Master";
    $password = "wyyCdpXf7l8lS2fy";
    $database = "taxhelpdesk";
    $db_connection = new mysqli($servername, $username, $password, $database);

    if ($db_connection->connect_error) {
        die("Connection failed: " . $db_connection->connect_error);
    }

    return $db_connection;
}

function db_close($db_connection)
{
    mysqli_close($db_connection);
}

function get_user($conn, $login, $password)
{
    $query = "
    SELECT 
        users.id      as user_id,
        users.name    as user_name,
        users.login   as user_login,
        roles.id      as role_id,
        roles.ui_name as role_name
    FROM users 
        LEFT JOIN roles on users.role = roles.id
    WHERE
        users.login ='" . $login . "' and users.password ='" . $password . "'";

    $res = $conn->query($query);
    return $res->fetch_assoc();
}

function get_all_news($conn)
{
    $query = "
    SELECT
        news.id                 as id,
        news.news_type_id       as nt_id,
        news.title              as title,
        news.content            as content,
        news.created_by         as created_by,
        news.created_when       as created_when,
        news_types.news_head_id as news_types_head_id
    FROM 
        news    
    LEFT JOIN news_types 
        ON news.news_type_id = news_types.id
    LEFT JOIN news_heads
        ON news_types.news_head_id = news_heads.id
    ORDER BY created_when DESC
    LIMIT 10";
    return mysqli_query($conn, $query);
}

function get_news($conn, $news_type)
{
    $cond = "";
    if ($news_type == 1) {
        $cond = "news.news_type_id IN ('1', '2','3','4')";
    }
    if ($news_type == 2) {
        $cond = "news.news_type_id IN ('5', '6')";
    }
    if ($news_type == 3) {
        $cond = "news.news_type_id IN ('7', '8')";
    }
    $query = "
    SELECT
        news.id                 as id,
        news.news_type_id       as nt_id,
        news.title              as title,
        news.content            as content,
        news.created_by         as created_by,
        news.created_when       as created_when,
        news_types.news_head_id as news_types_head_id
    FROM 
        news    
    LEFT JOIN news_types 
        ON news.news_type_id = news_types.id
    LEFT JOIN news_heads
        ON news_types.news_head_id = news_heads.id
    WHERE
        {$cond} AND news_types.news_head_id = {$news_type}
        ORDER BY created_when DESC
        LIMIT 5";
    return mysqli_query($conn, $query);
}

function get_selected_news_post($conn, $id)
{
    $query = "
    SELECT 
        news.id                 as news_id,
        news.news_type_id       as nt_id,
        news.title              as news_title,
        news.content            as news_content,
        news.created_by         as news_created_by,
        news.created_when       as news_created_when,
        users.name              as user_name,
        news_types.description  as news_description,
        news_heads.name         as news_heads_name
    FROM news
        LEFT JOIN users 
            ON news.created_by = users.id
        LEFT JOIN news_types
            ON news.news_type_id = news_types.id
        LEFT JOIN news_heads
            ON news_types.news_head_id = news_heads.id
    WHERE
        news.id =" . $id;

    $res = $conn->query($query);
    return $res->fetch_assoc();
}

/* SELECT 
	CONCAT(maintenances_categories.type, ' ', maintenances.name) as fullname
FROM `maintenances_categories`
left JOIN maintenances on maintenances_categories.id = maintenances.part_of */

function get_maintenance_categories($conn)
{
    $query = "
        SELECT
            maintenances_categories.id   as maintenances_categories_id,
            maintenances_categories.type as maintenances_categories_type
        FROM 
            maintenances_categories
        ";

    return mysqli_query($conn, $query);
}

function get_maintenances($conn, $category_id)
{
    $query = "
        SELECT
            maintenances.id,
            maintenances.name
        FROM 
            maintenances
        WHERE
            maintenances.part_of = {$category_id}
        ";

    return mysqli_query($conn, $query);
}

function get_priorities($conn)
{
    $query = "
        SELECT
            priorities.id,
            priorities.kind
        FROM
            priorities
    ";
    return mysqli_query($conn, $query);
}

function get_roles($conn)
{
    $query = "
        SELECT 
            * 
        FROM 
            roles
    ";
    return mysqli_query($conn, $query);
}

function get_selected_user($conn, $id)
{
    $query = "
    SELECT
        users.id            as users_id, 
        users.name          as users_name, 
        users.role          as users_role, 
        users.login         as users_login, 
        users.password      as users_password, 
        users.position_id   as users_position_id, 
        users.N_cab         as users_N_cab, 
        users.N_Tel         as users_N_Tel, 
        users.N_Tel_ip      as users_N_Tel_ip, 
        users.mail_to       as users_mail_to, 
        users.department_id as users_department_id,
        positions.name      as users_position_name,
        departments.name    as users_departments_name,
        roles.ui_name       as roles_ui_name
    FROM 
        users 
    LEFT JOIN roles 
        ON users.role = roles.id
    LEFT JOIN positions
        ON users.position_id = positions.id
    LEFT JOIN departments
        ON users.department_id = departments.id
    WHERE users.id = {$id}
    ";
    $res = $conn->query($query);
    return $res->fetch_assoc();
}

function get_selected_request($conn, $id)
{
    $query = "
        SELECT
            requests.id             as request_id,
            requests.created_when   as requests_created_when,
            requests.maintenance_id as requests_maintenance_id,
            requests.priority_id    as requests_priority_id,
            requests.record         as requests_record,
            requests.phase_id       as requests_phase_id,
            requests.assignee_id    as requests_assignee_id,
            requests.created_by     as requests_created_by,
            maintenances.name       as maintenances_name,
            priorities.kind         as priorities_kind,
            phases.name             as phases_name,
            users1.name             as users1_name,
            users2.name 			as users2_name
        FROM
            requests
        LEFT JOIN maintenances
            ON requests.maintenance_id = maintenances.id
        LEFT JOIN priorities
            ON requests.priority_id = priorities.id
        LEFT JOIN phases
            ON requests.phase_id = phases.id
        LEFT JOIN users as users1
            ON requests.assignee_id = users1.id 
        LEFT JOIN users as users2
            ON requests.created_by = users2.id
        WHERE 
            requests.id = {$id}
        ";

    $res = $conn->query($query);
    return $res->fetch_assoc();
}

function get_all_requests($conn)
{
    $query = "
        SELECT
            requests.id             as request_id,
            requests.created_when   as requests_created_when,
            requests.maintenance_id as requests_maintenance_id,
            requests.priority_id    as requests_priority_id,
            requests.record         as requests_record,
            requests.phase_id       as requests_phase_id,
            requests.assignee_id    as requests_assignee_id,
            requests.created_by     as requests_created_by,
            maintenances.name       as maintenances_name,
            priorities.kind         as priorities_kind,
            phases.name             as phases_name,
            users1.name             as users1_name,
            users2.name 			as users2_name
        FROM
            requests
        LEFT JOIN maintenances
            ON requests.maintenance_id = maintenances.id
        LEFT JOIN priorities
            ON requests.priority_id = priorities.id
        LEFT JOIN phases
            ON requests.phase_id = phases.id
        LEFT JOIN users as users1
            ON requests.assignee_id = users1.id 
        LEFT JOIN users as users2
            ON requests.created_by = users2.id
        ORDER BY requests_created_when DESC
        ";
    return mysqli_query($conn, $query);
}

function get_requests_for_user($conn, $cur_user_id, $fil1, $fil2, $fil3, $fil4, $fil5, $fil6)
{
    $filter = "";

    if (!$fil1 && !$fil2 && !$fil3 && !$fil4 && !$fil5 && !$fil6) {
        $filter = "1 = 1";
    } else {
        $filter = $filter . "(";
        if ($fil1) {
            $filter = $filter . "requests.phase_id = 4 OR ";
        }
        if ($fil2) {
            $filter = $filter . "requests.phase_id = 3 OR ";
        }
        if ($fil3) {
            $filter = $filter . "requests.phase_id = 5 OR ";
        }
        if ($fil4) {
            $filter = $filter . "requests.phase_id = 6 OR ";
        }
        if ($fil5) {
            $filter = $filter . "requests.phase_id = 1 OR ";
        }
        if ($fil6) {
            $filter = $filter . "requests.phase_id = 7 OR ";
        }
        $filter = $filter . "1 != 1)";
    }

    $query = "
    SELECT
        requests.id             as request_id,
        requests.created_when   as requests_created_when,
        requests.maintenance_id as requests_maintenance_id,
        requests.priority_id    as requests_priority_id,
        requests.record         as requests_record,
        requests.phase_id       as requests_phase_id,
        requests.assignee_id    as requests_assignee_id,
        requests.created_by     as requests_created_by,
        maintenances.name       as maintenances_name,
        priorities.kind         as priorities_kind,
        phases.name             as phases_name,
        users1.name             as users1_name,
        users2.name 			as users2_name
    FROM
        requests
    LEFT JOIN maintenances
        ON requests.maintenance_id = maintenances.id
    LEFT JOIN priorities
        ON requests.priority_id = priorities.id
    LEFT JOIN phases
        ON requests.phase_id = phases.id
    LEFT JOIN users as users1
        ON requests.assignee_id = users1.id 
    LEFT JOIN users as users2
        ON requests.created_by = users2.id
    WHERE
        requests.created_by = '{$cur_user_id}' AND {$filter}
    ";

    return mysqli_query($conn, $query);
}

function get_messages($conn, $id)
{
    $query = "
    SELECT 
        requests_history.id              as rh_id,
        requests_history.request_id      as rh_request_id,
        requests_history.message_type_id as rh_message_type,
        requests_history.message         as rh_message,
        requests_history.created_by      as rh_created_by,
        requests_history.mcreated_when   as rh_mcreated_when,
        requests.maintenance_id          as requests_maintenance_id,
        maintenances.name                as maintenances_name,
        phases.name                      as phases_name,
        users.name                       as users_name,
        users.login                      as users_login,
        requests.phase_id                as rh_phase_id
    FROM 
        requests_history
    LEFT JOIN requests 
        ON requests_history.request_id = requests.id
    LEFT JOIN users
        ON requests_history.created_by = users.id
    LEFT JOIN phases
        ON requests_history.message_type_id = phases.id
    LEFT JOIN maintenances
        ON requests.maintenance_id = maintenances.id
    WHERE 
        requests_history.request_id = {$id}
    ";
    return mysqli_query($conn, $query);
}

function take_on_exec($conn)
{
    $query = "";
    $conn->query($query);
}

function get_phases($conn)
{
    $query = "
    SELECT 
        phases.id,
        phases.name
    FROM 
        phases
        WHERE phases.id != 1 AND phases.id != 2
    ";
    return mysqli_query($conn, $query);
}

function add_request_history_item($conn, $request_id, $message_type_id, $message, $created_by, $created_when)
{
    $query = "
    INSERT INTO `requests_history` (`id`, `request_id`, `message_type_id`, `message`, `created_by`, `mcreated_when`) 
    VALUES (NULL, '$request_id', '$message_type_id', '$message', '$created_by', '$created_when')";

    return mysqli_query($conn, $query);
}

function change_request_stage($conn, $stage_id, $request_id)
{
    $query = "
    UPDATE `requests` SET `phase_id` = '$stage_id' WHERE `id` = '$request_id'";
    return mysqli_query($conn, $query);
}

function take_request_on_execution($conn, $prequest_id, $pmessage_type_id, $pnew_message, $pcreated_by, $pcreated_when)
{
    $query = "
    INSERT INTO `requests_history` (`id`, `request_id`, `message_type_id`, `message`, `created_by`, `mcreated_when`) 
    VALUES (NULL, '$prequest_id', '$pmessage_type_id', '$pnew_message', '$pcreated_by', '$pcreated_when')";
    return mysqli_query($conn, $query);
}

function change_request_stage_on_execution($conn, $pcreated_by, $prequest_id)
{
    $query = "
    UPDATE `requests` SET `phase_id` = '2', `assignee_id` = '$pcreated_by' WHERE `id` = '$prequest_id'
    ";
    return mysqli_query($conn, $query);
}

function show_phonebook($conn, $sdepartments_id)
{
    $query = "
    SELECT 
        users.id            as users_id,
        users.name          as users_name,
        users.position_id   as users_position_id,
        users.N_cab         as users_N_cab,
        users.N_Tel         as users_N_Tel,
        users.N_Tel_ip      as users_N_Tel_ip,
        users.mail_to       as users_mail_to,
        users.department_id as users_department_id,
        positions.name      as users_position_name,
        departments.name    as users_departments_name
    FROM 
        users
    LEFT JOIN positions 
        ON users.position_id = positions.id
    LEFT JOIN departments
        ON users.department_id = departments.id
    WHERE 
        users.department_id = {$sdepartments_id} AND users.id != 1 AND users.id != 2
        ORDER BY users_position_id ASC
    ";
    return mysqli_query($conn, $query);
}

function get_departments($conn)
{
    $query = "
    SELECt
        departments.id as departments_id,
        departments.name as departments_name
    FROM
        departments";

    return mysqli_query($conn, $query);
}

function get_positions($conn)
{
    $query = "
    SELECT
        positions.id as positions_id,
        positions.name as positions_name
    FROM
        positions";
    return mysqli_query($conn, $query);
}

function get_news_types($conn)
{
    $query = "
    SELECT 
        * 
    FROM 
        news_types";
    return mysqli_query($conn, $query);
}



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = db_open();

/* <form class="form-floating">
  <input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com">
  <label for="floatingInputInvalid">Invalid input</label>
</form> */