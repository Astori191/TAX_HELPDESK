<?php
    session_start();

    if (isset($_SESSION['login'])) {
        session_destroy();
        $_SESSION = [];
    }

    header("Location: /signin.php");
    die();
?>