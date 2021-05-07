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

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk_favicon.png"/>
    <title>Companies</title>
</head>

<body>

    <!-- Just an image -->

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="studentHome.php">
                <svg width="270" height="50" version="1.1" viewBox="0 0 286.09 52.917" xmlns="http://www.w3.org/2000/svg">
                    <g fill="#172457">
                        <path d="m0 1e-3v52.917h52.917v-52.917zm11.365 8.4005h30.187v6.7221h-10.84v29.394h-8.7065v-29.394h-10.641z" />
                        <g stroke-width=".26458">
                            <path d="m79.858 37.77h-11.931l-2.0836 6.7469h-9.3018l13.246-36.116h8.1855l13.345 36.116h-9.3514zm-9.8475-6.7221h7.7639l-3.8943-12.526z" />
                            <path d="m93.972 44.517v-36.116h11.633q4.7873 0 8.6072 2.1828 3.8199 2.158 5.9531 6.1268 2.158 3.9439 2.1828 8.8553v1.6619q0 4.9609-2.1084 8.9049-2.0836 3.9191-5.9035 6.1516-3.7951 2.2076-8.4832 2.2324zm8.7064-29.394v22.696h3.0262q3.7455 0 5.7547-2.6541 2.0092-2.6789 2.0092-7.9375v-1.5627q0-5.2338-2.0092-7.8879-2.0092-2.6541-5.8539-2.6541z" />
                            <path d="m140.23 31.768h-4.7129v12.75h-8.7064v-36.116h14.213q6.4244 0 10.046 2.8525 3.6215 2.8525 3.6215 8.0615 0 3.7703-1.5379 6.2508-1.5131 2.4805-4.7625 4.0184l7.5406 14.56v0.37207h-9.3266zm-4.7129-6.7221h5.5066q2.4805 0 3.7207-1.2898 1.265-1.3146 1.265-3.6463 0-2.3316-1.265-3.6463-1.265-1.3395-3.7207-1.3395h-5.5066z" />
                            <path d="m182.35 29.213h-13.692v8.6072h16.173v6.6973h-24.879v-36.116h24.929v6.7221h-16.222v7.615h13.692z" />
                            <path d="m208.94 37.77h-11.931l-2.0836 6.7469h-9.3018l13.246-36.116h8.1856l13.345 36.116h-9.3514zm-9.8475-6.7221h7.7639l-3.8943-12.526z" />
                            <path d="m223.06 44.517v-36.116h12.973q6.9701 0 10.592 2.5549 3.6463 2.5549 3.6463 7.4166 0 2.8029-1.2898 4.7873-1.2898 1.9844-3.7951 2.927 2.8277 0.74414 4.3408 2.7781 1.5131 2.034 1.5131 4.9609 0 5.3082-3.3734 7.9871-3.3486 2.6541-9.9467 2.7037zm8.7064-15.354v8.6568h5.7051q2.3564 0 3.6215-1.0666 1.265-1.0914 1.265-3.051 0-4.5145-4.4896-4.5393zm0-5.7051h4.5392q2.8525-0.0248 4.068-1.0418 1.2154-1.017 1.2154-3.0014 0-2.282-1.3146-3.2742-1.3146-1.017-4.2416-1.017h-4.2664z" />
                            <path d="m268.08 31.073-3.5719 3.9191v9.525h-8.7064v-36.116h8.7064v15.925l3.0262-4.5889 7.7887-11.336h10.765l-12.204 15.974 12.204 20.141h-10.319z" />
                        </g>
                    </g>
                </svg>
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

    <!-- company description -->
    <?php include "backend/getCompanyDesc.php"; ?>
    <!-- reviews container -->
    <div class="container company-reviews p-sm-3 py-2">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link tap-btn mx-1 active" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="true">Reviews</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link tap-btn mx-1" id="pills-event-tab" data-bs-toggle="pill" data-bs-target="#pills-event" type="button" role="tab" aria-controls="pills-event" aria-selected="false">Event</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link tap-btn mx-1" id="pills-announcement-tab" data-bs-toggle="pill" data-bs-target="#pills-announcement" type="button" role="tab" aria-controls="pills-announcement" aria-selected="false">Announcement</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                <div class="row">
                    <div class="col">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-7 col-md-9 col-lg-9">
                                    <h3>Reviews</h3>
                                </div>
                                <div class="col-5 col-md-3 col-lg-3">
                                    <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#writeReview" aria-expanded="false" aria-controls="writeReview">Write a review</button>
                                </div>
                            </div>

                            <div class="collapse multi-collapse" id="writeReview">
                                <br>
                                <div class="row">
                                    <form action="backend/writeReview.php?compID=<?php echo $_GET['compID'] ?>" method="post">
                                        <textarea class="form-control" id="reviewText" name="reviewText" rows="3"></textarea>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary float-end my-1" id="add_review" name="add_review">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php include "backend/getReviews.php";
                        ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
                <div class="col">
                    <?php include "backend/getEvents.php";
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-announcement" role="tabpanel" aria-labelledby="pills-announcement-tab">
                <div class="col">
                    <?php include "backend/getAnnouncements.php";
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>