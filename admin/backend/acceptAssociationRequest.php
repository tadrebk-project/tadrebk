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

if (isset($_POST['acceptAssociation'])) {
  $compID = mysqli_real_escape_string($conn, $_POST['compID']);

  $qry = "UPDATE company SET status='available' where compID = '$compID';";
  mysqli_query($conn, $qry);

}

mysqli_close($conn);
header('location: ../associationRequests.php');

?>
