<?php 
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "conn.php";

$query = "SELECT * FROM Company where status = 'available' and compID = ".$_GET['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="";
        while($row=mysqli_fetch_array($result)){
            $str .= "<div class='container-sm company-container'>
            <div class='row'>
                <div class='col-9 col-md-10'>
                    <h2>".$row['name']."</h2>
                </div>
                <div class='col-2 col-md-2'>
                <button class='btn btn-primary align-self-center'>Request</button>
                </div>
            </div>
            <br>
            <div class='row'>
                <div class='col-12 col-md-10'>
                ".$row['description']."
                </div>
            </div>
        </div>";
        }
        
        echo $str;
    }
}

?>