<?php include './includes/header-requests.php' ?>
<main class="flex-shrink-0">
  <div class="container-fluid">
    <div class="row bottom-line pb-3">
      <div class="col">
        <div class="d-flex p-2 align-items-center mt-2">
          <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
          <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
        </div>
      </div>
    </div>
    <div class="row pt-3 bottom-line pb-3">
      <div class="d-grid gap-2 d-md-block">
        <button class="btn btn-primary" type="button" onClick="window.location.reload( true );">Обновить</button>
      </div>
    </div>
    <form method="get" action="/requests-admin.php">
      <div class="row mt-3">
        <div class="col-6">
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" name="fil1" id="btncheck1" <?php echo $_GET["fil1"] ? "checked" : "" ?> onChange="this.form.submit()">
            <label class="btn btn-outline-secondary" for="btncheck1">Завершено</label>

            <input type="checkbox" class="btn-check" name="fil2" id="btncheck2" <?php echo $_GET["fil2"] ? "checked" : "" ?> onChange="this.form.submit()">
            <label class="btn btn-outline-secondary" for="btncheck2">Закрытие</label>

            <input type="checkbox" class="btn-check" name="fil3" id="btncheck3" <?php echo $_GET["fil3"] ? "checked" : "" ?> onChange="this.form.submit()">
            <label class="btn btn-outline-secondary" for="btncheck3">Уточнение</label>

            <input type="checkbox" class="btn-check" name="fil4" id="btncheck4" <?php echo $_GET["fil4"] ? "checked" : "" ?> onChange="this.form.submit()">
            <label class="btn btn-outline-secondary" for="btncheck4">Внешняя линия</label>

            <input type="checkbox" class="btn-check" name="fil5" id="btncheck5" <?php echo $_GET["fil5"] ? "checked" : "" ?> onChange="this.form.submit()">
            <label class="btn btn-outline-secondary" for="btncheck5">Передача данных</label>

            <input type="checkbox" class="btn-check" name="fil6" id="btncheck6" <?php echo $_GET["fil6"] ? "checked" : "" ?> onChange="this.form.submit()">
            <label class="btn btn-outline-secondary" for="btncheck6">Отложенное выполнение</label>

            <a class="btn btn-outline-secondary" href="/requests-admin.php">Сбросить фильтр</a>
          </div>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="table-responsive p-0">
        <table class="table table-sm table-bordered table-hover mt-4">
          <thead>
            <tr>
              <th scope="col" class="text-center">Номер</th>
              <th scope="col" class="text-center">Дата создания</th>
              <th scope="col" class="text-center">Приоритет</th>
              <th scope="col" class="text-center">Наименование услуги</th>
              <th scope="col" class="text-center">Описание проблемы</th>
              <th scope="col" class="text-center">Текущий этап</th>
              <th scope="col" class="text-center">Автор</th>
              <th scope="col" class="text-center">Действие</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $per_page = 8;
            list($result, $count) = get_requests_for_admin($conn, $_GET["page"] ?? 0, $per_page, $_GET["fil1"], $_GET["fil2"], $_GET["fil3"], $_GET["fil4"], $_GET["fil5"], $_GET["fil6"]);

            while ($row = mysqli_fetch_array($result)) {
              echo "
              <tr>
                <td width='96'>2022-00{$row["request_id"]}</td>
                <td width='160'>" . date_format(date_create($row["requests_created_when"]), 'd.m.Y H:i:s') . "</td>
                <td width='127'>{$row["priorities_kind"]}</td>
                <td class='dots'>
                  <span title='{$row["maintenances_name"]}'>
                    {$row["maintenances_name"]}
                  </span>
                </td>
                <td class='dots'>
                <span title='{$row["requests_record"]}'>
                  {$row["requests_record"]}
                </span>
              </td> 
                <td width='201'>{$row["phases_name"]}</td>
                <td>{$row["users2_name"]}</td>
                <td style='text-align:center;'><a class='btn btn-outline-primary' href='request-processing.php?id={$row["request_id"]}' class='text-decoration-none ve'>Открыть</a></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <nav aria-label="Page navigation example" class="ps-0">
        <ul class="pagination">
          <?php
          $page_count = ceil($count / $per_page);
          for ($i = 0; $i < $page_count; $i++) {
            if ($i == $_GET["page"]) {
              echo "<li class='page-item active'><a class='page-link' href='?page={$i}'>" . ($i + 1) . "</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link' href='?page={$i}'>" . ($i + 1) . "</a></li>";
            }
          }
          ?>
        </ul>
      </nav>
    </div>
  </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
  <h6></h6>
</div>
<?php include './includes/footer.php'; ?>