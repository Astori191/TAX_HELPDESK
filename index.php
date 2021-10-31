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
    <div class="row mt-4">
      <div class="col-6 ps-0">
        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">НОВОСТИ АИС</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">МАССОВЫЕ ПРОБЛЕМЫ </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">НОВОСТИ
              ПОРТАЛА</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <?php
            $result = get_news($conn, 1);

            while ($row = mysqli_fetch_array($result)) {
              $image_name = "";
              if ($row["nt_id"] == 1 || $row["nt_id"] == 3) {
                $image_name = 'id_1_problem.jpg';
              }
              if ($row["nt_id"] == 2 || $row["nt_id"] == 4) {
                $image_name = 'id_2_fixed.jpg';
              }
              if ($row["nt_id"] == 3 || $row["nt_id"] == 3) {
                $image_name = 'id_1_problem.jpg';
              }
              if ($row["nt_id"] == 4 || $row["nt_id"] == 4) {
                $image_name = 'id_2_fixed.jpg';
              }
              echo "
                <div class='row mb-3'>
                  <div class='d-flex'>
                    <a href='news-view.php?id={$row["id"]}'>
                      <img class='me-2' style='width: 70px; height: 70px;' src='includes/news/{$image_name}'>
                    </a>
                    <div class='d-flex flex-column justify-content-between '>
                      <h6 class='text-primary'>{$row["title"]}</h6>
                      <div>" . date_format(date_create($row["created_when"]), 'd.m.Y H:i:s') . "</div>
                    </div>
                  </div>
                </div>";
            }
            ?>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <?php
            $result = get_news($conn, 2);

            while ($row = mysqli_fetch_array($result)) {
              $image_name = "";
              if ($row["nt_id"] == 5) {
                $image_name = 'id_5_fixed.jpg';
              }
              if ($row["nt_id"] == 6) {
                $image_name = 'id_6_fixed.jpg';
              }
              echo "
                <div class='row mb-3'>
                  <div class='d-flex'>
                    <a href='news-view.php?id={$row["id"]}'>
                      <img class='me-2' style='width: 70px; height: 70px;' src='includes/news/{$image_name}'>
                    </a>
                    <div class='d-flex flex-column justify-content-between'>
                      <h6 class='text-primary'>{$row["title"]}</h6>
                      <div>" . date_format(date_create($row["created_when"]), 'd.m.Y H:i:s') . "</div>
                    </div>
                  </div>
                </div>";
            }
            ?>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <?php
            $result = get_news($conn, 3);

            while ($row = mysqli_fetch_array($result)) {
              $image_name = "";
              if ($row["nt_id"] == 7) {
                $image_name = 'id_7_fixed.jpg';
              }
              if ($row["nt_id"] == 8) {
                $image_name = 'id_8_info.jpg';
              }
              echo "
                <div class='row mb-3'>
                  <div class='d-flex'>
                    <a href='news-view.php?id={$row["id"]}'>
                      <img class='me-2' style='width: 70px; height: 70px;' src='includes/news/{$image_name}'>
                    </a>
                    <div class='d-flex flex-column justify-content-between'>
                      <h6 class='text-primary'>{$row["title"]}</h6>
                      <div>" . date_format(date_create($row["created_when"]), 'd.m.Y H:i:s') . "</div>
                    </div>
                  </div>
                </div>";
            }
            ?>
          </div>
        </div>
        <div style="text-align: right">
          <a href="index.php" class="link-primary">Все новости</a>
        </div>
      </div>
      <div class="col-1"></div>
      <div class="col-5">
        <h4>РАЗДЕЛЫ</h4>
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="d-flex p-3 align-items-center">
                <div class="d-flex me-3 justify-content-center right-section">
                  <a href="requests-new.php"><span class="icon icon-req"></span></a>
                  <!-- <a href="requests-new.php"><img src="assets/img/blue/mail.svg" class="section-logo-main"></a> -->
                </div>
                <div class="item-text">Обращения</div>
              </div>
            </div>
            <div class="row">
              <div class="d-flex p-3 align-items-center">
                <div class="d-flex me-3 justify-content-center right-section">
                  <a href="requests-admin.php"><span class="icon icon-admin"></span></a>
                  <!-- <a href="#"><img src="assets/img/blue/admin.svg" class="section-logo-main"></a> -->
                </div>
                <div class="item-text">Кабинет исполнителя</div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <div class="d-flex p-3 align-items-center">
                <div class="d-flex me-3 justify-content-center right-section">
                  <a href="helpers.php"><span class="icon icon-knowledge"></span></a>
                  <!-- <a href="#"><img src="assets/img/blue/knowledge.svg" class="section-logo-main"></a> -->
                </div>
                <div class="item-text">База знаний</div>
              </div>
            </div>
            <div class="row">
              <div class="d-flex p-3 align-items-center">
                <div class="d-flex me-3 justify-content-center right-section">
                  <a href="phonebook.php"><span class="icon icon-phonebook"></span></a>
                  <!-- <a href="#"><img src="assets/img/blue/contact-book.svg" class="section-logo-main"></a> -->
                </div>
                <div class="item-text">Телефонный справочник</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
  <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
</div>
<?php include './includes/footer.php'; ?>