<?php include './includes/header.php' ?>
<?php
$result = get_selected_user($conn, $_GET["id"]);
?>
<main class="flex-shrink-0">
    <div class="container">
        <div class="row bottom-line pb-3">
            <div class="d-flex align-items-center mt-3">
                <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
                <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
            </div>
        </div>
        <div class="row mt-3">
            <h4 class="main-title">ИЗМЕНИТЬ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ</h4>
        </div>
        <form method="post" action="/update_info-usr.php">
            <div class="row">
                <div class="col-5">
                    <input type="text" value="<?php echo $result["users_id"] ?>" name="id" style="display: none;">
                    <div class="mt-3 fw-bold">
                        <span>ФИО пользователя</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" value="<?php echo $result["users_name"] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="sfullname" required>
                    </div>
                    <div class="mt-3 fw-bold">
                        <span>Роль</span>
                    </div>
                    <select class="form-select mt-2" aria-label="Default select example" name="srole" required>
                        <option>Выберите из списка</option>
                        <?php
                        $sysroles = get_roles($conn);
                        while ($row = mysqli_fetch_array($sysroles)) {
                            if ($row["id"] == $result["role_id"]) {
                                echo "<option selected value='{$row["id"]}'>{$row["ui_name"]}</option>";
                            } else {
                                echo "<option value='{$row["id"]}'>{$row["ui_name"]}</option>";
                            }
                        }
                        ?>
                    </select>
                    <div class="mt-3 fw-bold">
                        <span>Логин</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="slogin" value="<?php echo $result["users_login"] ?>" required>
                    </div>
                    <div class="mt-3 fw-bold">
                        <span>Пароль</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="spass" value="<?php echo $result["users_password"] ?>" required>
                    </div>
                    <div class="mt-3 fw-bold">
                        <span>Адрес СЭД</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" value="<?php echo $result["users_mail_to"] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="smail" required>
                    </div>
                </div>
                <div class="col-5">
                    <div class="mt-3 fw-bold">
                        <span>Отдел</span>
                    </div>
                    <select class="form-select mt-2" aria-label="Default select example" name="sdep" required>
                        <option>Выберите из списка</option>
                        <?php
                        $alldeps = get_departments($conn);
                        while ($row = mysqli_fetch_array($alldeps)) {
                            if ($row["departments_id"] == $result["users_department_id"]) {
                                echo "<option selected value='{$row["departments_id"]}'>{$row["departments_name"]}</option>";
                            } else {
                                echo "<option value='{$row["departments_id"]}'>{$row["departments_name"]}</option>";
                            }
                        }
                        ?>
                    </select>
                    <div class="mt-3 fw-bold">
                        <span>Должность</span>
                    </div>
                    <select class="form-select mt-2" aria-label="Default select example" name="spositon" required>
                        <option>Выберите из списка</option>
                        <?php
                        $alldeps = get_positions($conn);
                        while ($row = mysqli_fetch_array($alldeps)) {
                            if ($row["positions_id"] == $result["users_position_id"]) {
                                echo "<option selected value='{$row["positions_id"]}'>{$row["positions_name"]}</option>";
                            } else {
                                echo "<option value='{$row["positions_id"]}'>{$row["positions_name"]}</option>";
                            }
                        }
                        ?>
                    </select>
                    <div class="mt-3 fw-bold">
                        <span>№ кабинета</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" value="<?php echo $result["users_N_cab"] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="sncab" required>
                    </div>
                    <div class="mt-3 fw-bold">
                        <span>№ телефона гор.</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" value="<?php echo $result["users_N_Tel"] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="stelnumb1" required>
                    </div>
                    <div class="mt-3 fw-bold">
                        <span>№ телефона внутр.</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" value="<?php echo $result["users_N_Tel_ip"] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="stelnumb2" required>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 ms-5"></div>
                <div class="col-3">
                    <button class="btn btn-primary btn-lg btn w-100" type="submit">Применить</button>
                </div>
            </div>
        </form>
    </div>
</main>

<div class="d-flex mt-auto p-2 justify-content-center">
    <h6></h6>
</div>
<?php include './includes/footer.php'; ?>