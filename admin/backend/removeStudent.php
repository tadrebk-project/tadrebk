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
    $studentID = mysqli_real_escape_string($conn, $_POST['studentID']);

    $qry = "UPDATE student
        SET
        compID = NULL,
        status = 'inactive'
        WHERE studentID = ".$studentID.";";

    mysqli_query($conn, $qry);

    $qry = "DELETE FROM studentrequest where studentID = '$studentID';";
    mysqli_query($conn, $qry);

}

mysqli_close($conn);
header('location: ../students.php');

?>