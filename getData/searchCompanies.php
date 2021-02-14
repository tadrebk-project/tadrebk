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
