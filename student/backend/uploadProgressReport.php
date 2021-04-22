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

if (isset($_POST['progressReportSend'])) {
    if($_FILES['inputAttachment']['size'] > 10485760 || $_FILES['inputAttachment']['error'] != UPLOAD_ERR_OK){
      echo "<script>alert('Upload filed. Because the file size exeaded upload limit');
              window.location.href='../progress_report.php';</script>";
              return;
    }
    $studentID = $_SESSION['studentid'];
    $date = date("Y-m-d");
    $summary = $_POST['inputDescription'];

    $newFileName = time()."_".$_FILES['inputAttachment']['name'];
    $target =  "../../progressReports/".$newFileName;
    $tmpName =  $_FILES['inputAttachment']['tmp_name'];

    move_uploaded_file($tmpName,$target);

    $fileRef = mysqli_real_escape_string($conn, $newFileName);

    $query = "INSERT INTO progressreport (RID, summary, fileRef, date, studentID) VALUES(NULL,'$summary','$fileRef','$date','$studentID');";

    mysqli_query($conn, $query);



}
mysqli_close($conn);
echo "<script>alert('Successfully uploaded');
        window.location.href='../progress_report.php';</script>";

?>
