<?php include './includes/header.php' ?>
<?php
$result = get_selected_news_post($conn, $_GET["id"]);
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
            <div class="col-10">
                <div class="news-view-content"><?php echo $result["news_title"] . ' ' .  date_format(date_create($result["news_created_when"]), 'd.m.Y') ?></div>
            </div>
        </div>

        <div class="mt-3">
            <p class="fs-6 text-muted">Дата публикации: <?php echo date_format(date_create($result["news_created_when"]), 'd.m.Y H:i:s') . ' ' . $result["user_name"] ?></p>
        </div>
        <div class="mt-3">
            <img src="/includes/news/id_1_problem.jpg" style='width: 200px; height: 200px'>
        </div>
        <div class="mt-3 col-8">
            <p class="fs-6 mb-0 fw-normal"><?php echo $result["news_content"] ?></p>
        </div>
        <div class="mt-3">
            <a href="index.php" class="link-primary text-decoration-none">Вернуться на главную</a>
        </div>

    </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
</div>
<?php include './includes/footer.php'; ?>