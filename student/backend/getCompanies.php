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
        while($row=mysqli_fetch_array($result)){
                $str2 ="<div>
                <h6>Majors: </h6>";
                $query2 = "Select distinct m.name from requiredmajors r join major m on m.MID = r.MID join application a on a.appID = r.appID where a.compID = ".$row['compID'];
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
                $query3 = "Select distinct trainingType from application where compID = ".$row['compID'];
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
                    <div class='col' data-bs-toggle='collapse' data-bs-target='#collapse".$row['compID']."'>
                        <h5 class='my-0'>".$row['name']."</h5>
                    </div>
                    <div class='col' data-bs-toggle='collapse' data-bs-target='#collapse".$row['compID']."'>
                        <p class='my-0'>".$row['location']."</p>
                    </div>
                    <div class='col'>
                        <div class='container d-flex justify-content-center'>
                            <a href='Company_desc.php?compID=".$row['compID']."' class='btn btn-primary py-0'>View</a>
                        </div>
                    </div>
                </div>
                <div class='collapse' id='collapse".$row['compID']."'>
                    ".$str3.$str2."
                </div>
            </div>
            </div>";
/*
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
                <div class="collapse" id="collapse'.$row['compID'].'">
                    <div class="card ms-4 mb-1">
                        <div class="card-body p-1">
                            <div class="row row-cols-4">
                                <div class="col">
                                    <p class="my-0">Opportunity name</p>
                                </div>
                                <div class="col">
                                    <p class="my-0">Training type: CO-OP</p>
                                </div>
                                <div class="col">
                                    <p class="my-0">Majors: </p>
                                </div>
                                <div class="col d-flex justify-content-end align-items-center">
                                    <a href="#" class="text-decoration-none">
                                        <i class="d-flex align-items-center bi bi-arrow-right-square-fill me-3"
                                            style="font-size: 1.5em;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapse'.$row['compID'].'">
                    <div class="card ms-4 mb-1">
                        <div class="card-body p-1">
                            <div class="row row-cols-4">
                                <div class="col">
                                    <p class="my-0">Opportunity name</p>
                                </div>
                                <div class="col">
                                    <p class="my-0">Training type: '.'</p>
                                </div>
                                <div class="col">
                                    <p class="my-0">Majors: '.'</p>
                                </div>
                                <div class="col d-flex justify-content-end align-items-center">
                                    <a href="#" class="text-decoration-none">
                                        <i class="d-flex align-items-center bi bi-arrow-right-square-fill me-3"
                                            style="font-size: 1.5em;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----> 
            ';
*/
        }
        
        echo $str;
    }
    else {
        echo "No companies found...";
    }
}
mysqli_close($conn);
?>
