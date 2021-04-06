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


if (isset($_POST['registerManually'])) {
    $name = mysqli_real_escape_string($conn, $_POST['inputName']);
    $MID = mysqli_real_escape_string($conn, $_POST['inputMajor']);
    $username = mysqli_real_escape_string($conn, $_POST['inputUsername']);
    $password = mysqli_real_escape_string($conn, $_POST['inputPassword']);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);


    $instructor_check_query = "SELECT * FROM instructor WHERE MID='$MID' LIMIT 1";
    $result = mysqli_query($conn, $instructor_check_query);
    $checkmajor = mysqli_fetch_assoc($result);

    $instructor_check_query = "SELECT * FROM tadreabkuser WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $instructor_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($checkmajor) { // if instructor with same major exists
        $error= "Instructor with same major already registered!";
        echo "<script type='text/javascript'>alert('$error');</script>;
        <script type='text/javascript'>window.location.href = '../manageInstructors.php';</script>";
    }
    else if ($user) { // if user exists
        $error= "Instructor with same username already registered!";
        echo "<script type='text/javascript'>alert('$error');</script>;
        <script type='text/javascript'>window.location.href = '../manageInstructors.php';</script>";
    }
    else{
        $query = "INSERT INTO tadreabkuser (username, password, type) VALUES('$username','$hash_password','instructor');";
        mysqli_query($conn, $query);
        $last_userID = mysqli_insert_id($conn);

        $query = "INSERT INTO instructor (userID, name, MID) VALUES('$last_userID','$name','$MID');";
        mysqli_query($conn, $query);
        header('location: ../manageInstructors.php');
    }
}

mysqli_close($conn);
?>
