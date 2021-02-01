<?php
require "conn.php";

// initializing variables
$username = "";
$password = "";
$compName    = "";
$description    = "";
$location = "";
$website = "";

// REGISTER USER
if (isset($_POST['reg_company'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $compName = mysqli_real_escape_string($conn, $_POST['compName']);
  $description = mysqli_real_escape_string($conn, $_POST['compDescription']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $website = mysqli_real_escape_string($conn, $_POST['website']);

  // form validation: ensure that the form is correctly filled ...

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user1 WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists

    if ($user['username'] === $username) {
      $error= "You alredy a member, sign in instead!";
      echo "<script type='text/javascript'>alert('$error');</script>";
      echo "<script type='text/javascript'>window.location.href = 'sign.html';</script>";

    }
  }

  // Finally, register user if there are no errors in the form
  if ($error == "") {
    $time = time();
    $time2 = time() +12;
    $time3 = time() +24;
  	$query = "INSERT INTO user1 (userID, username, password, type)
                VALUES('$time','$username','$password','representative');";

    $query2 = "INSERT INTO Company (compID, name ,description, location, website, status)
                    VALUES('$time3','$compName','$description','$location', '$website', 'pending');";

    $query3 = "INSERT INTO CompanyRep (userID, repID, compID)
                VALUES('$time','$time2', '$time3');";
    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);
    mysqli_query($conn, $query3);
  	header('location: Login.html');
  }
}
mysqli_close($conn);
?>