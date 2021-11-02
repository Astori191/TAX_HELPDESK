<?php include './includes/header.php' ?>
<?php
/* $_GET["id"] */
$result = get_selected_request($conn, 1);
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
        <div class="row mt-3">
            <div class="col">
                <h2 class="text-uppercase" style="font-family: 'Roboto Condensed', sans-serif;">ОБРАЩЕНИЕ <?php echo $result["request_id"] ?></h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Время создания</h5>
            </div>
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <input class="form-control" type="text" value="<?php echo date_format(date_create($result["requests_created_when"]), 'd.m.Y H:i:s') ?>" aria-label="readonly input example" readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Текущий исполнитель</h5>
            </div>
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <input class="form-control" type="text" value="<?php echo $result["users_name"] ?>" aria-label="readonly input example" readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Вид услуги</h5>
            </div>
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <input class="form-control" type="text" value="<?php echo $result["maintenances_name"] ?>" aria-label="readonly input example" readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Описание проблемы</h5>
            </div>
            <div class="col-4">
                <div class="input-group">
                    <textarea class="form-control txtarea" id="exampleFormControlTextarea1" rows="2" readonly><?php echo $result["requests_record"] ?> </textarea>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Приоритет</h5>
            </div>
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <input class="form-control" type="text" value="<?php echo $result["priorities_kind"] ?>" aria-label="readonly input example" readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Автор</h5>
            </div>
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <input class="form-control" type="text" value="<?php echo $_SESSION["login"] ?>" aria-label="readonly input example" readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    Комментарии
                </button>
            </div>
        </div>
        <div class="mt-3">
            <a href="requests-new.php" class="link-primary">Вернуться к обращениям</a>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Комментарии</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-4">
                        1
                    </div>
                    <div class="mb-3">
                        1
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Далее</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Прикрепления</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Назад</button>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
</div>
<?php include './includes/footer.php'; ?>