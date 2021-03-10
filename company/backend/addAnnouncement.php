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
$title = "";
$details = "";


if (isset($_POST['submitAnnouncement'])) {

$title = mysqli_real_escape_string($conn, $_POST['titleInput']);
$details = mysqli_real_escape_string($conn, $_POST['descriptionInput']);
$compID = $_SESSION['compID'];
$date = date("Y-m-d");

$query = "INSERT INTO announcement (annID, title, details, date, compID) VALUES('NULL','$title','$details','$date','$compID');";
mysqli_query($conn, $query);
  
}
mysqli_close($conn);
header('location: ../announcements.php');
?>
