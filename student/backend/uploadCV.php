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

if (isset($_POST['CVSend'])) {

    $studentID = $_SESSION['studentid'];

    $query = "SELECT * FROM student where studentID=".$_SESSION['studentid'];
    $picRef = "";
    $result=mysqli_query($conn, $query);
    mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    $picRef = $row['CVFileRef'];
    if(!$picRef==NULL){
        unlink("../../cv/".$picRef);
    }

    $newFileName = time()."_".$_FILES['CVUpload']['name']; 
    $target =  "../../cv/".$newFileName;
    $tmpName =  $_FILES['CVUpload']['tmp_name'];

    move_uploaded_file($tmpName,$target);

    $CVFileRef = mysqli_real_escape_string($conn, $newFileName);
    $query = "UPDATE student
        SET
        CVFileRef = '".$CVFileRef."'
        WHERE
        studentID = ".$studentID.";";

    mysqli_query($conn, $query);


  
}
mysqli_close($conn); 
header('location: ../profile.php');

?>