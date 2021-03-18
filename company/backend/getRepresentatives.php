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

$query = "SELECT * FROM companyrep WHERE type = 2 AND compID=".$_SESSION['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str ="";
		$count = mysqli_num_rows($result);
        while($row=mysqli_fetch_array($result)){
             $str .= "<div class='d-flex justify-content-between'>
				<p class='mb-0 mt-2'>Representative# ".$row['repID']."</p>
                
                    <a href='backend/removeRepresentative.php?userID=".$row['userID']."'><button type='button' class='btn btn-primary'>Remove</button></a>
                
             </div>";
			 
			 if($count != 1) {
				$str .= "<hr>";
				--$count;
             }      
        }
        
        echo $str;
    }
    else {
        echo "<div class='card card-body'>
        There are no representatives other than you..</div>";
    }
}
mysqli_close($conn);
?>