<?php
session_start();
require "conn.php";

if (isset($_POST['login-btn'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $mysql_qry = "select * from user1 where username = '$username' and password = '$password'";
  $result = mysqli_query($conn ,$mysql_qry);

  if(mysqli_num_rows($result) == 1){
      $user = mysqli_fetch_assoc($result);
  	  if($user['type'] === "student"){
        $_SESSION['userid'] = $user['userID'];
        header('location: index.html');

      } else if ($user['type'] === "representative"){
        $_SESSION['userid'] = $user['userID'];
        header('location: representative.php');

      } else if ($user['type'] === "admin"){
        $_SESSION['userid'] = $user['userID'];
        header('location: admin.php');

      } else if ($user['type'] === "instructor"){
        $_SESSION['userid'] = $user['userID'];
        header('location: instructor.php');
      }
    

  }
  else {
      $error= "Wrong Credintials! Try Again";
      echo "<script type='text/javascript'>alert('$error');</script>";
      echo "<script type='text/javascript'>window.location.href = 'Login.html';</script>";
  }
}

 mysqli_close($conn);

?>
