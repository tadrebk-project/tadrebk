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



  $text = "";
  $name = "";
  $type = "";
  $GPA = 0.0;

  if (isset($_POST['submitApplication'])) {

  $compID = $_SESSION['compID'];
  $name = mysqli_real_escape_string($conn, $_POST['TrainingName']);
  $type = mysqli_real_escape_string($conn, $_POST['TrainingType']);
  $text1 = mysqli_real_escape_string($conn, $_POST['TrainingDescription']);
  $GPA = mysqli_real_escape_string($conn, $_POST['gpa']);

  $query = "INSERT INTO application (name, description, reqGPA, compID, trainingType) VALUES('$name','$text1','$GPA','$compID','$type');";


  mysqli_query($conn, $query);

  $last_appID = mysqli_insert_id($conn);

  if(!empty($_POST['Select'])) {
      foreach($_POST['Select'] as $selected){
        $query = "INSERT INTO requiredmajors (appID,MID) VALUES('$last_appID','$selected');";
        mysqli_query($conn, $query);
      }
  }
}
  mysqli_close($conn);
  header('location: ../trainingApplications.php?compID='.$_SESSION['compID']);
?>
