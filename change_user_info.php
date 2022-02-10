<?php include './includes/header.php' ?>
<main class="flex-shrink-0">
  <div class="container">
    <div class="row bottom-line pb-3">
      <div class="col">
        <div class="row">
          <div class="col-10">
            <div class="d-flex align-items-center mt-3">
              <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
              <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
            </div>
          </div>
          <div class="col-2 mt-5">
            <a class="btn btn-outline-secondary" href="index.php" role="button">На главную</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <h4 class="main-title">ИЗМЕНИТЬ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ</h4>
    </div>
    <form method="post" action="<?= $_SERVER['SCRIPT_NAME'] ?>" class="d-flex col-5 mt-2">
      <input minlength="3" type="text" class="form-control me-2" name="searching_data" placeholder="Найти по фамилии" required>
      <button class="btn btn-outline-secondary" type="submit" id="liveAlertBtn">Найти</button>
    </form>
    <?php
    if (!empty($_POST)) {

      $s_data = $_POST['searching_data'];
      $query = "SELECT * FROM `users` WHERE `name` LIKE '%$s_data%'";
      $result = mysqli_query($conn, $query);
      $rows = mysqli_num_rows($result);

      if ($result->num_rows > 0) {
        echo "<label class='form-label fw-bold mt-3'>Найдено {$rows} совпадений:</label>";
        while ($row = $result->fetch_assoc()) {
          echo "              
                    <a class='text-decoration-none mb-2' href='user-update.php?id={$row["id"]}'>
                        <div class='news-hover mb-2'>{$row['name']}</div>
                    </a>";
        }
      } else {
        echo "<div class='alert alert-danger mt-3 col-5' id='liveAlertBtn' role='alert'>Соответсвий не найдено</div>";
      }
    }
    ?>
  </div>
</main>

<div class="d-flex mt-auto p-2 justify-content-center">
  <h6></h6>
</div>
<?php include './includes/footer.php'; ?>