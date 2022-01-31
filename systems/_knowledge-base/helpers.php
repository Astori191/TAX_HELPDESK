<?php include './includes/header.php' ?>
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
        <div class="col-4">
          <h4 class="main-title">БАЗА ЗНАНИЙ</h4>
        </div>
        <div class="col-4 pe-0">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Найти</button>
          </form>
        </div>
      </div>
      <div class="col-8">
        <div class="treeview mt-3">
          <ul class="mt-2 border border-2" id="myUL">
            <div class="row mt-3 mb-2">
              <li><span class="caret fw-bolder">Документация АИС "Налог-3" (контур опытной эксплуатации)</span>
                <ul class="nested">
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">АИС "Налог-3" КОЭ (актуальная версия 21.12.8.1). Перечень изменений.</span>
                      <ul class="nested mt-1">
                        <a class="news-hover text-decoration-none" href="#">
                          <li>Перечень_изменений_АБД</li>
                        </a>
                        <a class="news-hover text-decoration-none" href="#">
                          <li>Перечень_изменений_АИН</li>
                        </a>
                        <a class="news-hover text-decoration-none" href="#">
                          <li>Перечень_изменений_АСК_НДС_2</li>
                        </a>
                        <a class="news-hover text-decoration-none" href="#">
                          <li>Перечень_изменений_БЛС</li>
                        </a>
                        <a class="news-hover text-decoration-none" href="#">
                          <li>Перечень_изменений_ВИО</li>
                        </a>
                      </ul>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">Руководство пользователя</span>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">Перечень изменений</span>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">План установки версии АИС "Налог-3" на КОЭ</span>
                      <ul class="nested mt-1">
                        <a class="news-hover text-decoration-none" href="#">
                          <li>План проведения технологических работ на контуре опытной эксплуатации</li>
                        </a>
                      </ul>
                  </div>
                </ul>
            </div>
            <hr>
            <div class="row mt-2 mb-2">
              <li><span class="caret fw-bold">Документация АИС "Налог-3" (контур промышленной эксплуатации)</span>
                <ul class="nested">
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">АИС "Налог-3" КПЭ (актуальная версия 21.12.8.1)</span>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">Руководство пользователя</span>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">Перечень изменений</span>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li><span class="caret fw-normal">План установки версии АИС "Налог-3" на КПЭ</span>
                  </div>
                </ul>
              </li>
            </div>
            <hr>
            <div class="row mt-2 mb-2">
              <li><span class="caret fw-bold">Документация ЕУПС</span>
                <ul class="nested mb-1">
                  <div class="row mt-2">
                    <li>Инструкция пользователя системы ЕУПС</li>
                  </div>
                </ul>
            </div>
            <hr>
            <div class="row mt-2 mb-2">
              <li><span class="caret fw-bold">Инструкция пользователя портала</span>
                <ul class="nested">
                  <div class="row mt-2 mb-2">
                    <li>Инструкция заявителя</li>
                  </div>
                </ul>
            </div>
            <hr>
            <div class="row mt-2 mb-3">
              <li><span class="caret fw-bold">Часто задаваемые вопросы</span>
                <ul class="nested">
                  <div class="row mt-2 mb-2">
                    <li>Как узнать имя компьютера</li>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li>Реестр ролей и шаблонов</li>
                  </div>
                  <div class="row mt-2 mb-2">
                    <li>Реестр техпроцессов</li>
                  </div>
                </ul>
            </div>
            </li>
          </ul>
          </li>
          </ul>
          </ul>
        </div>
      </div>
    </div>

  </div>
</main>
<div class="d-flex mt-auto p-2 justify-content-center">
  <h6></h6>
</div>
<?php include './includes/footer.php'; ?>

<script>
  var toggler = document.getElementsByClassName("caret");
  var i;

  for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
      this.parentElement.querySelector(".nested").classList.toggle("active");
      this.classList.toggle("caret-down");
    });
  }
</script>