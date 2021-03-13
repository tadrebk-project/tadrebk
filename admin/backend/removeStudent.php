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

if (isset($_POST['removeStudent'])) {
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);

    $qry1 = "DELETE FROM `user1` where userID = '$userID';";
    mysqli_query($conn, $qry1);


}

mysqli_close($conn);
header('location: ../students.php');

?>