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

if (isset($_POST['add_feedback'])) {
	$text = mysqli_real_escape_string($conn, $_POST['feedbackText']);
	$compID = $_SESSION['compID'];
	$studentID = $_GET['studentID'];
	$date = date("Y-m-d");

	$query0 = "INSERT INTO performancefeedback (PFID, details, date, studentID, compID) VALUES('NULL','$text','$date','$studentID','$compID');";
	mysqli_query($conn, $query0);
	
	$query1 = "UPDATE student SET compID=NULL WHERE studentID = '$studentID';";
	mysqli_query($conn, $query1);
  
}
mysqli_close($conn);
header('location: ../studentsList.php');
?>