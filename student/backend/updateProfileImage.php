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

if (isset($_POST['updateImage'])) {

    $studentID = $_SESSION['studentid'];

    $query = "SELECT * FROM student where studentID=".$_SESSION['studentid'];
    $picRef = "";
    $result=mysqli_query($conn, $query);
    mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    $picRef = $row['picRef'];
    if(!$picRef==NULL){
        unlink("../../profileImages/".$picRef);
    }

    $newImageName = time()."_".$_FILES['imageUpload']['name']; 
    $target =  "../../profileImages/".$newImageName;
    $tmpName =  $_FILES['imageUpload']['tmp_name'];

    move_uploaded_file($tmpName,$target);

    $picRef = mysqli_real_escape_string($conn, $newImageName);
    $query = "UPDATE student
        SET
        picRef = '".$picRef."'
        WHERE
        studentID = ".$studentID.";";

    mysqli_query($conn, $query);


  
}
mysqli_close($conn); 
header('location: ../profile.php');

?>