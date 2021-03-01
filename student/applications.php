<?php
//to check if the file that includes this code is two level far from the required page or one level.
if(file_exists("../general_backend/sessionStart.php")){
    require "../general_backend/sessionStart.php";
}
elseif (file_exists("../../general_backend/sessionStart.php")){
    require "../../general_backend/sessionStart.php";
}
else{
    require "general_backend/sessionStart.php";
}
?>

<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="project.css">

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Applications</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="studentHome.php">
                <img src="../general_resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary" href="studentHome.php">Home</a>
                    <a class="nav-link btn btn-outline-primary" href="profile.php">Profile</a>
                    <a class="nav-link btn btn-outline-primary" href="ViewRequestStatus.php">Requests</a>
                    <a class="nav-link btn btn-outline-primary active" aria-current="page" href="#">Companies</a>
                </nav>
            </div>
            <nav class="d-flex mx-auto">
                <div class="container d-flex justify-content-center" style="width: 270px; margin-left: 0.5rem; margin-right: 0.5rem;">
                    <!--
                    <a class="btn btn-outline-primary mx-2" href="#">
                        <i class="bi bi-file-earmark-arrow-up d-flex justify-content-center align-items-center"></i>
                    </a>
                    -->
                    <a class="btn btn-outline-primary mx-2 " href="../general_backend/logout.php">
                        <i class="bi bi-box-arrow-right d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            </nav>
        </div>
    </nav>

    <div class='container-sm application-container'>
        <div class='row justify-content-center'>
            <h2>Applications</h2>
        </div>
    </div>
    <!-- for each applicaiton -->
    <?php include "backend/getApplications.php"; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
