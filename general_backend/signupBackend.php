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
      $error= "Username is already taken!";
      echo "<script type='text/javascript'>alert('$error');</script>";
      echo "<script type='text/javascript'>window.location.href = '../signup.html';</script>";

    }
  }

  // Finally, register user if there are no errors in the form
  if ($error == "") {

  	$query = "INSERT INTO user1 (username, password, type) VALUES('$username','$password','representative');";
    mysqli_query($conn, $query);
    $last_userID = mysqli_insert_id($conn); //mysqli_insert_id this function takes last value generated by AUTO-INCREMENT.

    $query = "INSERT INTO company (name ,description, location, website, status) VALUES('$compName','$description','$location', '$website', 'pending');";
    mysqli_query($conn, $query);
    $last_compID = mysqli_insert_id($conn);

    $query = "INSERT INTO companyrep (userID, compID, type) VALUES('$last_userID', '$last_compID', 1);";
    mysqli_query($conn, $query);

  	header('location: ../Login.html');
  }
}
mysqli_close($conn);
?>
