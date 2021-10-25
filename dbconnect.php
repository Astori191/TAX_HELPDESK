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
        users.id as user_id,
        users.name as user_name,
        users.login as user_login,
        roles.id as role_id,
        roles.ui_name as role_name
    FROM users 
        left join roles on users.role = roles.id
    WHERE
        users.login ='" . $login . "' and users.password ='" . $password . "'";

    $res = $conn->query($query);
    return $res->fetch_assoc();
}

function get_news($conn){ 
    $query = "
    SELECT
        news.id as id,
        news.title as title,
        news.content as content,
        news.created_by as created_by,
        news.created_when as created_when,
        news.image_name as image_name
    FROM news LIMIT 6";

    return mysqli_query($conn, $query);
}

function get_selected_news_post($conn, $id)
{
    $query = "
    SELECT 
        news.id           as news_id,
        news.title        as news_title,
        news.content      as news_content,
        news.created_by   as news_created_by,
        news.created_when as news_created_when,
        news.image_name   as news_image_name,
        users.name        as user_name
    FROM news
        LEFT JOIN users 
            ON news.created_by = users.id
    WHERE
        news.id =" . $id;

    $res = $conn->query($query);
    return $res->fetch_assoc();
}


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = db_open();
