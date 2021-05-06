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

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Home</title>
</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div style="width: 270px; height: 50px">
                    <svg width="270px" height="50px" viewBox="0 0 286.08911 52.916668" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g transform="translate(229.60109,108.64926)" inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1">
                            <g inkscape:export-ydpi="72" inkscape:export-xdpi="72" transform="translate(-463.94631,-91.380469)" id="g978">
                                <path id="rect849-7" style="fill:#172457;fill-opacity:1;stroke:none;stroke-width:10.5833;stroke-linecap:square;stroke-miterlimit:5" d="M 234.34522,-17.268789 V 35.64788 h 52.91667 v -52.916669 z m 11.3647,8.400521 h 30.18729 v 6.72207 H 265.05758 V 27.24736 h -8.70646 V -2.146198 h -10.6412 z" />
                                <text xml:space="preserve" style="font-style:normal;font-weight:normal;font-size:50.8px;line-height:1.25;font-family:sans-serif;fill:#172457;fill-opacity:1;stroke:none;stroke-width:0.264583" x="290.96616" y="27.24736" id="text847">
                                    <tspan sodipodi:role="line" id="tspan845" x="290.96616" y="27.24736" style="font-style:normal;font-variant:normal;font-weight:900;font-stretch:normal;font-size:50.8px;font-family:Roboto;-inkscape-font-specification:'Roboto Heavy';fill:#172457;fill-opacity:1;stroke-width:0.264583">ADREABK</tspan>
                                </text>
                            </g>
                        </g>
                    </svg>

                </div>
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary active" aria-current="page" href="studentHome.php">Home</a>
                    <a class="nav-link btn btn-outline-primary" href="profile.php">Profile</a>
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
                    <a class="btn btn-outline-primary mx-2 " href="../general_backend/logout.php">
                        <i class="bi bi-box-arrow-right d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            </nav>
        </div>
    </nav>

    <div class="container mx-auto my-5" style="width: 75%;">
        <div class="row row-cols-1 row-cols-md-3 g-5">
            <div class="col">
                <a href="profile.php" class="text-decoration-none">
                    <div class="card" style="height: 20rem;">
                        <div class="position-absolute top-0 start-50 translate-middle-x" style="font-size: 10em; z-index: 100;">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="card-body d-flex align-items-end">
                            <p class="text mb-0 text-truncate">Profile</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="ViewRequestStatus.php" class="text-decoration-none">
                    <div class="card" style="height: 20rem;">
                        <div class="position-absolute top-0 start-50 translate-middle-x" style="font-size: 10em; z-index: 100;">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>
                        <div class="card-body d-flex align-items-end">
                            <p class="text mb-0 text-truncate">Requests</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="companies.php" class="text-decoration-none">
                    <div class="card" style="height: 20rem;">
                        <div class="position-absolute top-0 start-50 translate-middle-x" style="font-size: 10em; z-index: 100;">
                            <i class="bi bi-list-ul"></i>
                        </div>
                        <div class="card-body d-flex align-items-end">
                            <p class="text mb-0 text-truncate">Companies</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <?php
                if ($_SESSION["compID"] != "") {
                    $reportPage_a = "<a href='progress_report.php' class='text-decoration-none'>";
                    $reportPage_a2 = "</a>";
                    $alertE = "";
                } else {
                    $reportPage_a = "";
                    $reportPage_a2 = "";
                    $alertE = "onclick='alert(\"You are not associated with a company!\");'";
                }
                ?>
                <?php echo $reportPage_a; ?>
                <div class="card" style="height: 20rem;" <?php echo $alertE; ?>>
                    <div class="position-absolute top-0 start-50 translate-middle-x" style="font-size: 10em; z-index: 100;">
                        <i class="bi bi-file-earmark-arrow-up"></i>
                    </div>
                    <div class="card-body d-flex align-items-end">
                        <p class="text mb-0 text-truncate">Progress Report</p>
                    </div>
                </div>
                <?php echo $reportPage_a2; ?>
            </div>

        </div>
    </div>

    <hr class="invisible">



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>