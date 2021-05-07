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

$query = "SELECT studentrequest.appID, studentrequest.studentID, studentrequest.status, studentrequest.rejectionNote, application.name as appName, company.name as compName, company.compID  FROM studentrequest INNER JOIN application ON studentrequest.appID=application.appID INNER JOIN company ON company.compID=application.compID
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
                            <div class='col text-center'>
                                <form action='backend/changeTrainingStatus.php?compID=".$row['compID']."' method='post'>
                                <textarea name='appID' hidden>".$row['appID']."</textarea>
                                <textarea name='studentID' hidden>".$row['studentID']."</textarea>
                                <button class='btn btn-primary mb-1' id='acceptTraining' name='acceptTraining' style='width: 5rem;'>Accept</button>
                                <button class='btn btn-primary mb-1' name='rejectTraining' style='width: 5rem;'>Reject</button>
                                </form>"; 
                            }
                            elseif($row['status'] == 'Rejected'){
                                $colour = 'red';
                                $str2 .= "    <div style='color: $colour'>
                                ".$row['status']." <i class='bi bi-question-circle-fill reasonMark'><span class='reasonText'>".$row['rejectionNote']."</span></i>
                                   </div>  </div> ";
                            }

                            
            $str .= "
            <div class='card my-2'>
                <div class='card-body p-1'>
                    <div class='row row-cols-4 g-1'>
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
                    
                </div>";
        }

        echo $str;
    }
    else {
        echo "";
    }
}
mysqli_close($conn);
?>
