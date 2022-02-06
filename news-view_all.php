<?php include './includes/header.php' ?>
<main class="flex-shrink-0">
    <div class="container">
        <div class="row bottom-line pb-3">
            <div class="col">
                <div class="d-flex align-items-center mt-3">
                    <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
                    <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-7">
                <div class="news-view-title text-uppercase">Все новости</div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Отображать содержимое
                    </label>
                </div>
                <div class="row mt-4">
                    <?php
                    $result = get_all_news($conn);
                    while ($row = mysqli_fetch_array($result)) {
                        $image_name = "";
                        if ($row["nt_id"] == 1 || $row["nt_id"] == 3) {
                            $image_name = 'id_1_problem.jpg';
                        }
                        if ($row["nt_id"] == 2 || $row["nt_id"] == 4) {
                            $image_name = 'id_2_fixed.jpg';
                        }
                        if ($row["nt_id"] == 3 || $row["nt_id"] == 3) {
                            $image_name = 'id_3_problem.jpg';
                        }
                        if ($row["nt_id"] == 4 || $row["nt_id"] == 4) {
                            $image_name = 'id_4_fixed.jpg';
                        }
                        if ($row["nt_id"] == 5) {
                            $image_name = 'id_5_problem.jpg';
                        }
                        if ($row["nt_id"] == 6) {
                            $image_name = 'id_6_fixed.jpg';
                        }
                        if ($row["nt_id"] == 7) {
                            $image_name = 'id_7_attention.jpg';
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
                    <div class='d-flex flex-column justify-content-between '>
                      <a class='text-decoration-none' href='news-view.php?id={$row["id"]}'>
                        <div class='news-hover ps-4'>{$row["title"]}</div>
                      </a>
                      <div class='mt-2 ps-4' id='ShowHideMe' style='display:none'>
                        <p>{$row["content"]}</p>
                      </div>
                      <div class='ps-4 pt-2 text-muted'>" . date_format(date_create($row["created_when"]), 'd.m.Y H:i:s') . "</div>
                    </div>
                  </div>
                </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="d-flex mt-auto p-2 justify-content-center">
    <h6></h6>
</div>
<?php include './includes/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
<script>
$(function() {
    $('#gridCheck1').change(function() {
        $('#ShowHideMe').toggle($(this).is(':checked'));
    });
});
</script>
