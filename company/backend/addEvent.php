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
$name = "";
$description = "";
$date = "";
$time = "";


if (isset($_POST['submitEvent'])) {

$name = mysqli_real_escape_string($conn, $_POST['titleInput']);
$description = mysqli_real_escape_string($conn, $_POST['descriptionInput']);
$dateString = mysqli_real_escape_string($conn, $_POST['dateInput']);
$timeString = mysqli_real_escape_string($conn, $_POST['timeInput']);

$date = DateTime::createFromFormat('YYYY-MM-DD',$dateString);



$compID = $_SESSION['compID'];

$query = "INSERT INTO event1 (eventID, name, description, date, time, compID) VALUES('NULL','$name','$description','$date','12:12:12','$compID');";
mysqli_query($conn, $query);
  
}
mysqli_close($conn);
?>
