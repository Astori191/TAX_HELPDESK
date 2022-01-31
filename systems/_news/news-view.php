<?php include './includes/header.php' ?>
<?php
$result = get_selected_news_post($conn, $_GET["id"]);
$image_name = "";
if ($result["nt_id"] == 1 || $result["nt_id"] == 3) {
    $image_name = 'id_1_problem.jpg';
}
if ($result["nt_id"] == 2 || $result["nt_id"] == 4) {
    $image_name = 'id_2_fixed.jpg';
}
if ($result["nt_id"] == 3 || $result["nt_id"] == 3) {
    $image_name = 'id_3_problem.jpg';
}
if ($result["nt_id"] == 4 || $result["nt_id"] == 4) {
    $image_name = 'id_4_fixed.jpg';
}
if ($result["nt_id"] == 5) {
    $image_name = 'id_5_problem.jpg';
}
if ($result["nt_id"] == 6) {
    $image_name = 'id_6_fixed.jpg';
}
if ($result["nt_id"] == 7) {
    $image_name = 'id_7_attention.jpg';
}
if ($result["nt_id"] == 8) {
    $image_name = 'id_8_info.jpg';
}
?>
<main class="flex-shrink-0">
    <div class="container">
        <div class="row bottom-line pb-3">
            <div class="col">
                <div class="d-flex p-2 align-items-center mt-2">
                    <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
                    <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="news-view-title text-uppercase"><?php echo $result["news_heads_name"] ?></div>
        </div>
        <div class="row" style="line-height: normal;">
            <div class="col-8">
                <div class="news-view-content"><?php echo $result["news_title"] . ' ' .  date_format(date_create($result["news_created_when"]), 'd.m.Y') ?></div>
            </div>
        </div>
        <div class="mt-3">
            <p class="fs-6 text-muted">Дата публикации: <?php echo date_format(date_create($result["news_created_when"]), 'd.m.Y H:i:s') . ' ' . $result["user_name"] ?></p>
        </div>
        <?php echo "<div class='mt-3'>
            <img style='width: 200px; height: 200px;' src='includes/news/{$image_name}'>
                    </div>"; ?>
        <div class="mt-3 col-8">
            <p class="fs-6 mb-0 fw-normal"><?php echo $result["news_content"] ?></p>
        </div>
        <div class="mt-3">
            <a href="index.php" class="link-primary text-decoration-none">
                <div class="news-hover">Вернуться на главную</div>
            </a>
        </div>
    </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6></h6>
</div>
<?php include './includes/footer.php'; ?>