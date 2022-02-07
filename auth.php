<?php
session_start();
include 'dbconnect.php';
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$result = get_user($conn, $login);
if (password_verify($pass, $result['user_hash'])) {
    $_SESSION['login'] = $login;
    $_SESSION['user_id'] = $result['user_id'];
    $_SESSION['user_name'] = $result['user_name'];
    $_SESSION['role_id'] = $result['role_id'];
    $_SESSION['role_name'] = $result['role_name'];
    header('Location: /index.php');
} else {
    $_SESSION['login'] = '';
    $_SESSION['user_id'] = '';
    $_SESSION['user_name'] = '';
    $_SESSION['role_id'] = '';
    $_SESSION['role_name'] = '';
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: /signin.php');
    echo 'Неверный логин или пароль';
}
