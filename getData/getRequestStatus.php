<?php
if (!isset($_SESSION['userid'])) {
    header('location: ../Login.html');
}
require "conn.php";

$query = "SELECT studentRequest.appID, studentRequest.studentID, studentRequest.status, Application.name as appName, Company.name as compName, Company.compID  FROM studentRequest INNER JOIN Application ON studentRequest.appID=Application.appID INNER JOIN Company ON Company.compID=Application.compID
where studentID =".$_SESSION['studentid'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str = "";
        while($row=mysqli_fetch_array($result)){
                            $str2 = "";
                            $colour = 'green';
                            
                            if($row['status'] == 'Pending') {
                                $colour = 'orange';
                                $str2 .= "    <div style='color: $colour'>
                                ".$row['status']."
                                   </div>  </div>";
                            }
                            elseif($row['status'] == 'Approved'){
                                $colour = 'green';
                                $str2 .= "    <div style='color: $colour'>
                                ".$row['status']."
                            </div>
                            </div>
                            <div class='col'>
                                <form action='getData/changeTrainingStatus.php?compID=".$row['compID']."' method='post'>
                                <textarea name='appID' hidden>".$row['appID']."</textarea>
                                <textarea name='studentID' hidden>".$row['studentID']."</textarea>
                                <button class='btn btn-primary' id='acceptTraining' name='acceptTraining'>Accept</button>
                                </div>
                                <div class='col'>
                                <button class='btn btn-primary' name='rejectTraining'>Reject</button>
                                </form>
                                </div>  "; 
                            }
                            elseif($row['status'] == 'Rejected'){
                                $colour = 'red';
                                $str2 .= "    <div style='color: $colour'>
                                ".$row['status']."
                                   </div>  </div>";
                            }

                            
                            
            $str .= "<div class='col'>
            <div class='card my-1'>
                <div class='card-body'>
                    <div class='row row-cols-5'>
                        <div class='col'>
                            <p class='my-0'>".$row['compName']."</p>
                        </div>
                        <div class='col'>
                            <p class='my-0'>".$row['appName']."</p>
                        </div>
                        <div class='col'>
                            <!-- put if statment here if pending it will be orange if approved it will be green-->
                          
                              <!-- instead of rand(0,99) put the status here -->
                          ".$str2."
                    </div>
                    
                </div>
                
    </div>";
        }

        echo $str;
    }
    else {
        echo "";
    }
}

?>
