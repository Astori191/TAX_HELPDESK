<?php include './includes/header.php' ?>
<?php
/* $_GET["id"] */
$result = get_selected_request($conn, $_GET["id"]);
$messages = get_messages($conn, $_GET["id"]);
$change_phase = get_phases($conn, $_GET["id"]);
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
                <h2 class="text-uppercase" style="font-family: 'Roboto Condensed', sans-serif;">Обращение <?php echo $result["request_id"] ?></h2>
            </div>
            <div class="col-5 text-end">
                <div class="d-flex flex-row-reverse bd-highlight ">
                    <div class="bd-highlight ">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Перейти на следующий этап
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php
                                while ($row = mysqli_fetch_array($change_phase)) {
                                    echo
                                    "<li value ='{$row["id"]}'><a class='dropdown-item' href='#' data-bs-target='#exampleModalToggle{$row["id"]}' 
                                    data-bs-toggle='modal'>{$row["name"]}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>

                    </div>
                    <div class="col">
                    </div>
                    <div class="bd-highlight">
                        <h2 class="text-uppercase" style="font-family: 'Roboto Condensed', sans-serif;">Комментарии</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Время создания</h5>
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control" type="text" value="<?php echo date_format(date_create($result["requests_created_when"]), 'd.m.Y H:i:s') ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Исполнитель</h5>
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["users_name"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Этап</h5>
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["phases_name"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Приоритет</h5>
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["priorities_kind"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Вид услуги</h5>
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["maintenances_name"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Описание проблемы</h5>
                    </div>
                    <div class="col-8">
                        <textarea class="form-control txtarea" id="exampleFormControlTextarea1" rows="2" readonly><?php echo $result["requests_record"] ?> </textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Заявитель</h5>
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["requests_created_by"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-10">
                        <?php
                        if ($result["requests_phase_id"] != 1) {
                            echo "
                            <a class='btn btn-primary disabled' role='button' aria-disabled='true'>Взять в работу</a>";
                        } else {
                            echo "
                            <a class='btn btn-primary' href='take_exec_request.php?id={$_GET["id"]}' class='link-primary'>Взять в работу</a>";
                        }
                        ?>
                        <a class="btn btn-primary" href="requests-admin.php">Вернуться к обращениям</a>

                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col-5">
                <?php
                while ($row = mysqli_fetch_array($messages)) {
                    if ($row["rh_message_type"] == 1) {
                        echo "
                        <div class='row mb-3 border'>
                            <p class='text-start text-success fw-bold'>{$row["users_name"]} ({$row["users_login"]}) " . date_format(date_create($row["rh_mcreated_when"]), 'd.m.Y H:i:s') . "</p>
                            <p class='text-start mb-0'>Услуга: {$row["maintenances_name"]}</p>
                            <p class='text-start'>{$row["rh_message"]} {$row["rh_request_id"]}</p>
                        </div>";
                    } else {
                        echo "
                    <div class='row mb-3 border'>
                        <p class='text-start text-success fw-bold'>{$row["users_name"]} ({$row["users_login"]}) " . date_format(date_create($row["rh_mcreated_when"]), 'd.m.Y H:i:s') . "</p>
                        <p class='text-start mb-0'>Услуга: {$row["maintenances_name"]}</p>
                        <p class='text-start mb-0'>При переходе на этап {$row["phases_name"]}</p>
                        <p class='text-start'>{$row["rh_message"]}</p>
                    </div>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="mt-3">

        </div>
    </div>
    <!-- MODAL -->
    <?php
    $change_phase = get_phases($conn, $_GET["id"]);
    while ($row = mysqli_fetch_array($change_phase)) {
        echo
        "<div class='modal fade' id='exampleModalToggle{$row['id']}' aria-hidden='true' aria-labelledby='exampleModalToggleLabel' tabindex='-1'>
        <div class='modal-dialog modal-dialog-centered modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalToggleLabel'>Перейти на этап: {$row['name']}</h5>
                    <button type='hidden' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form method='post' action='change_request_phase.php'>
                        <div class='form-floating'>
                            <textarea class='form-control' name='new_msg' placeholder='Leave a comment here' id='floatingTextarea2' style='height: 100px'></textarea>
                            <label for='floatingTextarea2'>Комментарии</label>
                        </div>
                        <div class='input-group '>
                            <input type='hidden' class='form-control' name='msg_type' value='{$row['id']}'>
                        </div>
                        <div class='input-group '>
                            <input type='hidden' class='form-control' name='req_id' value='{$_GET["id"]}'>
                        </div>
                </div>
                <div class='modal-footer'>
                    <button type='submit' class='btn btn-primary'>Отправить</button>
                </div>
                </form>
            </div>
        </div>
    </div>";
    }
    ?>
    <!-- MODAL END -->
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6>Актуальные версии: КПЭ АИС "Налог-3" - 21.22.23.24, КОЭ АИС "Налог-3" - 21.22.23.24</h6>
</div>
<?php include './includes/footer.php'; ?>