<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: Login.html');
}
?>

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

    <link rel="icon" type="image/png" href="resources/Tadreabk favicon.png" />
    <title>Login</title>
</head>

<body>


    <!-- Just an image -->
    <nav class="navbar navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
        </div>
    </nav>

    <div class=" d-flex justify-content-center Center-Container">
        <div class="card align-self-center mx-3" style="width: 30rem;">
            <div class="card-body d-flex flex-column justify-content-center">
                <p class="text">Hello, <?php echo $_SESSION['type'] ?>. </p>
                <br>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>

</body>

</html>