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

$query = "SELECT * FROM Announcement where compID=".$_GET['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table) //title	details	date	compID
        $str ="";
        while($row=mysqli_fetch_array($result)){
            $str .= "<div class='card card-body'>
            <b>
                ".$row['title']."
            </b>
            ".$row['details']."
            <br>
            <i>
                ".$row['date']."
            </i>
        </div>
        <br>";
        }
        $str .="";
        echo $str;
    }
    else {
        echo "There are no announcements..";
    }
}
mysqli_close($conn);
?>