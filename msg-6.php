<?php include './includes/header.php' ?>
<link href="assets/css/messages.css" rel="stylesheet">
<main class="flex-shrink-0">
    <div class="container">
        <div class="row bottom-line pb-3">
            <div class="col">
                <div class="d-flex p-2 align-items-center mt-2">
                    <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
                    <!-- <div class="logo-text">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br> ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</div> -->
                    <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="row">
                <!-- Модальное Окно  -->
                <div id="overlay">
                    <div class="popup">
                        <div class="row mt-2">
                            <h4 class="main-title text-center">Информационное сообщение</h4>
                        </div>
                        <hr>
                        <div class="row mt-4 ps-2 pe-2">
                            <div class="alert alert-success fs-6" role="alert">
                                <p class="mt-3">Ответ Вашему исполнителю успешно отправлен.</p>
                                <span>Вы автоматически вернётесь к журналу обращений через 5 секунд.</span>
                                <p class="mt-3 mb-3">Для возврата на главную страницу перейдите по <a href="index.php" class="alert-link sections-hover">ссылке.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6></h6>
</div>
<?php include './includes/footer.php'; ?>

<script type="text/javascript">
    var delay_popup = 0;
    setTimeout("document.getElementById('overlay').style.display='block'", delay_popup);
</script>
<script>
    var myAddress = 'requests-new.php'; // адрес страницы, на которую нужно перейти
    var myTime = 5000; // время в минутах, через которое надо перейти на другую страницу
    setTimeout('location.href =  myAddress', myTime);
</script>