<?php
//to check if the file that includes this code is two level far from the required page or one level.
if(file_exists("../general_backend/sessionStart.php")){
    require "../general_backend/sessionStart.php";
    require "../general_backend/conn.php";
}
elseif (file_exists("../../general_backend/sessionStart.php")){
    require "../../general_backend/sessionStart.php";
    require "../../general_backend/conn.php";
}
else{
    require "general_backend/sessionStart.php";
    require "general_backend/conn.php";
}


$text = "Approved";
$text2 = "Rejected";


if (isset($_POST['accept'])) {

$compID = $_SESSION['compID'];
$appID = mysqli_real_escape_string($conn, $_POST['appID']);
$studentID = mysqli_real_escape_string($conn, $_POST['studentID']);

$qry2 = "UPDATE studentrequest
SET
    status = '".$text."'
WHERE
    studentID = ".$studentID." and appID = ".$appID.";";


mysqli_query($conn, $qry2);
}
if (isset($_POST['reject'])) {

$appID = mysqli_real_escape_string($conn, $_POST['appID']);
$studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
$compID = $_SESSION['compID'];

$qry2 = "UPDATE studentrequest
SET
    status = '".$text2."'
WHERE
    studentID = ".$studentID." and appID = ".$appID.";";

mysqli_query($conn, $qry2);
}

mysqli_close($conn);
header('location: ../studentsRequests.php');

?>
