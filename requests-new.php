<?php include './includes/header.php' ?>
<main class="flex-shrink-0">
  <div class="container">
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Создать обращение
        </button>
        <!-- <button class="btn btn-primary" type="button">Создать обращение</button> -->
        <button class="btn btn-primary" type="button">Обновить</button>
        <button class="btn btn-primary" type="button">Фильтр обращений</button>
      </div>
    </div>
    <div class="request-table">
      <table class="table table-bordered table-striped table-hover mt-4">
        <thead>
          <tr>
            <th scope="col">Номер</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Приоритет</th>
            <th scope="col">Наименование услуги</th>
            <th scope="col">Описание</th>
            <th scope="col">Этап</th>
            <th scope="col">Исполнитель</th>
            <th scope="col">Заявитель</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr>
          <!-- <tr>
            <th scope="row">2</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>21.12.2012</td>
            <td>Высокий</td>
            <td>Рабочие станции</td>
            <td>Не включается компьютер</td>
            <td>Выполнение</td>
            <td>Степанов Алексей Сергеевич</td>
            <td>Гаранина Мария Петровна</td>
          </tr> -->
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
            <label class="form-label fw-bold">Категория</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Выберите из списка</option>

              <?php
              $category_res = get_maintenance_categories($conn);

              while ($row = mysqli_fetch_array($category_res)) {
                echo "<optgroup label='{$row["maintenances_categories_type"]}'>";

                $main_res = get_maintenances($conn, $row["maintenances_categories_id"]);
                while ($row2 = mysqli_fetch_array($main_res)) {
                  echo "<option value='{$row2["id"]}'>{$row2["name"]}</option>";
                }
                echo "</optgroup>";
              }
              ?>

            </select>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Приоритет</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Выберите из списка</option>

              <?php
              $priorities = get_priorities($conn);
              while ($row = mysqli_fetch_array($priorities)) {
                echo "<option value='{$row["id"]}'>{$row["kind"]}</option>";
              }
              ?>

            </select>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Описание проблемы</label>
            <textarea class="form-control txtarea" id="exampleFormControlTextarea1" rows="4"></textarea>
          </div>
          <div class="mb-3">
            <?php if (isset($_SESSION['login'])) {
              echo "<label class='form-label fw-bold'>Автор</label>
              <span class='input-group-text' id='inputGroup-sizing-default'>{$_SESSION["user_name"]} ({$_SESSION["login"]}) </span>";
            }
            ?>
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