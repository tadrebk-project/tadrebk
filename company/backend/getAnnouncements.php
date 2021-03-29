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

$query = "SELECT * FROM announcement where compID=".$_SESSION['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str ="";
        while($row=mysqli_fetch_array($result)){
            $str .= "<div class='card card-body remove_container'>
            <b>
                ".$row['title']."
            </b>
            ".$row['details']."
            <br>
            <i>
                ".$row['date']."
            </i>
            <form action='backend/removeAnnouncement.php' method='post'>
                <input type='text' value='".$row['annID']."' name='annID' hidden></input>
                <button type='submit' class='remove_button' id='removeAnnouncement' name='removeAnnouncement' onClick='return confirm(\"are you sure you want to delete the announcement!\");'>
                    <i class='bi bi-trash icon'></i>
                    <i class='bi bi-trash-fill icon-fill'></i>
                </button>    
            </form>
        </div>
        <br>";
        }
        
        echo $str;
    }
    else {
        echo "<div class='card card-body'>
        There are no announcements..</div>";
    }
}
mysqli_close($conn);
?>