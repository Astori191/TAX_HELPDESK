<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php

if (isset($_SESSION['login'])) {
    $prequest_id = $_POST['req_id'];
    $pcreated_by = $_SESSION["user_id"];
    $cur_phase = $_POST['cur_phase'];
    $pnew_message = $_POST['new_answer'];
    $pcreated_when = date("Y-m-d H:i:s");
    take_request_on_execution($conn, $prequest_id, $cur_phase, $pnew_message, $pcreated_by, $pcreated_when);
    change_request_stage_on_execution($conn, $pcreated_by, $prequest_id);
    header("Location: /msg-6.php");
}

?>
<?php db_close($conn); ?>