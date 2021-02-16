<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "../conn.php";

// initializing variables
$text = "";

$appID = mysqli_real_escape_string($conn, $_POST['appID']);
$studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
if (isset($_POST['acceptTraining'])) {


$compID = $_GET['compID'];
$studentID = $_SESSION['studentid'];
$qry1 = "DELETE FROM `studentrequest` where studentID = ".$studentID.";";
mysqli_query($conn, $qry1);

$qry2 = "UPDATE Student 
SET 
    compID = ".$compID."
WHERE
    studentID = ".$studentID.";";

mysqli_query($conn, $qry2);
}
if(isset($_POST['rejectTraining'])){
    $qry1 = "DELETE FROM `studentrequest` where studentID = ".$studentID." and appID = ".$appID.";";
    mysqli_query($conn, $qry1);
}


mysqli_close($conn);
header('location: ../studentHome.php');

?>