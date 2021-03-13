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

if (isset($_POST['registerByFile'])) {
    //Read from file...
    //
    //
    
}
elseif (isset($_POST['registerManually'])) {
    $studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gpa = mysqli_real_escape_string($conn, $_POST['gpa']);
    $MID = mysqli_real_escape_string($conn, $_POST['MID']);

    $student_check_query = "SELECT * FROM student WHERE studentID='$studentID' LIMIT 1";
    $result = mysqli_query($conn, $student_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
      if ($user['studentID'] === $studentID) {
        $error= "Student with same ID already registered!";
        echo "<script type='text/javascript'>alert('$error');</script>";
        echo "<script type='text/javascript'>window.location.href = '../students.php';</script>";
      }
    }
    else{
        $username = "s".$studentID;
        $password = "pass".$studentID;
        $query = "INSERT INTO user1 (username, password, type) VALUES('$username','$password','student');";
        mysqli_query($conn, $query);
        $last_userID = mysqli_insert_id($conn);

        $query = "INSERT INTO student (userID, studentID, name, gpa, MID) VALUES('$last_userID','$studentID','$name','$gpa','$MID');";
        mysqli_query($conn, $query);
    }
}

mysqli_close($conn);
header('location: ../students.php');

?>