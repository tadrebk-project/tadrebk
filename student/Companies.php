<?php
//to check if the file that includes this code is two level far from the required page or one level.
if (file_exists("../general_backend/sessionStart.php")) {
    require "../general_backend/sessionStart.php";
} elseif (file_exists("../../general_backend/sessionStart.php")) {
    require "../../general_backend/sessionStart.php";
} else {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="project.css">
    <script src="resources/searchCompanies.js"></script>
    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Companies</title>
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
                    <a class="nav-link btn btn-outline-primary active" aria-current="page" href="Companies.php">Companies</a>
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

    <div>
        <div class="row g-0" style="min-height: calc(100vh - 90px);">
            <div class="col-12 col-sm-3" style="color: #ffffff; background-color: #172457;">
                <div class="mx-auto my-5">
                    <div class="d-flex justify-content-center">
                        <span class="text">Filters <i class="bi bi-funnel-fill"></i></span>
                    </div>
                    <div class="my-5">
                        <div class="m-3 d-flex justify-content-between">
                            <div class="align-self-center mx-1">Major</div>
                            <select id="majorSelect" class="form-select" style="max-width: 10rem;">
                                <option selected value="">select</option>
                                <?php include "backend/getMajors.php" ?>
                            </select>
                        </div>
                        <div class="m-3 d-flex justify-content-between">
                            <div class="align-self-center mx-1">Location</div>
                            <select id="locationSelect" class="form-select" style="max-width: 10rem;">
                                <option selected value="">select</option>
                                <option value="Riyadh">Riyadh</option>
                                <option value="Dammam">Dammam</option>
                                <option value="Jeddah">Jeddah</option>
                                <option value="Makkah">Makkah</option>
                                <option value="Dhahran">Dhahran</option>
                                <option value="Khobar">Khobar</option>

                            </select>
                        </div>
                        <div class="m-3 d-flex justify-content-between">
                            <div class="align-self-center mx-1">Training</div>
                            <select id="trainingTypeSelect" class="form-select" style="max-width: 10rem;">
                                <option selected value="">select</option>
                                <option value="COOP">CO-OP</option>
                                <option value="summer">Summer Training</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-9">
                <div class="m-2 m-sm-5">
                    <div class="container d-flex justify-content-between">
                        <div class="mx-2 mx-sm-0">
                            <p class="text">Companies</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="input-group">
                                <input id="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                    <i class="bi bi-search d-flex justify-content-center align-items-center"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card my-3">
                            <div class="card-body">
                                <div class="row row-cols-3">
                                    <div class="col">
                                        Company
                                    </div>
                                    <div class="col">
                                        Location
                                    </div>
                                    <div class="col">
                                        <div class="container d-flex justify-content-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="companiesList">
                            <?php include "backend/getCompanies.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>
