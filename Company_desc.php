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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="project.css">

    <link rel="icon" type="image/png" href="resources/Tadreabk favicon.png"/>
    <title>Company</title>
</head>

<body>

    <!-- Just an image -->
    <nav class="navbar navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="studentHome.php">
                <img src="resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
        </div>
    </nav>
    <!-- company description -->
    <?php include "getData/getCompanyDesc.php"; ?>
    <!-- reviews container -->
    <div class="container-sm company-reviews">
        <div class="row">
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#Reviews" role="button" aria-expanded="false" aria-controls="Reviews">Reviews</a>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Event" aria-expanded="false" aria-controls="Event">Event</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Announcment" aria-expanded="false" aria-controls="Announcment">Announcment</button>
            </p>
              <div class="row">
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
                                <form action ="getData/writeReview.php?compID=<?php echo $_GET['compID']?>" method ="post">
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
                    <?php include "getData/getReviews.php"; ?>
                    
                    
                </div>
                                </div>
                  </div>
                </div>
                <div class="col">
                  <div class="collapse multi-collapse" id="Event">
                        <?php include "getData/getEvents.php"; ?>     
                  </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse" id="Announcment">
                         <?php include "getData/getAnnouncements.php"; ?>      
                    </div>
                  </div>
              </div>
           

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>

</html>