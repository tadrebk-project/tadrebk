<?php 
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "conn.php";

$query = "SELECT * FROM Announcement where compID=".$_GET['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table) //title	details	date	compID
        $str ="";
        while($row=mysqli_fetch_array($result)){
            //$str .= "<tr><td>".$row['title']."</td><td>".$row['details']."</td><td>".$row['date']."</td></tr>";
            $str .= "<div class='card card-body'>
            ".$row['title']." : ".$row['details']."   ".$row['date']."
            </div><br>";
        }
        $str .="";
        echo $str;
    }
}

?>