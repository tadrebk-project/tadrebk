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

// initializing variables
$text = "";

$appID = mysqli_real_escape_string($conn, $_POST['appID']);
$studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
if (isset($_POST['acceptTraining'])) {


$compID = $_GET['compID'];
$review_comp = $_GET['compID'];
$studentID = $_SESSION['studentid'];
$qry1 = "DELETE FROM `studentrequest` where studentID = ".$studentID.";";
mysqli_query($conn, $qry1);

$qry2 = "UPDATE student
SET
    compID = ".$compID.",
    review_comp = ".$review_comp."
WHERE
    studentID = ".$studentID.";";

mysqli_query($conn, $qry2);
$_SESSION["compID"] = $compID;
}
if(isset($_POST['rejectTraining'])){
    $qry1 = "DELETE FROM `studentrequest` where studentID = ".$studentID." and appID = ".$appID.";";
    mysqli_query($conn, $qry1);
}


mysqli_close($conn);
header('location: ../ViewRequestStatus.php');

?>
