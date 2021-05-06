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

$searchString = mysqli_real_escape_string($conn, $_POST["searchString"]);
$majorID = mysqli_real_escape_string($conn, $_POST["majorID"]);
$location = mysqli_real_escape_string($conn, $_POST["location"]);
$trainingType = mysqli_real_escape_string($conn, $_POST["trainingType"]);

if($searchString!=""){
    $searchString = " and c.name like '%".$searchString."%'";
}
if($location!=""){
    $location = " and c.location like '%".$location."%'";
}
if($majorID!=""){
    $majorID = " and m.MID = '".$majorID."'";
}
if($trainingType!=""){
    $trainingType = " and a.trainingType like '%".$trainingType."%'";
}

$query = "SELECT DISTINCT c.* from company c LEFT JOIN application a on a.compID = c.compID LEFT JOIN requiredmajors r on a.appID = r.appID LEFT JOIN major m on m.MID = r.MID where c.status = 'available'".$searchString.$majorID.$location.$trainingType." ORDER BY c.name";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str = "";
        $stra = "";
        while($row=mysqli_fetch_array($result)){

            $query = "SELECT * FROM application where compID=" . $row['compID'];
            if ($resulta = mysqli_query($conn, $query)) {
                if (mysqli_num_rows($resulta) > 0) {
                    $stra = "";
                    while ($rowa = mysqli_fetch_array($resulta)) {
                        $trainingType = "";
                        if ($rowa['trainingType'] == 'summer') {
                            $trainingType = "Summer Training";
                        } elseif ($rowa['trainingType'] == 'COOP') {
                            $trainingType = "CO-OP";
                        }
                        $strm = "";
                        $query2 = "SELECT name from major where MID in (SELECT MID from requiredmajors where appID = '" . $rowa['appID'] . "')";
                        if ($resultm = mysqli_query($conn, $query2)) {
                            if (mysqli_num_rows($resultm) > 0) {
                                while ($rowm = mysqli_fetch_array($resultm)) {
                                    $strm .= $rowm["name"] . ", ";
                                }
                                $strm = substr($strm, 0, -2);
                            } else {
                                $strm = "No majors specified...";
                            }
                        }

                    $stra .="<div class='collapse' id='collapse".$row['compID']."'>
                                <div class='card ms-4 mb-1'>
                                    <div class='card-body p-1'>
                                        <div class='row row-cols-4'>
                                            <div class='col'>
                                                <p class='my-0'>" . $rowa['name'] . "</p>
                                            </div>
                                            <div class='col'>
                                                <p class='my-0'>Training type: $trainingType</p>
                                            </div>
                                            <div class='col'>
                                                <p class='my-0'>Majors: $strm</p>
                                            </div>
                                            <div class='col d-flex justify-content-end align-items-center'>
                                                <a href='#' class='text-decoration-none'>
                                                    <i class='d-flex align-items-center bi bi-arrow-right-square-fill me-3'
                                                        style='font-size: 1.5em;'></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                } else {
                    $stra = "";
                }
            }

            $str .='
            <div class="card my-1">
                <div class="card-body">
                    <div class="row row-cols-3">
                        <div class="col" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['compID'].'">
                            <h5 class="my-0">'.$row['name'].'</h5>
                        </div>
                        <div class="col" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['compID'].'">
                            <p class="my-0">'.$row['location'].'</p>
                        </div>
                        <div class="col">
                            <div class="container d-flex justify-content-center">
                                <a href="Company_desc.php?compID='.$row['compID'].'" class="btn btn-primary py-0">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column">
                '.$stra.'
            </div>
            <!----> 
            ';

        }
        
        echo $str;
    }
    else {
        echo "No companies found...";
    }
}
mysqli_close($conn);
?>
