<?php include './includes/header.php' ?>

<main class="flex-shrink-0">
  <div class="container">
    <div class="d-flex justify-content-between bottom-line">
      <div class="p-2 bd-highlight">

      </div>
      <div class="pt-3 bd-highlight">
        <p class="fs-3 text-center">Телефонный справочник сотудников <br> ИФНС России № 30 по г. Москве</p>
      </div>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="pt-4 bd-highlight">
          <button onclick="ExportToExcel()" class="btn btn-outline-light border" type="submit" name="btn_submit_export"><img src="assets/img/icons8-microsoft-excel-2019.svg" class="excel-logo me-3" /></button>

        </div>
      </form>
    </div>
    <div class="row mt-3 mb-3 justify-content-center">
      <input class="form-control" type="text" placeholder="Поиск: по ФИО / номеру телефона / коду СОНО" aria-label="Search" id="search-text" onkeyup="tableSearch()">
    </div>
    <div class="row justify-content-center">
      <div class="col-9">
        <table class="table table-sm table-borderless text-center">
          <tbody>
            <?php
            $count = 0;
            $result = get_departments($conn);
            while ($row = mysqli_fetch_array($result)) {
              if ($count == 0) {
                $count++;
                echo
                "
                <tr>
                  <td>
                    <a href='#{$row["departments_id"]}' class='link-primary text-decoration-none'>
                      <div class='news-hover'>{$row["departments_name"]}</div> 
                    </a>  
                  </td>";
              } else if ($count == 1) {
                echo
                "
                  <td>
                    <a href='#{$row["departments_id"]}' class='link-primary text-decoration-none'>
                      <div class='news-hover'>{$row["departments_name"]}</div>  
                    </a>
                  </td>
                </tr>";
                $count = 0;
              }
            }
            ?>
        </table>
      </div>

    </div>
    <div class="row">
      <div class="table-responsive p-0">
        <table class="table" id="tabel">
          <thead>
            <tr style="background-color: #f8f9fa">
              <th scope="col" class="text-center">Должность</th>
              <th scope="col" class="text-center">ФИО</th>
              <th scope="col" class="text-center">№ каб.</th>
              <th scope="col" class="text-center">№ тел. (городской)</th>
              <th scope="col" class="text-center">№ тел. (IP)</th>
              <th scope="col" class="text-center">Электронная почта</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $deps = get_departments($conn);
            while ($row = mysqli_fetch_array($deps)) {
              echo "
            <tr>
                <td colspan='12' class='text-center' style='background-color: #cfe2ff'>
                <a id='{$row["departments_id"]}'</a>
                  {$row["departments_name"]}
                </td>
              </tr>";
              $data = show_phonebook($conn, $row["departments_id"]);
              while ($row2 = mysqli_fetch_array($data)) {
                echo "
              <tr>
                <td>{$row2["users_position_name"]}</td>
                <td>{$row2["users_name"]}</td>
                <td>{$row2["users_N_cab"]}</td>
                <td>{$row2["users_N_Tel"]}</td>
                <td>{$row2["users_N_Tel_ip"]}</td>
                <td>{$row2["users_mail_to"]}</td>
              </tr>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
  <h6></h6>
</div>
<?php include './includes/footer.php'; ?>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
  function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('info-table');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
      flag = false;
      for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
        flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
        if (flag) break;
      }
      if (flag) {
        table.rows[i].style.display = "";
      } else {
        table.rows[i].style.display = "none";
      }
    }
  }

  function ExportToExcel() {
    var elt = document.getElementById('tabel');
    var wb = XLSX.utils.table_to_book(elt, {
      sheet: "sheet1"
    });
    return XLSX.writeFile(wb, 'MySheetName.xlsx');
  }
</script>