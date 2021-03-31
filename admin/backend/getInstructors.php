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

$query = "select * from instructor;";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str ="";
        while($row=mysqli_fetch_array($result)){ //add name of major into rows.
			$subQuery = "SELECT * FROM major WHERE MID = ".$row['MID']; 
			$subResult=mysqli_query($conn, $subQuery);
			
			$subRow=mysqli_fetch_array($subResult);
			$str .= "<tr>
			<td>".$subRow['name']."</td>
			<td>".$row['name']."</td>
			<td>
				<form action='backend/removeInstructor.php' method='post'>
					<input type='text' value='".$row['userID']."' name='userID' hidden></input>
					<button type='submit' class='btn btn-primary py-0 float-end' id='removeInstructor' name='removeInstructor' onClick='return confirm(\"are you sure you want to delete ".$row['name']."?\");'>Remove</button>
				</form>
			</td>
			</tr>";
		}
    
        
        echo $str;
    }
    else {
        echo "<tr><td> There are no instructors registered into the system... </td></tr>";
    }
}
mysqli_close($conn);
?>