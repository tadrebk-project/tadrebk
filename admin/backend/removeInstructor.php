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

if (isset($_POST['removeInstructor'])) {
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
    $qry = "DELETE from user1 WHERE userID = '".$userID."';";
    mysqli_query($conn, $qry);
}

mysqli_close($conn);
header('location: ../manageInstructors.php');

?>