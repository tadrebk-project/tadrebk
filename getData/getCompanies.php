<?php 
//require "loginStatus.php";
require "conn.php";

$query = "SELECT * FROM Company where status = 'available'";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="<table>";
        while($row=mysqli_fetch_array($result)){
            $str .= "<tr><td>".$row['name']."</td><td>".$row['location']."</td><td>".$row['website']."</td><td><a href = 'company.php/?compid=".$row['compID']."'>visit</a></td></tr>";
        }
        $str .="</table>";
        echo $str;
    }
}

?>


