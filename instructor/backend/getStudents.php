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

$query = "select s.studentID, s.name, m.name as major, p.fileRef, f.details, c.name as company from student s INNER JOIN major m on s.MID = m.MID LEFT join progressreport p on s.studentID = p.studentID LEFT JOIN performancefeedback f on f.studentID = s.studentID LEFT JOIN company c on c.compID = f.compID where s.MID = ".$_SESSION["MID"];

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        $str ="";
        while($row=mysqli_fetch_array($result)){
            if($row['fileRef']==""){
                $fileRef = "<div class='col text-center'>
                                No progress report
                            </div>";
            }
            else{
                $fileRef = "<a class='my-0' href='../progressReports/".$row['fileRef']."' target='_blank'>View</a>";
            }

            if($row['details']==""){
                $details = "<div class='col text-center'>
                                No company feedback
                            </div></div>";
            }
            else{
                $details = "<div class='col text-center'>
                <a class='my-0' data-bs-toggle='collapse' href='#collapse".$row['studentID']."' role='button'>View</a>
            </div>
        </div>
        <div class='collapse' id='collapse".$row['studentID']."'>
            <div class='card card-body mt-3'>
                ".$row['details']."
                <br>
                <div class='d-flex justify-content-end'>-
                    ".$row['company']."
                </div>
            </div>
        </div>";
            }

            $str .= "<div class='card card-body my-1'>
            <div class='row'>
                <div class='col'>
                    ".$row['name']."
                </div>
                <div class='col text-center'>
                    ".$row['major']."
                </div>
                <div class='col text-center'>
                    $fileRef
                </div>
                    $details
        </div>";
        }
        
        echo $str;
    }
    else {
        echo "<div class='card card-body my-1'>
                No students
             </div>";
    }
}
mysqli_close($conn);
?>