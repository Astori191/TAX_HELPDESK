<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\signin.css" rel="stylesheet">
    <title>Авторизация</title>
  </head>
    <body class="text-center">
      <main class="form-signin">
        <form method="post" action="/auth.php">
          <img class="mb-4" src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" alt="" width="200" height="100">
          <h1 class="h3 mb-3 fw-normal">АВТОРИЗАЦИЯ</h1>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="login" placeholder="name@example.com">
            <label for="floatingInput">Логин</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me" name="remember_me"> Запомнить меня</input>
            </label>
          </div>


          <button class="btn btn-primary btn-lg btn w-100" type="submit">Войти</button>
          <p>
            <?php 
              if ($_SESSION['message']){
                echo '<p class="validation-msg"> ' . $_SESSION['message'] . ' </p>';
              }
              unset($_SESSION['message']);
            ?>
        </p>
            <!-- <button class="  btn btn-lg btn-primary" type="submit">Войти</button> -->
          <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?>, Портал технической поддержки ИФНС России № 30 по г. Москве</p>
        </form>
      </main>
    </body>
</html>
