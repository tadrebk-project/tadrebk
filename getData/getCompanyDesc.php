<?php 
require "loginStatus.php";
require "conn.php";

$query = "SELECT * FROM Company where status = 'available' and compID = $_GET['compID']";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="";
        while($row=mysqli_fetch_array($result)){
            $str .= "<div class='container-sm company-container'>
            <div class='row'>
                <div class='col-sm-12'>
                    <h2>".$row['name']."</h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-sm-12'>
                ".$row['description']."
                </div>
            </div>
        </div>";
        }
        
        echo $str;
    }
}

?>