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

$query = "SELECT * FROM student WHERE compID = ".$_SESSION['compID'];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str = "";
		$count = mysqli_num_rows($result);
        while($row=mysqli_fetch_array($result)){
             $str .= "<div class='d-flex justify-content-between'>
				<p class='mb-0 mt-2'>".$row['name']."</p>
                
                    <a href='feedback.php?studentID=".$row['studentID']."'><button type='button' class='btn btn-primary'>Write</button></a>
                
             </div>";
			 
			 if($count != 1) {
				$str .= "<hr>";
				--$count;
             }      
        }
        
        echo $str;
    }
    else {
        echo "There are no associated students..";
    }
}
mysqli_close($conn);
?>