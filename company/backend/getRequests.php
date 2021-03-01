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

if(isset($_POST["filterStudents"])){
    $majorID = mysqli_real_escape_string($conn, $_POST["majorID"]);
    $gpa = mysqli_real_escape_string($conn, $_POST["gpa"]);
    if($majorID==''){
        $query = "SELECT r.studentID, r.appID, s.name as name, m.name as major, s.gpa, s.CVFileRef, a.trainingType FROM studentrequest r join application a on r.appID = a.appID join student s on s.studentID = r.studentID join major m on m.MID = s.MID where a.appID = ".$_GET["appID"]." and s.gpa >= ".$gpa." and r.status = 'Pending' and a.compID = ".$_SESSION["compID"];
    }
    else{   
        $query = "SELECT r.studentID, r.appID, s.name as name, m.name as major, s.gpa, s.CVFileRef, a.trainingType FROM studentrequest r join application a on r.appID = a.appID join student s on s.studentID = r.studentID join major m on m.MID = s.MID where a.appID = ".$_GET["appID"]." and s.MID = ".$majorID." and s.gpa >= ".$gpa." and r.status = 'Pending' and a.compID = ".$_SESSION["compID"];
    }
}
else{
    $query = "SELECT r.studentID, r.appID, s.name as name, m.name as major, s.gpa, s.CVFileRef, a.trainingType FROM studentrequest r join application a on r.appID = a.appID join student s on s.studentID = r.studentID join major m on m.MID = s.MID where a.appID = ".$_GET["appID"]." and r.status = 'Pending' and a.compID = ".$_SESSION["compID"];
}

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str = "";
        while($row=mysqli_fetch_array($result)){
            $trainingType = "";
            if($row['trainingType']=="summer"){
                $trainingType = "Summer Training";
            }
            elseif ($row['trainingType']=="COOP"){
                $trainingType = "CO-OP";
            }
            $str .= "<div class='card my-1'>
            <div class='card-body'>
                <div class='row'>
                    <div class='col'>
                        <p class='my-0'>".$row['name']."</p>
                    </div>
                    <div class='col'>
                        <p class='my-0'>".$row['major']."</p>
                    </div>
                    <div class='col'>
                        <p class='my-0'>".$row['gpa']."</p>
                    </div>
                    <div class='col'>
                        <p class='my-0' href='#'> CV.PDF </p>
                    </div>
                    <div class='col'>
                        <p class='my-0'>".$trainingType."</p>
                    </div>
                    <div class='col'>
                    <button class='btn btn-primary'>Approve</button>
                    </div>
                    <div class='col'>
                    <button class='btn btn-primary'>Reject</button>
                    </div>
                    
                </div>
                
            </div>

            
</div>";
        }
        
        echo $str;
    }
    else {
        echo "No pending requests found...";
    }
}
mysqli_close($conn);
?>
