<?php include './includes/header.php'?>
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
        <div class="mb-3 mt-3">
            <h4><?php echo $result["news_title"]?></h4>
            <h4>Example heading <span class="badge bg-secondary">New</span></h4>
        </div>
        <div class="mt-3">
            <?php echo $result["news_content"]?>
        </div>
        <div class="mt-3">
            <?php echo $result["user_name"]?>
        </div>
    </div>    
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
  </div>
<?php include './includes/footer.php'; ?>