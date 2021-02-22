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

$query = "SELECT * FROM student where studentID=".$_SESSION['studentid'];
$name = "";
$phone = "";
$email = "";
if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $name = $row["name"];
            $phone = "0".$row["phoneNum"];
            $email = $row["email"];
        }
    }
    else {
        echo "";
    }
}
mysqli_close($conn);
?>
