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


if (isset($_POST['removeApplication'])) {
    $appID = mysqli_real_escape_string($conn, $_POST['appID']);

    $qry1 = "DELETE FROM `application` where appID = '$appID';";
    mysqli_query($conn, $qry1);


}

mysqli_close($conn);
header('location: ../trainingApplications.php');

?>
