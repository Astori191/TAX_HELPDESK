<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php

$path = 'uploads/';
$files = scandir($path);
$search_string = $_POST["cur_id"];

foreach ($files as $value) {
    $temp = explode(".", $value);
    $searching_result = ($temp)[0];
    if ($searching_result == $search_string) {
        $filepath = $path . $value;
    }
}

file_force_download($filepath);

function file_force_download($filepath)
{
    if (file_exists($filepath)) {
        // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
        // если этого не сделать файл будет читаться в память полностью!
        if (ob_get_level()) {
            ob_end_clean();
        }
        // заставляем браузер показать окно сохранения файла
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        // читаем файл и отправляем его пользователю
        readfile($filepath);
        exit;
    }
}

?>