<?php
//to check if the file that includes this code is two level far from the required page or one level. 
if(file_exists("../general_backend/sessionStart.php")){
    require "../general_backend/sessionStart.php";
    require "../general_backend/conn.php";
}
elseif (file_exists("../../general_backend/sessionStart.php")){
    require "../../general_backend/sessionStart.php";
    require "../../general_backend/conn.php";
}
else{
    require "general_backend/sessionStart.php";
    require "general_backend/conn.php";
}


    $query = "SELECT * FROM application where compID=".$_SESSION['compID'];
    if($result=mysqli_query($conn, $query)){
        if(mysqli_num_rows($result)>0){
            $str = "";
            while($row=mysqli_fetch_array($result)){
                $trainingType = "";
                if($row['trainingType']=='summer'){
                    $trainingType = "Summer Training";
                }
                elseif($row['trainingType']=='COOP'){
                    $trainingType = "CO-OP";
                }
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
                $str .="<div class='container app'>
                <div class='row'>
                    <div class='col-12' style='padding-top: 5px;'>
                        <h4>".$row['name']."</h4>
                        <p>".$row['description']."</p>
                    </div>
                </div>
                <hr>
                <div class='row'>
                    <div class='col'>
                        <h5>Training Type: ".$trainingType."</h5>
                        <h5>Required Majors: ".$str2."</h5>
                        <h5>Required GPA:  ".$row['reqGPA']."</h5>
                    </div>
                </div>
                <br>
                <div class='row justify-content-center' style='padding-bottom: 10px;'>
                    <div class='col-4 col-md-2'>
                        <a href='studentsRequests.php?appID=".$row['appID']."'><button class='btn btn-primary align-self-center'>View requests</button></a>
                    </div>
                    <div class='col-4 col-md-2'>
                        <form action='backend/removeApplication.php' method='post'>
                        <input type='text' value='".$row['appID']."' name = 'appID' hidden></input>
                        <input type='submit' class='btn btn-primary align-self-center' id='removeApplication' name='removeApplication' value='Remove'></input>
                        </form>
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


mysqli_close($conn);

?>