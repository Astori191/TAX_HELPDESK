<?php
session_start();
include 'dbconnect.php';
$redirect = "";

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$user = get_user($conn, $login, $pass);
if ($user == NULL) {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: /signin.php');
    exit();
}

$_SESSION['login'] = $login;
$_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_name'] = $user['user_name'];
$_SESSION['role_id'] = $user['role_id'];
$_SESSION['role_name'] = $user['role_name'];
header('Location: /index.php');
