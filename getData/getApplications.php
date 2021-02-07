<?php
require "loginStatus.php";
require "conn.php";

$query = "SELECT * FROM Application where compID=$_GET['compid']";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        while($row=mysqli_fetch_array($result)){
            $str2 ="";
            $query2 = "SELECT name from major where MID in (SELECT MID from requiredmajors where appID = '".$row['appID']."')";
            if($result2=mysqli_query($conn, $query2)){
                if(mysqli_num_rows($result2)>0){ 
                    while($row2=mysqli_fetch_array($result2)){
                        $str2 .= $row2["name"].", ";
                    }
                }
            }
            $str .= "<tr><td>".$row['name']."</td><td>".$row['description']."</td><td>".$row['regGPA']."</td><td>".$str2."</td></tr>";
        }
        $str .="</table>";
        echo $str;
    }
}
// "   select name from major where MID = 
//     (select MID from requiredmajors where appID='".$row['appID']."')"
?>


