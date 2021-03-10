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

$query = "SELECT * FROM event1 where compID=".$_SESSION['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str ="";
        while($row=mysqli_fetch_array($result)){
            $time = date("g:i a",strtotime($row['time']));
            $str .= "<div class='card card-body remove_container'>
            <b>
                ".$row['name']."
            </b>
            ".$row['description']."
            <br>
            <i>
                ".$row['date']." ".$time."
            </i>
            <form action='backend/removeEvent.php' method='post'>
                <input type='text' value='".$row['eventID']."' name = 'eventID' hidden></input>
                <button type='submit' class='remove_button' id='removeEvent' name='removeEvent' onClick='return confirm(\"are you sure you want to delete the event!\");'>
                    <i class='bi bi-x-circle icon'></i>
                    <i class='bi bi-x-circle-fill icon-fill'></i>
                </button>
            </form>
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