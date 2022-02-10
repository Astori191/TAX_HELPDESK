<?php include './includes/header.php' ?>
<?php
$result = get_selected_request($conn, $_GET["id"]);
$messages = get_messages($conn, $_GET["id"]);
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
        <div class="row">
            <div class="col-8">
                <div class="row mt-3">
                    <div class="col">
                        <h2 class="text-uppercase" style="font-family: 'Roboto Condensed', sans-serif;">ОБРАЩЕНИЕ №<?php echo $result["request_id"] ?></h2>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 pt-1">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Время создания</h5>
                    </div>
                    <div class="col-5">
                        <div class="input-group input-group mb-3">
                            <input class="form-control" type="text" value="<?php echo date_format(date_create($result["requests_created_when"]), 'd.m.Y H:i:s') ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 pt-1">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Исполнитель</h5>
                    </div>
                    <div class="col-5">
                        <div class="input-group input-group mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["users1_name"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 pt-1">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Этап</h5>
                    </div>
                    <div class="col-5">
                        <div class="input-group input-group mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["phases_name"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 pt-1">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Приоритет</h5>
                    </div>
                    <div class="col-5">
                        <div class="input-group input-group mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["priorities_kind"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 pt-1">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Вид услуги</h5>
                    </div>
                    <div class="col-5">
                        <div class="input-group input-group mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["maintenances_name"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 pt-1">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Описание проблемы</h5>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <textarea class="form-control txtarea" id="exampleFormControlTextarea1" rows="2" readonly><?php echo $result["requests_record"] ?> </textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 ">
                        <h5 class=" fw-bold" style="font-family: 'Roboto Condensed', sans-serif;">Заявитель</h5>
                    </div>
                    <div class="col-5">
                        <div class="input-group input-group mb-3">
                            <input class="form-control" type="text" value="<?php echo $result["users2_name"] ?>" aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                            Комментарии
                        </button>
                    </div>
                    <?php
                    if ($result["requests_attachments"])
                    ?>
                    <div class='col-5 pt-1'>
                        <p>Вложения: <span class="fw-bold"><?php echo $result["requests_attachments"] ?></span> </p>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="requests-new.php" class="link text-decoration-none">
                        <div class="news-hover">Вернуться к обращениям</div>
                    </a>
                </div>
            </div>
            <div class="col mt-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Статус выполнения обращения
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <span class="fw-bold">Ваше имя компьютера:</span> <span></span>
                                <br>
                                <span class="fw-bold">Ваш IP-адрес: </span> <span></span>
                                <?php
                                if ($result["requests_phase_id"] == 2) {
                                    echo "<div class='progress mt-3'>
                                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width: 25%'></div>
                                  </div>";
                                } else if ($result["requests_phase_id"] == 5) {
                                    echo "<div class='progress mt-3'>
                                <div class='progress-bar progress-bar-striped progress-bar-animated bg-warning' style='width: 35%'></div>
                              </div>";
                                } else if ($result["requests_phase_id"] == 1) {
                                    echo "<div class='progress mt-3'>
                                    <div class='progress-bar' ></div>
                                  </div>";
                                } else if ($result["requests_phase_id"] == 3) {
                                    echo "<div class='progress mt-3'>
                                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width: 75%'></div>
                                  </div>";
                                } else if ($result["requests_phase_id"] == 4) {
                                    echo "<div class='progress mt-3'>
                                    <div class='progress-bar bg-success' style='width: 100%'></div>
                                  </div>";
                                } else if ($result["requests_phase_id"] == 6) {
                                    echo "<div class='progress mt-3'>
                                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-info' style='width: 60%'></div>
                                  </div>";
                                } else if ($result["requests_phase_id"] == 7) {
                                    echo "<div class='progress mt-3'>
                                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' style='width: 10%'></div>
                                  </div>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title main-title" id="exampleModalToggleLabel">КОММЕНТАРИИ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            $last_phase = -1;
            while ($row = mysqli_fetch_array($messages)) {
                $last_phase = $row["rh_phase_id"];
                if ($row["rh_message_type"] == 1) {
                    echo "
                <div class='modal-body'>
                    <div class='mb-2'>
                        <p class='text-start text-success fw-bold'>{$row["users_name"]} ({$row["users_login"]}) " . date_format(date_create($row["rh_mcreated_when"]), 'd.m.Y H:i:s') . "</p>
                        <p class='text-start mb-0'>Услуга: {$row["maintenances_name"]}</p>
                        <p class='text-start'>{$row["rh_message"]} {$row["rh_request_id"]}</p>
                    </div>
                </div>";
                } else if ($row["rh_message_type"] == 5 && $row["rh_phase_id"] == 5) {
                    echo "
                            <div class='modal-body'>
                                <div class='mb-2'>
                                    <p class='text-start text-success fw-bold'>{$row["users_name"]} ({$row["users_login"]}) " . date_format(date_create($row["rh_mcreated_when"]), 'd.m.Y H:i:s') . "</p>
                                    <p class='text-start mb-1'>Услуга: {$row["maintenances_name"]}</p>
                                    <p class='text-start'>{$row["rh_message"]}</p>
                                </div>
                            </div>";
                } else {
                    echo "
                            <div class='modal-body'>
                                <div class='mb-2'>
                                    <p class='text-start text-success fw-bold'>{$row["users_name"]} ({$row["users_login"]}) " . date_format(date_create($row["rh_mcreated_when"]), 'd.m.Y H:i:s') . "</p>
                                    <p class='text-start mb-0'>Услуга: {$row["maintenances_name"]}</p>
                                    <p class='text-start mb-0'>При переходе на этап ''{$row["phases_name"]}'':</p>
                                    <p class='text-start'>{$row["rh_message"]}</p>
                                </div>
                            </div>";
                }
            }
            if ($last_phase == 5) {
                echo "
                    <form method='post' action='write_usr_answer.php'>
                        <div class='modal-body pt-0'>
                            <div class='form-floating'>
                                <textarea class='form-control' name='new_answer' placeholder='Leave a comment here' id='floatingTextarea' style='height: 80px' required></textarea>
                                <label for='floatingTextarea'>Комментарии</label>
                                    <div class='text-start mt-2'>
                                        <button type='submit' class='btn btn-outline-success'>Ответить</button>
                                    </div>
                            </div> 
                            <div class='input-group '>
                            <input type='hidden' class='form-control' name='cur_phase' value='2'>
                        </div>
                        <div class='input-group'>
                            <input type='hidden' class='form-control' name='req_id' value='{$_GET["id"]}'>
                        </div>
                        </div
                    </form>";
            }
            ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="d-flex mt-auto p-2 justify-content-center">
    <h6></h6>
</div>
<?php include './includes/footer.php'; ?>