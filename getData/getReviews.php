<?php 
require "loginStatus.php";
require "conn.php";

$query = "select r.*, s.name from review r join student s on r.studentID = s.studentID where r.compID = ".$_GET['compid'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="<table>";
        while($row=mysqli_fetch_array($result)){
            $str .= "<tr><td>".$row['text']."</td><td>".$row['date']."</td><td>".$row['studentID']."</td>";
        }
        $str .="</table>";
        echo $str;
    }
}

?>
