<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "../conn.php";



if (isset($_POST['add_request'])) {

    $appID = $_GET['appID'];
    $studentID = $_SESSION['studentid'];
    $date = date("Y-m-d");
    $status = 'Pending';
    $query = "INSERT INTO StudentRequest (appID, studentID, date, status) VALUES('$appID','$studentID','$date','$status');";
    mysqli_query($conn, $query);
}

mysqli_close($conn);
header('location: ../applications.php');
?>
