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
                    <h4>ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <h2 class="text-uppercase" style="font-family: 'Roboto Condensed', sans-serif;"><?php echo $result["news_category"] ?></h2>
        </div>
        <div class="mt-2">
            <h3 class="text-primary fw-bold" style="font-family: 'Roboto Condensed', sans-serif;"><?php echo $result["news_title"] ?></h3>
            <h3 class="text-primary fw-bold" style="font-family: 'Roboto Condensed', sans-serif;"><?php echo date_format(date_create($result["news_created_when"]), 'd.m.Y') ?></h3>
        </div>
        <div class="mt-3">
            <p class="fs-6 fw-light">Дата публикации: <?php echo date_format(date_create($result["news_created_when"]), 'd.m.Y H:i:s') . ' ' . $result["user_name"] ?></p>
        </div>
        <div class="mt-3">
            <img src="/includes/news/id_1_problem.jpg" style='width: 200px; height: 154px'>
        </div>
        <div class="mt-5 col-8">
            <p class="fs-6 mb-0 fw-normal"><?php echo $result["news_content"] ?></p>
        </div>
        <div class="mt-3">
            <a href="index.php" class="link-primary">Вернуться на главную</a>
        </div>

    </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
</div>
<?php include './includes/footer.php'; ?>