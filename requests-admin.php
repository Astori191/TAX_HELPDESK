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
              <th scope="col" class="text-center">Описание</th>
              <th scope="col" class="text-center">Этап</th>
              <th scope="col" class="text-center">Исполнитель</th>
              <th scope="col" class="text-center">Автор</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = get_all_requests($conn);

            while ($row = mysqli_fetch_array($result)) {
              // if ($row["requests_phase_id"] == 1) {
              echo "
              <tr>
                <th scope='row'><a href='request-processing.php?id={$row["request_id"]}' class='text-decoration-none text-'>{$row["request_id"]}</a></th>
                <td>" . date_format(date_create($row["requests_created_when"]), 'd.m.Y H:i:s') . "</td>
                <td>{$row["priorities_kind"]}</td>
                <td>{$row["maintenances_name"]}</td>
                <td>{$row["requests_record"]}</td>
                <td>{$row["phases_name"]}</td>
                <td>{$row["users_name"]}</td>
                <td>{$row["requests_created_by"]}</td>
              </tr>";
              // }
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
  <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
</div>
<?php include './includes/footer.php'; ?>