<?php 
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "conn.php";

$query = "SELECT * FROM Major;";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str = "";
        while($row=mysqli_fetch_array($result)){
            $str .= "<option value='".$row['MID']."'>".$row['name']."</option>";
        }
        
        echo $str;
    }
    else {
        echo "";
    }
}

?>
