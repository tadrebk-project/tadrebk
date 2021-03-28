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
    $majorIndex["temp"] = "";
    $query = "SELECT * FROM major;";
    if($result=mysqli_query($conn, $query)){
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
                $majorIndex[$row['name']] = $row['MID'];
            }
        }
    }

    //Get all registered students IDs
    $query = "SELECT studentID FROM student;";
    if($result=mysqli_query($conn, $query)){
        if(mysqli_num_rows($result)>0){
            $i=0;
            while($row=mysqli_fetch_array($result)){
                $studentIDList[$i] = $row['studentID'];
                $i++;
            }
        }
    }

    $numOfStudentsInFile = 0;
    $numOfStudentsAdded = 0;

    $fileName = $_FILES["inputCSV"]["tmp_name"];
    //Data in file format: studentID, name, gpa, MID
    if ($_FILES["inputCSV"]["size"] > 0) {
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $numOfStudentsInFile++;
            $studentID = "";
            if (isset($column[0])) {
                $studentID = mysqli_real_escape_string($conn, trim($column[0]));
            }
            $name = "";
            if (isset($column[1])) {
                $name = mysqli_real_escape_string($conn, $column[1]);
            }
            $gpa = "";
            if (isset($column[2])) {
                $gpa = mysqli_real_escape_string($conn, $column[2]);
            }
            $MID = "";
            if (isset($column[3])) {
                $MID = mysqli_real_escape_string($conn, $majorIndex[trim($column[3])]);
            }

            $username = "s".$studentID;
            $password = "Stu#".$studentID;
            $hash_password = password_hash($password, PASSWORD_DEFAULT);

            if(!in_array($studentID,$studentIDList)){
                $query = "INSERT INTO user1 (username, password, type) VALUES('$username','$hash_password','student');";
                mysqli_query($conn, $query);
                $last_userID = mysqli_insert_id($conn);

                $query = "INSERT INTO student (userID, studentID, name, gpa, MID) VALUES('$last_userID','$studentID','$name','$gpa','$MID');";
                mysqli_query($conn, $query);
                $numOfStudentsAdded++;
            }
        }
    }
    $msg= $numOfStudentsAdded." out of ".$numOfStudentsInFile." students have been registered.";
    echo "<script type='text/javascript'>alert('$msg');</script>;
        <script type='text/javascript'>window.location.href = '../manageStudents.php';</script>";
}
elseif (isset($_POST['registerManually'])) {
    $studentID = mysqli_real_escape_string($conn, $_POST['inputStudentID']);
    $name = mysqli_real_escape_string($conn, $_POST['inputName']);
    $gpa = mysqli_real_escape_string($conn, $_POST['inputGPA']);
    $MID = mysqli_real_escape_string($conn, $_POST['inputMajor']);
    $username = mysqli_real_escape_string($conn, $_POST['inputUsername']);
    $password = mysqli_real_escape_string($conn, $_POST['inputPassword']);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);


    $student_check_query = "SELECT * FROM student WHERE studentID='$studentID' LIMIT 1";
    $result = mysqli_query($conn, $student_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        $error= "Student with same ID already registered!";
        echo "<script type='text/javascript'>alert('$error');</script>;
        <script type='text/javascript'>window.location.href = '../manageStudents.php';</script>";
    }
    else{
        $query = "INSERT INTO user1 (username, password, type) VALUES('$username','$hash_password','student');";
        mysqli_query($conn, $query);
        $last_userID = mysqli_insert_id($conn);

        $query = "INSERT INTO student (userID, studentID, name, gpa, MID) VALUES('$last_userID','$studentID','$name','$gpa','$MID');";
        mysqli_query($conn, $query);
        header('location: ../manageStudents.php');
    }
}

mysqli_close($conn);
?>
