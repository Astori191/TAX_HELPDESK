<?php include_once './dbconnect.php'; ?>
<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: /signin.php');
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/hover.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <title>Личный кабинет заявителя</title>
</head>

<body class="d-flex flex-column h-100">
  <nav class="navbar navbar-dark bg-primary navbar-expand-md">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link nav-link-my" aria-current="page" href="index.php">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-my" href="requests-new.php">Обращения</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-my" href="requests-admin.php">Кабинет исполнителя</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-my" href="phonebook.php">Телефонный справочник</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-my" href="helpers.php">База знаний</a>
          </li>
        </ul>
        <?php if (isset($_SESSION['login'])) {
          echo "<span class='navbar-text me-2 cur-user'>{$_SESSION["user_name"]} ({$_SESSION["role_name"]})</span>
          <span class='navbar-text'>
            <a href='logout.php' class='logout-link'>Выйти</a>
          </span>";
        }

        ?>
      </div>
    </div>
  </nav>