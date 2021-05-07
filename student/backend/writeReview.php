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

if (isset($_POST['add_review'])) {
// initializing variables
$text = "";
$compID = $_GET['compID'];
settype($review_comp, "integer");

  $query0 = "SELECT review_comp FROM student where studentID= ".$_SESSION['studentid'];
  if($result=mysqli_query($conn, $query0)){
      if(mysqli_num_rows($result)>0){
          //(here table)
          while($row=mysqli_fetch_array($result)){
            if($row['review_comp'] == NULL){
              $review_comp = 0;
            }else{
              $review_comp = $row['review_comp'];

            }
          }
      }
    }

  if($review_comp == 0 || $review_comp != $compID){
    mysqli_close($conn);
    echo "<script>alert('You cannot write a review because you have not trained on this company.');
    window.location.href='../Company_desc.php?compID=".$_GET['compID']."';</script>";
  }

  else{
    $text = mysqli_real_escape_string($conn, $_POST['reviewText']);
    $studentName = $_SESSION['studentName'];
    $date = date("Y-m-d");
    $query = "INSERT INTO review (text, date, compID, studentName) VALUES('$text','$date','$compID','$studentName');";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header('location: ../Company_desc.php?compID='.$_GET['compID']);
  }
}
?>
