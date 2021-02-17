<?php
require "../conn.php";
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
    $sql = "SELECT * FROM Company where status = 'available' and name Like '%".$search."%'";
}
else
{
	$sql = "SELECT * FROM Company where status = 'available'";
}
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) > 0)
{

	$str = "";
        while($row=mysqli_fetch_array($result)){
            $str2 ="<div>
            <h6>Majors: </h6>";
            $query2 = "Select distinct m.name from requiredmajors r join major m on m.MID = r.MID join Application a on a.appID = r.appID where a.compID = ".$row['compID'];
            if($result2=mysqli_query($conn, $query2)){
                if(mysqli_num_rows($result2)>0){
                    while($row2=mysqli_fetch_array($result2)){
                        $str2 .= $row2["name"].", ";
                    }
                    $str2 = substr($str2, 0, -2);
                    $str2 .= "</div>";
                }
                else{
                    $str2 ="";
                }
            }
            $str3 ="<div>
            <h6>Training Type: </h6>";
            $query3 = "Select distinct trainingType from Application where compID = ".$row['compID'];
            if($result2=mysqli_query($conn, $query3)){
                if(mysqli_num_rows($result2)>0){
                    while($row3=mysqli_fetch_array($result2)){
                        $trainingType = "";
                        if($row3['trainingType']=='summer'){
                            $trainingType = "Summer Training";
                        }
                        elseif($row3['trainingType']=='COOP'){
                            $trainingType = "CO-OP";
                        }
                        $str3 .= $trainingType."/";
                    }
                    $str3 = substr($str3, 0, -1);
                    $str3 .= "</div>";
                }
                else{
                    $str3 ="";
                }
            }
        $str .= "<div class='card my-1'>
        <div class='card-body'>
            <div class='row row-cols-3'>
                <div class='col'>
                    <h5 class='my-0'>".$row['name']."</h5>
                </div>
                <div class='col'>
                    <p class='my-0'>".$row['location']."</p>
                </div>
                <div class='col'>
                    <div class='container d-flex justify-content-center'>
                        <a href='Company_desc.php?compID=".$row['compID']."' class='btn btn-primary py-0'>View</a>
                    </div>
                </div>
            </div>
            
                ".$str2.$str3."
            
        </div>
    </div>";
        }
        
        echo $str;
}
else
{
	echo 'No companies found...';
}
?>
