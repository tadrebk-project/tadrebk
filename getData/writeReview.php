<?php
session_start();
require "conn.php";

// initializing variables
$text = "";


if (isset($_POST['add_review'])) {

$text = mysqli_real_escape_string($conn, $_POST['text']);

$compID = $_GET['compID'];
$studentID = $_SESSION['studentid'];
$date = date("Y-m-d");
$query = "INSERT INTO Review (text, date, compID, studentID) VALUES('$text','$date','$compID','$studentID');";
mysqli_query($conn, $query);
  
}
mysqli_close($conn);
?>
