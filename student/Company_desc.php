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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="project.css">

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Companies</title>
</head>

<body>

    <!-- Just an image -->

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="studentHome.php">
                <img src="../general_resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary" href="studentHome.php">Home</a>
                    <a class="nav-link btn btn-outline-primary" href="#">Profile</a>
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

    <!-- company description -->
    <?php include "backend/getCompanyDesc.php"; ?>
    <!-- reviews container -->
    <div class="container company-reviews">
        <div class="row">
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#Reviews" role="button" aria-expanded="false" aria-controls="Reviews">Reviews</a>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Event" aria-expanded="false" aria-controls="Event">Event</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Announcment" aria-expanded="false" aria-controls="Announcment">Announcment</button>
            </p>
            <div class="row reviews-container">
                <div class="col">
                    <div class="collapse multi-collapse" id="Reviews">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-7 col-md-9 col-lg-9">
                                    <h3>Reviews</h3>
                                </div>
                                <div class="col-5 col-md-3 col-lg-3">
                                    <button class="btn btn-primary" data-bs-toggle="collapse" href="#writeReview" role="button" aria-expanded="false" aria-controls="writeReview">Write a review</button>
                                </div>
                            </div>

                            <div class="collapse multi-collapse" id="writeReview">
                                <br>
                                <div class="row">
                                    <form action="backend/writeReview.php?compID=<?php echo $_GET['compID'] ?>" method="post">
                                        <textarea class="form-control" id="reviewText" name="reviewText" rows="3"></textarea>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary" id="add_review" name="add_review">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- students reivews -->
                    <?php include "backend/getReviews.php"; ?>


                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="collapse multi-collapse" id="Event">
            <?php include "backend/getEvents.php"; ?>
        </div>
    </div>
    <div class="col">
        <div class="collapse multi-collapse" id="Announcment">
            <?php include "backend/getAnnouncements.php"; ?>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>