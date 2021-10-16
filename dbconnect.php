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

$conn = db_open();
