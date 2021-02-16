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
    <title>Company</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="studentHome.php">
                <img src="resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary" href="studentHome.php">Home</a>
                    <a class="nav-link btn btn-outline-primary" href="#">Profile</a>
                    <a class="nav-link btn btn-outline-primary" href="#">Requests</a>
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
                    <a class="btn btn-outline-primary mx-2 " href="logout.php">
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
    <div class='container-sm app'>
        <div class='row'>
            <div class="col-12 col-md-10" style="padding-top: 5px;">
                <h4>Application name</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam recusandae, asperiores optio voluptatibus fugiat excepturi quasi ex doloremque odit accusamus tempore nulla odio? Provident corporis totam ea omnis perspiciatis culpa debitis excepturi harum quam tempora, dignissimos quaerat optio illo consequatur ut eveniet doloribus quas repellat, saepe qui in assumenda vero.</p>
            </div>
            <div class="col-3 col-md-2" style="display: flex; align-items: center; justify-content: center;">
                <button class='btn btn-primary'>Request</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h5>required majors:</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui libero, praesentium maiores sint aperiam esse. Nisi recusandae blanditiis aperiam vel, dolore exercitationem placeat quod vitae. Earum numquam aliquid maxime nemo.</p>
                <h5>required GPA: 3.0</h5>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>