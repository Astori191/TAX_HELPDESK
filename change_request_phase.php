<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php

if (isset($_SESSION['login'])) {
    $request_id = $_POST['req_id'];
    $message_type_id = $_POST['msg_type'];
    $new_message = $_POST['new_msg'];
    $created_by = $_SESSION["user_id"];
    $created_when = date("Y-m-d H:i:s");

    add_request_history_item($conn, $request_id, $message_type_id, $new_message, $created_by, $created_when);
    change_request_stage($conn, $message_type_id, $request_id);
    header("Location: /request-processing.php?id=$request_id");
}

?>
<?php db_close($conn); ?>