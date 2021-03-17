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

if (isset($_POST['add_request'])) {
    $query2 = "SELECT * FROM student where studentID = ".$_SESSION['studentid'];
    $HasCompany = true;
    $HasCV = true;
    $alreadyRequested = true;
    if($result2=mysqli_query($conn, $query2)){
        if(mysqli_num_rows($result2)>0){
            while($row2=mysqli_fetch_array($result2)){
                if($row2["compID"] ==""){
                    $HasCompany = false;
                }
                else{
                    $HasCompany = true;
                }
                if($row2["CVFileRef"] ==""){
                    $HasCV = false;
                }
                else{
                    $HasCV = true;
                }
            }
        }
        else {
            echo "no id";
        }
    }
    $query3 = "SELECT * FROM studentrequest where appID = '".$_GET['appID']."' and studentID = ".$_SESSION['studentid'];
    if($result3=mysqli_query($conn, $query3)){
        if(mysqli_num_rows($result3)>0){
            $alreadyRequested = true;
        }
        else {
            $alreadyRequested = false;
        }
    }
    if(!$HasCompany&&$HasCV&&!$alreadyRequested){
        $appID = $_GET['appID'];
        $studentID = $_SESSION['studentid'];
        $date = date("Y-m-d");
        $status = 'Pending';
        $query = "INSERT INTO studentrequest (appID, studentID, date, status) VALUES('$appID','$studentID','$date','$status');";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        echo "<script>alert('Request sent successfully');
        window.location.href='../applications.php?compID=".$_GET['compID']."';</script>";
        //header('location: ../applications.php?compID='.$_GET['compID']);
    }
    elseif($HasCompany) {
        echo "<script>alert('You are already associated with a company!');
        window.location.href='../applications.php?compID=".$_GET['compID']."';</script>";
        //header('location: ../studentHome.php');
    }
    elseif(!$HasCV) {
        echo "<script>alert('Please upload your CV through your profile.');
        window.location.href='../applications.php?compID=".$_GET['compID']."';</script>";
        //header('location: ../studentHome.php');
    }
    elseif($alreadyRequested) {
        echo "<script>alert('You have already requested this application!');
        window.location.href='../applications.php?compID=".$_GET['compID']."';</script>";
        //header('location: ../studentHome.php');
    }
    
}
?>