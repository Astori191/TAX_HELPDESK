<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets\css\signin.css" rel="stylesheet">
  <title>Авторизация</title>
</head>

<body class="text-center">
  <main class="form-signin">
    <div class="row">
      <div class="bg-light p-3 border">
        <form method="post" action="/auth.php">
          <img class="mb-4" src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" width="200" height="100">
          <h1 class="h3 mb-3 fw-normal">АВТОРИЗАЦИЯ</h1>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{3}" id="floatingInput" name="login" placeholder="name@example.com">
            <label for="floatingInput">Логин</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me" name="remember_me"> Запомнить меня</input>
            </label>
          </div>
          <button class="btn btn-primary btn-lg btn w-100" type="submit" name="btn_submit_auth">Войти</button>
          <p>
            <?php
            if ($_SESSION['message']) {
              echo '<div class="validation-msg" id="message"> ' . $_SESSION['message'] . ' </div>';
            }
            unset($_SESSION['message']);
            ?>
          </p>
          <p class="mt-3 text-muted">&copy; <?php echo date("Y"); ?>, Портал технической поддержки ИФНС России № 30 по г. Москве</p>
        </form>
      </div>
    </div>
  </main>
</body>

</html>

<script>
  setTimeout(function() {
    document.getElementById('message').style.display = 'none';
  }, 5000);
</script>