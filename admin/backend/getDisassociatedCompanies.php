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

$query = "SELECT * FROM company where status = 'dissociated'";


if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="";
        while($row=mysqli_fetch_array($result)){
            //$str .= "<tr><td>".$row['text']."</td><td>".$row['date']."</td><td>".$row['studentID']."</td>" where compID=".$_GET['compID'];

            $str .= "<div class='d-flex justify-content-between'>
                <p class='mb-0 mt-2'>".$row['name']."</p>
            </div>
            <hr>";
          }

        echo $str;
    }
    else {
        echo "There are no dissociated companies";
    }
}
mysqli_close($conn);
?>
