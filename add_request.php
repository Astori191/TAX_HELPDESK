<?php session_start(); ?>
<?php include './dbconnect.php' ?>
<?php $conn = db_open(); ?>
<?php

if (isset($_SESSION['login']) && !empty($_POST)) {
    $pcreated_when = date("Y-m-d H:i:s");
    $pmaintenance_id = $_POST['mn_id'];
    $ppriority_id = $_POST['pr_id'];
    $precord = $_POST['rec'];
    $pphase_id = 1;
    $passignee_id = 1;
    $pcreated_by = $_SESSION['user_id'];
    $query = mysqli_query($conn, "INSERT INTO `requests` (`id`, `created_when`, `maintenance_id`, `priority_id`, `record`, `phase_id`, 
    `assignee_id`, `created_by`) VALUES (NULL, '$pcreated_when', '$pmaintenance_id', '$ppriority_id', '$precord', '$pphase_id', '$passignee_id', 
    '$pcreated_by')");

    if (isset($_FILES['userfile'])) {
        $uploaddir = 'uploads/';
        //$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        $temp = explode(".", $_FILES["userfile"]["name"]);
        $newfilename = $uploaddir . mysqli_insert_id($conn) . '.' . end($temp);

        //$uploadfile = $uploaddir . $mysqli->insert_id;
        move_uploaded_file($_FILES['userfile']['tmp_name'], $newfilename);
        $query = $conn->prepare("UPDATE requests SET _attachments = ? WHERE requests.id = ?");
        $query->bind_param("si", $_FILES["userfile"]["name"], mysqli_insert_id($conn));
        $query->execute();
        $query->close();
    }
    header('Location: /msg-1.php');
} else {
    header('Location: /index.php');
}
?>
<?php db_close($conn); ?>