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

$query = "select * from review where compID = ".$_GET['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="";
        $userImg = "";
        while($row=mysqli_fetch_array($result)){
            //$str .= "<tr><td>".$row['text']."</td><td>".$row['date']."</td><td>".$row['studentID']."</td>";
            $queryImg = "select picRef from student where name = '".$row['studentName']."';";
            if($resultImg=mysqli_query($conn, $queryImg)){
                if($userImg==NULL){
                    $userImg ="abstract-user.svg";
                }else{
                    $userImg = mysqli_fetch_array($resultImg)['picRef'];
                }
            } else {
                $userImg = "abstract-user.svg";
            };
            $str .= "<div class='row align-items-center'>
            <div class='col-3 col-md-2 col-lg-1'>
                <img src='../profileImages/".$userImg."' alt='' class='rounded-circle' width='70' height='70'>
            </div>
            <div class='col-9 col-md-2 col-lg-3'>
                <b>".$row['studentName']."</b> 
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
mysqli_close($conn);
?>
