<?php include './includes/header-requests.php' ?>
<main class="flex-shrink-0">
  <div class="container-fluid">
    <div class="row bottom-line pb-3">
      <div class="col">
        <div class="d-flex p-2 align-items-center mt-2">
          <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
          <!-- <div class="logo-text">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br> ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</div> -->
          <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
        </div>
      </div>
    </div>
    <div class="row pt-3 bottom-line pb-3">
      <div class="d-grid gap-2 d-md-block">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
          Создать обращение
        </button>
        <button class="btn btn-primary" type="button" onClick="window.location.reload( true );">Обновить</button>
      </div>
    </div>
    <form method="post" action="/auth.php">
      <div class="row mt-3">
        <div class="col-6">
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btncheck1">Завершено</label>

            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btncheck2">Закрытие</label>

            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btncheck3">Уточнение</label>

            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btncheck4">Внешняя линия</label>

            <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btncheck5">Передача данных</label>

            <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btncheck6">Отложенное выполнение</label>

            <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btncheck7">Сбросить фильтр</label>
          </div>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="table-responsive p-0">
        <table class="table table-sm table-bordered table-hover mt-3">
          <thead>
            <tr>
              <th scope="col" class="text-center">Номер</th>
              <th scope="col" class="text-center">Дата создания</th>
              <th scope="col" class="text-center">Приоритет</th>
              <th scope="col" class="text-center">Наименование услуги</th>
              <th scope="col" class="text-center">Описание проблемы</th>
              <th scope="col" class="text-center">Текущий этап</th>
              <th scope="col" class="text-center">Исполнитель текущего этапа</th>
              <th scope="col" class="text-center">Действие</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = get_requests_for_user($conn, $_SESSION["user_id"]);

            while ($row = mysqli_fetch_array($result)) {
              /*{
              $badge = "";
              if ($row["requests_phase_id"] == 1) {
                $badge = 'badge bg-secondary';
              }
              if ($row["requests_phase_id"] == 2 || $row["requests_phase_id"] == 3) {
                $badge = 'badge bg-warning text-dark';
              }
              if ($row["requests_phase_id"] == 4) {
                $badge = 'badge bg-success';
              }
              if ($row["requests_phase_id"] == 6) {
                $badge = 'badge bg-primary';
              } 
              <td class='dots'>
              <span>
              {$row["requests_record"]}
              </span>
              </td> */

              echo "
                <tr>
                  <td width='96'>2021-000{$row["request_id"]}</th>
                  <td width='160'>" . date_format(date_create($row["requests_created_when"]), 'd.m.Y H:i:s') . "</td>
                  <td width='127'>
                    {$row["priorities_kind"]}
                  </td>
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
                  <td width='201'>
                    {$row["phases_name"]}
                  </td>
                  <td>{$row["users1_name"]}</td>
                  <td style='text-align:center;'><a class='btn btn-outline-primary' href='request-view.php?id={$row["request_id"]}' class='text-decoration-none ve'>Открыть</a></td>
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
          <li class="page-item"><a class="page-link" href="#">Предыдущая</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Следующая</a></li>
        </ul>
      </nav>
    </div>
  </div>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">СОЗДАНИЕ ОБРАЩЕНИЯ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="add_request.php">
          <div class="form-group mb-3">
            <label class="form-label fw-bold">Категория</label>
            <select class="form-select" name="mn_id" aria-label="Simple name">
              <option selected>Выберите из списка</option>
              <?php
              $category_res = get_maintenance_categories($conn);
              while ($row = mysqli_fetch_array($category_res)) {
                echo "<optgroup label='{$row["maintenances_categories_type"]}'>";
                $main_res = get_maintenances($conn, $row["maintenances_categories_id"]);
                while ($row2 = mysqli_fetch_array($main_res)) {
                  echo "<option value ='{$row2["id"]}'>{$row2["name"]}</option>";
                }
                echo "</optgroup>";
              }
              ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label fw-bold">Приоритет</label>
            <select class="form-select" name="pr_id" aria-label="Default select example">
              <option selected>Выберите из списка</option>
              <?php
              $priorities = get_priorities($conn);
              while ($row = mysqli_fetch_array($priorities)) {
                echo "<option value='{$row["id"]}'>{$row["kind"]}</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label fw-bold">Описание проблемы</label>
            <textarea class="form-control txtarea" name="rec" id="exampleFormControlTextarea1" rows="4"><?= $precord ?></textarea>
          </div>
          <div class="form-group mb-3">
            <?php if (isset($_SESSION['login'])) {
              echo "<label class='form-label fw-bold'>Автор</label>
              <span class='input-group-text' id='inputGroup-sizing-default'>{$_SESSION["user_name"]} ({$_SESSION["login"]}) </span>";
            }
            ?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Создать</button>
        <!-- <button class="btn btn-primary" type="submit" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Далее</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">СОЗДАНИЕ ОБРАЩЕНИЯ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="input-group">
            <input type="file" class="form-control" id="inputGroupFile01">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Назад</button>
        <button class="btn btn-primary">Создать</button>
      </div>
    </div>
  </div>
</div>





<div class="d-flex mt-auto p-2 justify-content-center">
  <h6></h6>
</div>
<?php include './includes/footer.php'; ?>