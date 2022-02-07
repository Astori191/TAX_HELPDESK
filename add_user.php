<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php
if (isset($_SESSION['login']) && !empty($_POST)) {
    $psfullname = $_POST['sfullname'];
    $psrole = $_POST['srole'];
    $pslogin = $_POST['slogin'];
    $pspass = password_hash($_POST['spass'], PASSWORD_BCRYPT, ['cost' => 12]);
    $pspositon = $_POST['spositon'];
    $psncab = $_POST['sncab'];
    $pstelnumb1 = $_POST['stelnumb1'];
    $pstelnumb2 = $_POST['stelnumb2'];
    $psmail = $_POST['smail'];
    $psdep = $_POST['sdep'];
    $query = mysqli_query($conn, "INSERT INTO `users` (`id`, `name`, `role`, `login`, `password`, `position_id`, 
    `N_cab`, `N_Tel`, `N_Tel_ip`, `mail_to`, `department_id`) VALUES (NULL, '$psfullname', '$psrole', '$pslogin', '$pspass', '$pspositon', 
    '$psncab', '$pstelnumb1', '$pstelnumb2', '$psmail', '$psdep')");
    header('Location: /user-creation.php');
}
?>

<?php db_close($conn); ?>