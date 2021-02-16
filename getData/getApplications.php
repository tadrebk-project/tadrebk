<?php
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "conn.php";

if(isset($_GET['compID'])){
    $query = "SELECT * FROM Application where compID=".$_GET['compID'];
    if($result=mysqli_query($conn, $query)){
        if(mysqli_num_rows($result)>0){
            //(here table)
            $str = "";
            while($row=mysqli_fetch_array($result)){
                $str2 ="";
                $query2 = "SELECT name from major where MID in (SELECT MID from requiredmajors where appID = '".$row['appID']."')";
                if($result2=mysqli_query($conn, $query2)){
                    if(mysqli_num_rows($result2)>0){
                        while($row2=mysqli_fetch_array($result2)){
                            $str2 .= $row2["name"].", ";
                        }
                        $str2 = substr($str2, 0, -2);
                    }
                    else{
                        $str2 ="No required majors is specified...";
                    }
                }
                $str .="<div class='container-sm app'>
                <div class='row'>
                    <div class='col-12 col-md-10' style='padding-top: 5px;'>
                        <h4>".$row['name']."</h4>
                        <p>".$row['description']."</p>
                    </div>
                    <div class='col-3 col-md-2' style='display: flex; align-items: center; justify-content: center;'>
                    <form action='getData/insertRequest.php?appID= ".$row['appID']."&compID=".$_GET['compID']."' method='post'>
                            <button type='submit' class='btn btn-primary' id='add_request' name='add_request'>Request</button>
                    </form>
                    </div>
                </div>
                <hr>
                <div class='row'>
                    <div class='col'>
                        <h5>Required Majors:</h5>
                        <p>".$str2."</p>
                        <h5>Required GPA: ".$row['reqGPA']."</h5>
                    </div>
                </div>
            </div>";
            }
            echo $str;

        }
        else {
            echo "No applications available...";
        }
    }
}
else{
    echo "No applications available...";
}



?>