<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: Login.html');
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

    <link rel="icon" type="image/png" href="resources/Tadreabk favicon.png" />
    <title>Home</title>
</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary active" aria-current="page" href="#">Home</a>
                    <a class="nav-link btn btn-outline-primary" href="#">Profile</a>
                    <a class="nav-link btn btn-outline-primary" href="ViewRequestStatus.php">Requests</a>
                    <a class="nav-link btn btn-outline-primary" href="Companies.php">Companies</a>
                </nav>
            </div>
            <nav class="d-flex mx-auto">
            <div class="container d-flex justify-content-center" style="width: 270px; margin-left: 0.5rem; margin-right: 0.5rem;">
                    <!--
                    <a class="btn btn-outline-primary mx-2" href="#">
                        <i class="bi bi-file-earmark-arrow-up d-flex justify-content-center align-items-center"></i>
                    </a>
                    -->
                    <a class="btn btn-outline-primary mx-2 " href="logout.php">
                        <i class="bi bi-box-arrow-right d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            </nav>
        </div>
    </nav>

    <div class="Container mx-auto my-5" style="width: 75%;">
        <div class="row row-cols-1 row-cols-md-3 g-5">
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card" style="height: 20rem;">
                        <div class="card-body d-flex align-items-end">
                            <p class="text">Profile</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card" style="height: 20rem;">
                        <div class="card-body d-flex align-items-end">
                            <p class="text">Requests</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="companies.php" class="text-decoration-none">
                    <div class="card" style="height: 20rem;">
                        <div class="card-body d-flex align-items-end">
                            <p class="text">Companies</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>