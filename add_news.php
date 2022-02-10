<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php
if (isset($_SESSION['login']) && !empty($_POST)) {
    $psntype = $_POST['sntype'];
    $psnhead = $_POST['snhead'];
    $pncontent = $_POST['sncontent'];
    $pspass = $_POST['spass'];
    $pcreated_by = $_SESSION['user_id'];
    $pcreated_when = date("Y-m-d H:i:s");
    $query = mysqli_query($conn, "INSERT INTO `news` (`id`, `news_type_id`, `title`, `content`, `created_by`, `created_when`) 
    VALUES (NULL, '$psntype', '$psnhead', '$pncontent', '$pcreated_by', '$pcreated_when')");
    header('Location: /msg-8.php');
}
?>
<?php db_close($conn); ?>