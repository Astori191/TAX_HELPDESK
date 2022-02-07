<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php
if (isset($_SESSION['login']) && !empty($_POST)) {
    $ps_id = $_POST['id'];
    $psfullname = $_POST['sfullname'];
    $psrole = $_POST['srole'];
    $pslogin = $_POST['slogin'];
    $pspass = $_POST['spass'];
    $pspositon = $_POST['spositon'];
    $psncab = $_POST['sncab'];
    $pstelnumb1 = $_POST['stelnumb1'];
    $pstelnumb2 = $_POST['stelnumb2'];
    $psmail = $_POST['smail'];
    $psdep = $_POST['sdep'];
    $query = $conn->prepare("
    UPDATE 
        users 
    SET 
        name = ?, role = ?, login = ?, password = ?, position_id = ?, N_cab = ?, N_Tel = ?, N_Tel_ip = ?, mail_to = ?, department_id = ?
    WHERE
        users.id = ?");
    $query->bind_param("sississssii", $psfullname, $psrole, $pslogin, $pspass, $pspositon, $psncab, $pstelnumb1, $pstelnumb2, $psmail, $psdep, $ps_id);
    $query->execute();
    $query->close();
    header("Location: /user-update.php?id={$ps_id}");
}
?>
<?php db_close($conn); ?>