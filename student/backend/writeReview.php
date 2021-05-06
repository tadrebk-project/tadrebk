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
$studentID = mysqli_real_escape_string($conn, $_POST['studentID']);


if (isset($_POST['add_review'])) {

  $compID = $_GET['compID'];
  $review_comp = "SELECT review_comp FROM student WHERE studentID = ".$studentID;
  echo   $review_comp;

  if($review_comp == NULL || $review_comp != $compID){
    echo "<script>alert('You can't write a review because you are not associated.');
            window.location.href='../progress_report.php';</script>";
            return;
  }
  else{
    $text = mysqli_real_escape_string($conn, $_POST['reviewText']);
    $studentName = $_SESSION['studentName'];
    $date = date("Y-m-d");
    $query = "INSERT INTO review (text, date, compID, studentName) VALUES('$text','$date','$compID','$studentName');";
    mysqli_query($conn, $query);
  }
}

//mysqli_close($conn);
//header('location: ../Company_desc.php?compID='.$_GET['compID']);
?>
