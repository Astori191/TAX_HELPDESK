<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function db_open()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "taxhelpdesk";

    // Create connection
    $db_connection = new mysqli($servername, $username, $password, $database);

    // Check connection
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

function get_news($conn, $news_type)
{
    $cond = "";
    if ($news_type == 1) {
        $cond = "news.news_type_id = 1 OR news.news_type_id = 2 OR news.news_type_id = 3 OR news.news_type_id = 4";
    }
    if ($news_type == 2) {
        $cond = "news.news_type_id = 5 OR news.news_type_id = 6";
    }
    if ($news_type == 3) {
        $cond = "news.news_type_id = 7 OR news.news_type_id = 8";
    }

    $query = "
    SELECT
        news.id            as id,
        news.news_type_id  as nt_id,
        news.title         as title,
        news.content       as content,
        news.created_by    as created_by,
        news.created_when  as created_when,
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
        LIMIT 6";

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
            maintenances_categories.id as maintenances_categories_id,
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

/* function get_all_requests($conn)
{
    $query = "
    SELECT
        requests.id as requests_id,
        requests.created_when as requests_created_when,
        requests.priority_id as requests_priority_id,
        requests.maintenance_id as requests_maintenance_id,
        requests.record as requests_record,
        requests.phase_id as requests_phase_id,
        requests.assignee_id as requests_assignee_id,
        requests.created_by_id as requests_created_by_id
    FROM requests
        LEFT JOIN priorities
            ON requests.priority_id = priorities.id
        LEFT JOIN 
        LEFT JOIN phases
            ON requests.phase_id = phases.id
        LEFT JOIN users
            ON requests.assignee_id = users.id
    ";
}
 */

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = db_open();
