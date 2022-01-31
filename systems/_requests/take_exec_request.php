<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php


if (isset($_SESSION['login'])) {
    $prequest_id = $_GET["id"];
    $pcreated_by = $_SESSION["user_id"];
    $pmessage_type_id = 2;
    $pnew_message = "Обращение взято в работу.";
    $pcreated_when = date("Y-m-d H:i:s");
    take_request_on_execution($conn, $prequest_id, $pmessage_type_id, $pnew_message, $pcreated_by, $pcreated_when);
    change_request_stage_on_execution($conn, $pcreated_by, $prequest_id);
    header("Location: /request-processing.php?id=$prequest_id");
}

?>
<?php db_close($conn); ?>