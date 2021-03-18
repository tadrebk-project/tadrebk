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

$query = "SELECT * FROM companyrep WHERE repID=".$_SESSION['repID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
			if($row['type'] == 1) {
				mysqli_close($conn);
				header('location: ../representatives.php');
			} else {
				mysqli_close($conn);
				header('location: ../representativesAlternative.php');
			}
		}
	}
}
?>