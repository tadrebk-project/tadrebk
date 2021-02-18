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


if (isset($_POST['add_review'])) {
$text = mysqli_real_escape_string($conn, $_POST['reviewText']);

$compID = $_GET['compID'];
$studentID = $_SESSION['studentid'];
$date = date("Y-m-d");
$query = "INSERT INTO Review (text, date, compID, studentID) VALUES('$text','$date','$compID','$studentID');";
mysqli_query($conn, $query);
  
}
mysqli_close($conn);
header('location: ../Company_desc.php?compID='.$_GET['compID']);
?>
