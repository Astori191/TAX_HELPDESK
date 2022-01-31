<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php

$deps = get_departments($conn);


$developer_records = array();
while ($rows = mysqli_fetch_assoc($resultset)) {
    $developer_records[] = $rows;
}
if (isset($_POST["export_data"])) {
    $filename = "phpzag_data_export_" . date('Ymd') . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn = false;
    if (!empty($developer_records)) {
        foreach ($developer_records as $record) {
            if (!$show_coloumn) {
                // display field/column names in first row
                echo implode("\t", array_keys($record)) . "\n";
                $show_coloumn = true;
            }
            echo implode("\t", array_values($record)) . "\n";
        }
    }
    exit;
}
?>