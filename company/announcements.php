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

    <link rel="stylesheet" href="company.css">

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Announcements</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="companyHome.php">
                <img src="../general_resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="#">Students</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="trainingApplications.php">Applications</a>
                    <a class="nav-link btn btn-outline-primary nav-btn active" aria-current="page" href="announcements.php">Announcements</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="events.php">Events</a>
                </nav>
            </div>
            <nav class="d-flex mx-auto">
                <div class="container d-flex justify-content-center" style="width: 270px; margin-left: 0.5rem; margin-right: 0.5rem;">
                    <a class="btn btn-outline-primary mx-2 nav-btn" href="../general_backend/logout.php">
                        <i class="bi bi-box-arrow-right d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            </nav>
        </div>
    </nav>

    <div class="container mx-auto my-4">
        <div class="card">
            <div class="card-body">
                <div class="mx-3">
                    <div class="d-md-flex justify-content-between">
                        <p class="text">Announcements</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
                            Add a new announcement
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title w-100" id="addAnnouncementModalLabel">Add a new announcement</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="titleInput" class="form-label">Announcement title</label>
                                            <input type="text" id="titleInput" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="descriptionInput" class="form-label">Announcement description</label>
                                            <textarea class="form-control" id="descriptionInput" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="mx-auto">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" id="submitAnnouncement" name="submitAnnouncement" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='card card-body remove_container'>
                        <b>
                            title
                        </b>
                        details
                        <br>
                        <i>
                            date
                        </i>
                        <form action='#' method='post'>
                            <input type='text' value='1' name='annID' hidden></input>
                            <button type='submit' class='remove_button' id='removeAnnouncement' name='removeAnnouncement' onClick='return confirm("are you sure you want to delete the announcement!");'>
                                <i class="bi bi-trash icon"></i>
                                <i class="bi bi-trash-fill icon-fill"></i>
                            </button>
                        </form>
                    </div>
                    <br>

                    <!-- copy this for getAnnouncements.php-->
                    <div class='card card-body remove_container'>
                        <b>
                            ".$row['title']."
                        </b>
                        ".$row['details']."
                        <br>
                        <i>
                            ".$row['date']."
                        </i>
                        <form action='backend/removeAnnouncement.php' method='post'>
                            <input type='text' value='".$row['annID']."' name='annID' hidden></input>
                            <button type='submit' class='remove_button' id='removeAnnouncement' name='removeAnnouncement' onClick='return confirm(\"are you sure you want to delete the announcement!\");'>
                                <i class='bi bi-trash icon'></i>
                                <i class='bi bi-trash-fill icon-fill'></i>
                            </button>    
                        </form>
                    </div>
                    <br>
                    <!-- end -->

                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>