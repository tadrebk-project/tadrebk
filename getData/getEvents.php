<?php 
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}

require "conn.php";

$query = "SELECT * FROM Event1 where compID=".$_GET['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table) 
        $str ="";
        while($row=mysqli_fetch_array($result)){
            //$str .= "<tr><td>".$row['name']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$row['time']."</td></tr>";
            $str .= "<div class='card card-body'>
            ".$row['name']." : ".$row['description']."   ".$row['date']."
        </div><br>";
        }
        
       echo $str;
    }
}

?>
