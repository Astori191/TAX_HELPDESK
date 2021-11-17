<?php include './includes/header-requests.php' ?>
<main class="flex-shrink-0">
  <div class="container-fluid">
    <div class="row bottom-line pb-3">
      <div class="col">
        <div class="d-flex p-2 align-items-center mt-2">
          <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
          <!-- <div class="logo-text">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br> ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</div> -->
          <h4>ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
        </div>
      </div>
    </div>
    <div class="row pt-3 bottom-line pb-3">
      <div class="d-grid gap-2 d-md-block">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
          Создать обращение
        </button>
        <button class="btn btn-primary" type="button" onClick="window.location.reload( true );">Обновить</button>
        <button class="btn btn-primary" type="button">Фильтр обращений</button>
      </div>
    </div>
    <div class="row">
      <div class="table-responsive p-0">
        <table class="table table-bordered table-striped table-hover mt-4">
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
            $result = get_all_requests($conn);

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
            <td>2021-000{$row["request_id"]}</th>
            <td>" . date_format(date_create($row["requests_created_when"]), 'd.m.Y H:i:s') . "</td>
            <td>
            {$row["priorities_kind"]}
            </td>
            <td>{$row["maintenances_name"]}</td>
             <td class='dots'><span>{$row["requests_record"]}</span></td> 
            <td><span class='{$badge}'>{$row["phases_name"]}</span></td>
            <td>{$row["users_name"]}</td>
            <td><a class='btn btn-outline-primary btn-sm'href='request-view.php?id={$row["request_id"]}' class='text-decoration-none'>Открыть</a></td>
          </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
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
            <select class="form-select" name="mn_id" aria-label="Default select example">
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
  <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
</div>
<?php include './includes/footer.php'; ?>