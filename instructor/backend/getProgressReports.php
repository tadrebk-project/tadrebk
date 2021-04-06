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

$mysql_qry = "select name from student where studentID = '".$_GET['studentID']."'";
$result = mysqli_query($conn ,$mysql_qry);
$student = mysqli_fetch_assoc($result);

$reportsList = "";
$noReports = "";
if($student==null){
    $studentName = "Invalid studentID";
}
else{
$studentName = $student['name'];

$query = "select * from progressreport where studentID = '".$_GET["studentID"]."' ORDER BY date;";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $num = 1;
        while($row=mysqli_fetch_array($result)){
            $reportsList .= "<tr>
            <th scope='row'>$num</th>
            <td class='text-break'>
                ".$row["summary"]."
            </td>
            <td>".str_replace('-','/',$row['date'])."</td>
            <td><a href='../progressReports/".$row['fileRef']."' target='_blank''>Download</a></td>
        </tr>";
        $num++;
        }
    }
    else {
        $noReports = "No progress reports available";
    }
}
}
mysqli_close($conn);
?>