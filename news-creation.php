<?php include './includes/header.php' ?>
<main class="flex-shrink-0">
    <div class="container">
        <div class="row bottom-line pb-3">
            <div class="col">
                <div class="row">
                    <div class="col-10">
                        <div class="d-flex align-items-center mt-3">
                            <img src="assets/img/Emblem_of_the_Federal_Tax_Service.svg" class="logo me-3" />
                            <h4 class="main-title">ПОРТАЛ ТЕХНИЧЕСКОЙ ПОДДЕРЖКИ <br>ИФНС РОССИИ № 30 ПО Г. МОСКВЕ</h4>
                        </div>
                    </div>
                    <div class="col-2 mt-5">
                        <a class="btn btn-outline-primary" href="index.php" role="button">На главную</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <h4 class="main-title">СОЗДАНИЕ НОВОСТИ</h4>
        </div>
        <form method="post" action="/add_news.php">
            <div class="row">
                <div class="col-5">
                    <div class="mt-3 fw-bold">
                        <span>Категория</span>
                    </div>
                    <select class="form-select mt-2" aria-label="Default select example" name="sntype">
                        <option selected>Выберите из списка</option>
                        <?php
                        $sysroles = get_news_types($conn);
                        while ($row = mysqli_fetch_array($sysroles)) {
                            echo "<option value='{$row["id"]}'>{$row["description"]}</option>
                        ";
                        }
                        ?>
                    </select>
                    <div class="mt-3 fw-bold">
                        <span>Заголовок</span>
                    </div>
                    <div class="input-group mt-2">
                        <input minlength="15" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="snhead" required>
                    </div>
                    <div class="mt-3 fw-bold">
                        <span>Текст новости</span>
                    </div>
                    <div class=" mt-2">
                        <textarea minlength="20" class="form-control txtarea mb-3" name="sncontent" id="exampleFormControlTextarea1" rows="4" required><?= $pncontent ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <?php if (isset($_SESSION['login'])) {
                            echo "<label class='form-label fw-bold'>Автор</label>
              <span class='input-group-text' id='inputGroup-sizing-default'>{$_SESSION["user_name"]} ({$_SESSION["login"]}) </span>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <button class="btn btn-primary btn-lg btn w-100" type="submit" name="btn_submit_auth">Создать</button>
                </div>
            </div>
        </form>
    </div>
</main>

<div class="d-flex mt-auto p-2 justify-content-center">
    <h6></h6>
</div>
<?php include './includes/footer.php'; ?>