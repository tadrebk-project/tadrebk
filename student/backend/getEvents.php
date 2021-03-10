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

$query = "SELECT * FROM Event1 where compID=".$_GET['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table) 
        $str ="";
        while($row=mysqli_fetch_array($result)){
            $time = date("g:i a",strtotime($row['time']));
            $str .= "<div class='card card-body'>
            <b>
                ".$row['name']."
            </b>
            ".$row['description']."
            <br>
            <i>
                ".$row['date']." ".$time."
            </i>
        </div>
        <br>";
        }
        
       echo $str;
    }
    else {
        echo "There are no events..";
    }
}
mysqli_close($conn);
?>
