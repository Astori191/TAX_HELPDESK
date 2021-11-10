<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php
if (isset($_SESSION['login'])) {
    $pcreated_when = date("Y-m-d H:i:s");
    $pmaintenance_id = $_POST['mn_id'];
    $ppriority_id = $_POST['pr_id'];
    $precord = $_POST['rec'];
    $pphase_id = 1;
    $passignee_id = 1;
    $pcreated_by = $_SESSION["user_name"];
    $query = mysqli_query($conn, "INSERT INTO `requests` (`id`, `created_when`, `maintenance_id`, `priority_id`, `record`, `phase_id`, 
    `assignee_id`, `created_by`) VALUES (NULL, '$pcreated_when', '$pmaintenance_id', '$ppriority_id', '$precord', '$pphase_id', '$passignee_id', 
    '$pcreated_by')");
    header('Location: /requests-new.php');
}
?>
<?php db_close($conn); ?>