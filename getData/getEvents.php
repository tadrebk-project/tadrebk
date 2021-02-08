<?php 
require "loginStatus.php";
require "conn.php";

$query = "SELECT * FROM Event where compID=$_GET['compid']";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table) 
        $str ="<table>";
        while($row=mysqli_fetch_array($result)){
            $str .= "<tr><td>".$row['name']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$row['time']."</td></tr>";
        }
        $str .="</table>";
        echo $str;
    }
}

?>
