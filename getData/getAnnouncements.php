<?php 
require "loginStatus.php";
require "conn.php";

$query = "SELECT * FROM Announcement where compID=$_GET['compid']";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table) //title	details	date	compID
        $str ="<table>";
        while($row=mysqli_fetch_array($result)){
            $str .= "<tr><td>".$row['title']."</td><td>".$row['details']."</td><td>".$row['date']."</td></tr>";
        }
        $str .="</table>";
        echo $str;
    }
}

?>