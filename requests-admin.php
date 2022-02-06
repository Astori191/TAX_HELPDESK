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
            $result = get_all_requests($conn);

            while ($row = mysqli_fetch_array($result)) {
              echo "
              <tr>
                <td width='96'>2021-000{$row["request_id"]}</td>
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
  </div>
</main>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">СОЗДАНИЕ ОБРАЩЕНИЯ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Дата создания</label>
            <input class="form-control" type="date" placeholder="Default input" aria-label="default input example">
          </div>
          <div class="mb-3">
            <label class="form-label">Категория</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Выберите из списка</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Исполнитель</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Выберите из списка</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Описание проблемы</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Заявитель</label>
            <input type="text" class="form-control" id="formGroupExampleInput">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Создать</button>
      </div>
    </div>
  </div>
</div>
<div class="d-flex mt-auto p-2 justify-content-center">
  <h6></h6>
</div>
<?php include './includes/footer.php'; ?>