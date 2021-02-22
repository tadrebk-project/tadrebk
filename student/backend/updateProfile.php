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

if (isset($_POST['update_profile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $studentID = $_SESSION['studentid'];

    $query = "UPDATE student
        SET
        name = '".$name."',
        phoneNum = '".$phone."',
        email = '".$email."'
        WHERE
        studentID = ".$studentID.";";

    mysqli_query($conn, $query);
  
}
mysqli_close($conn);
header('location: ../profile.php');
?>
