<?php
session_start();
require "conn.php";
$headerString='';

function denyAccess($msg){
  unset($_SESSION['userid']);
  session_destroy();
  echo "<script type='text/javascript'>alert('$msg');</script>";
  echo "<script type='text/javascript'>window.location.href = '../Login.html';</script>";

}

if (isset($_POST['login-btn'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $mysql_qry = "select * from tadreabkuser where username = '$username'";
  $result = mysqli_query($conn ,$mysql_qry);

  if(mysqli_num_rows($result) == 1){

      $user = mysqli_fetch_assoc($result);
      $verify_result = password_verify($password, $user['password']);
      if(!$verify_result){
        denyAccess("Wrong Credentials! Try Again");
      }

  	  else if($user['type'] === "student"){
        $temp_userID = $user['userID'];
        $mysql_qry2 = "select * from student where userID = '$temp_userID'";
        $result2 = mysqli_query($conn ,$mysql_qry2);
        $student = mysqli_fetch_assoc($result2);

        $_SESSION['studentid'] = $student['studentID'];
        $_SESSION['studentName'] = $student['name'];
        $_SESSION['userid'] = $user['userID'];
        $_SESSION['type'] = $user['type'];
        $headerString  = 'location: ../student/studentHome.php';

      } else if ($user['type'] === "representative"){
        $temp_userID = $user['userID'];
        $mysql_qry2 = "select * from companyrep r INNER JOIN company c on r.compID = c.compID where userID = '$temp_userID'";
        $result2 = mysqli_query($conn ,$mysql_qry2);
        $rep = mysqli_fetch_assoc($result2);
        if($rep['status'] === "available"){
          $_SESSION['compID'] = $rep['compID'];
          $_SESSION['repID'] = $rep['repID'];
          $_SESSION['userid'] = $user['userID'];
          $_SESSION['type'] = $user['type'];
          $headerString  = 'location: ../company/companyHome.php';
        }
        else if($rep['status'] === "pending"){
          denyAccess("Your request status is still pending.");
        }
        else if($rep['status'] === "rejected"){
          denyAccess("You cannot login because your request has been rejected.");
        }
        else if($rep['status'] === "dissociated"){
          denyAccess("Your company has been dissociated.");
        }
        else{
          denyAccess("You are not authorized to access this website.");
        }
      } else if ($user['type'] === "admin"){
        $_SESSION['userid'] = $user['userID'];
        $_SESSION['type'] = $user['type'];
        $headerString  = 'location: ../admin/adminHome.php';


      } else if ($user['type'] === "instructor"){
        $temp_userID = $user['userID'];
        $mysql_qry2 = "select MID from instructor where userID = '$temp_userID'";
        $result2 = mysqli_query($conn ,$mysql_qry2);
        $ins = mysqli_fetch_assoc($result2);
        $_SESSION['MID'] = $ins['MID'];
        $_SESSION['userid'] = $user['userID'];
        $_SESSION['type'] = $user['type'];
        $headerString  = 'location: ../instructor/instructorHome.php';

      }


  }
  else {
      denyAccess("Wrong Credentials! Try Again");
  }
}
  mysqli_close($conn);
  header($headerString);
?>
