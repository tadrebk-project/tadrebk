<?php
require "../conn.php";
$output = '';

$majorID = mysqli_real_escape_string($conn, $_POST["majorID"]);
$location = mysqli_real_escape_string($conn, $_POST["location"]);
$trainingType = mysqli_real_escape_string($conn, $_POST["trainingType"]);

if($majorID !=''&&$location !=''&&$trainingType !=''){
    $sql = "SELECT DISTINCT c.* from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID RIGHT JOIN company c on c.compID = a.compID where status = 'available' and m.MID Like '%".$majorID."%' and Location Like '%".$location."%' and a.trainingType Like '%".$trainingType."%'";
}
elseif($majorID !=''&&$location !=''&&$trainingType ==''){
    $sql = "SELECT DISTINCT c.* from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID RIGHT JOIN company c on c.compID = a.compID where status = 'available' and m.MID Like '%".$majorID."%' and Location Like '%".$location."%'";
}
elseif($majorID !=''&&$location ==''&&$trainingType !=''){
    $sql = "SELECT DISTINCT c.* from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID RIGHT JOIN company c on c.compID = a.compID where status = 'available' and m.MID Like '%".$majorID."%' and a.trainingType Like '%".$trainingType."%'";
}
elseif($majorID !=''&&$location ==''&&$trainingType ==''){
    $sql = "SELECT DISTINCT c.* from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID RIGHT JOIN company c on c.compID = a.compID where status = 'available' and m.MID Like '%".$majorID."%'";
}
elseif($majorID ==''&&$location !=''&&$trainingType !=''){
    $sql = "SELECT DISTINCT c.* from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID RIGHT JOIN company c on c.compID = a.compID where status = 'available' and Location Like '%".$location."%' and a.trainingType Like '%".$trainingType."%'";
}
elseif($majorID ==''&&$location !=''&&$trainingType ==''){
    $sql = "SELECT DISTINCT c.* from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID RIGHT JOIN company c on c.compID = a.compID where status = 'available' and Location Like '%".$location."%'";
}
elseif($majorID ==''&&$location ==''&&$trainingType !=''){
    $sql = "SELECT DISTINCT c.* from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID RIGHT JOIN company c on c.compID = a.compID where status = 'available' and a.trainingType Like '%".$trainingType."%'";
}
else{
    $sql = "SELECT * FROM Company where status = 'available'";
}


$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) > 0)
{

	$str = "";
        while($row=mysqli_fetch_array($result)){
            $str .= "<div class='card my-1'>
            <div class='card-body'>
                <div class='row row-cols-3'>
                    <div class='col'>
                        <p class='my-0'>".$row['name']."</p>
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
