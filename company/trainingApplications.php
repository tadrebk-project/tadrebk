<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="company.css">
    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Training Applications</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="companyHome.php">
                <img src="../general_resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="studentsList.php">Students</a>
                    <a class="nav-link btn btn-outline-primary nav-btn active" aria-current="page" href="trainingApplications.php">Applications</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="announcements.php">Announcements</a>
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
    <div class="container" style="margin-top: 20px;">
    <button class='btn btn-primary align-self-center' onclick="window.location.href='newTrainingApplication.php'">Create training application</button>
    </div>

    <!-- application -->
    <?php include "backend/getApplications.php"; ?>
    


</body>

</html>
