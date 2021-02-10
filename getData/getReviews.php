<?php 
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "conn.php";

$query = "select r.*, s.name from review r join student s on r.studentID = s.studentID where r.compID = ".$_GET['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="";
        while($row=mysqli_fetch_array($result)){
            //$str .= "<tr><td>".$row['text']."</td><td>".$row['date']."</td><td>".$row['studentID']."</td>";
            $str .= "<div class='row align-items-center'>
            <div class='col-3 col-md-2 col-lg-1'>
                <img src='resources/profile-icon.png' alt='' width='70' height='70'>
            </div>
            <div class='col-2 col-md-2 col-lg-3'>
                <b>".$row['name']."</b> 
                <br>
                <b>".$row['date']."</b>
            </div>  
        </div>
        <div class='row' >
            <div class='col-md-2 col-lg-1'></div>
            <div class='col-12 col-md-10 col-lg-11' >
            ".$row['text']."
            </div>
        </div>
        <hr>";
        }
        
        echo $str;
    }
    else {
        echo "There are no reviews..";
    }
}

?>
