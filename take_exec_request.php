<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php
$prequest_id = $_GET["id"];
$pcreated_by = $_SESSION["user_id"];

if (isset($_SESSION['login'])) {
    $pmessage_type_id = 2;
    $pmessage = "Обращение взято в работу.";
    $pcreated_when = date("Y-m-d H:i:s");
    $query = mysqli_query($conn, "INSERT INTO `requests_history` (`id`, `request_id`, `message_type_id`, `message`, `created_by`, `mcreated_when`) 
    VALUES (NULL, '$prequest_id', '$pmessage_type_id', '$pmessage', '$pcreated_by', '$pcreated_when')");

    $query2 = mysqli_query($conn, "UPDATE `requests` SET `phase_id` = '2', `assignee_id` = '$pcreated_by' WHERE `id` = '$prequest_id'");
    header('Location: /requests-admin.php');
}

?>
<?php db_close($conn); ?>