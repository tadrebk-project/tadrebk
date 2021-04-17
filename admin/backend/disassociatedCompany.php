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

if (isset($_POST['disassociate'])) {
  $compID = mysqli_real_escape_string($conn, $_POST['compID']);

  $qry = "select compID from student where compID = '$compID';";
  $result = mysqli_query($conn, $qry);
  $studentTraining = mysqli_fetch_assoc($result);

  if ($studentTraining) { 
        mysqli_close($conn);
        $error= "There are students training on this company!";
        echo "<script type='text/javascript'>alert('$error');</script>;
        <script type='text/javascript'>window.location.href = '../manageCompanies.php';</script>";
  }
  else{
    $qry = "UPDATE company SET status='dissociated' where compID = '$compID';";
    mysqli_query($conn, $qry);
    mysqli_close($conn);
    header('location: ../manageCompanies.php');
  }

}

?>
