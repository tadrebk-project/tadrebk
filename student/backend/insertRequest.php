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
    $query2 = "SELECT * FROM Student where studentID = ".$_SESSION['studentid'];
    $HasCompany = true;
if($result2=mysqli_query($conn, $query2)){
    if(mysqli_num_rows($result2)>0){
        //(here table)
        $str = "";
        while($row2=mysqli_fetch_array($result2)){
            if($row2["compID"] ==""){
                $HasCompany = false;
            }
            else{
                $HasCompany = true;
            }
             
        }
        
        
    }
    else {
        echo "no id";
    }
}
    if(!$HasCompany){
        $appID = $_GET['appID'];
        $studentID = $_SESSION['studentid'];
        $date = date("Y-m-d");
        $status = 'Pending';
        $query = "INSERT INTO StudentRequest (appID, studentID, date, status) VALUES('$appID','$studentID','$date','$status');";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        header('location: ../applications.php?compID='.$_GET['compID']);
    }
    else {
        echo "<script>alert('You are already associated with a company!');
        window.location.href='../studentHome.php';</script>";
        //header('location: ../studentHome.php');
    }
    
}
?>