<?php include './dbconnect.php';
$total_pages_sql = "SELECT COUNT(*) FROM table";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM table LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn, $sql);
