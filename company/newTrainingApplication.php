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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="company.css">


    <link rel="icon" type="image/png" href="../general_resources/Tadreabk_favicon.png"/>
    <title>New Training Application</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="companyHome.php">
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
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="studentsList.php">Students</a>
                    <a class="nav-link btn btn-outline-primary nav-btn active" aria-current="page" href="trainingApplications.php">Applications</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="announcements.php">Announcements</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="events.php">Events</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="representatives.php">Representatives</a>
                </nav>
            </div>
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

    <div class="container con" style="background-color: white;">
        <form action="backend/getNewApplication.php?compID=<?php echo $_SESSION['compID'] ?>" method="post">
            <p class="text text-center">Create a new application</p>
            <br>
            <!-- training name -->
            <div class="mb-3">
                <label for="TrainingName" class="form-label">Training name</label>
                <input type="text" class="form-control" id="TrainingName" name="TrainingName" placeholder="Name here" required>
            </div>
            <!-- training type -->
            <div class="mb-3">
                <label for="TrainingName" class="form-label">Training type</label>
                <select id="Select" class="form-select" name="TrainingType" required>
                    <option selected value="" disabled>select</option>
                    <option value="summer">Summer Training</option>
                    <option value="COOP">CO-OP</option>
                </select>
            </div>
            <!-- training description -->
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Training description</label>
                <textarea class="form-control" placeholder="Description here" id="TrainingDescription" name="TrainingDescription" required></textarea>
            </div>
            <br>
            <!-- Multiple Select -->
            <div class="form-group row">
                <label class="col-12 col-lg-3">
                    Select reqired majors:
                </label>
                <div class="col-12 col-lg-9">
                    <select class="multiple-select" multiple="multiple" id="Select" name="Select[]" required>
                        <?php include "backend/getMajors.php"; ?>
                    </select>
                </div>
            </div>
            <!-- GPA -->
            <br>
            <div class="row">
                <div class="col-4 col-sm-3">
                    <label for="GPA" class="form-label">Required GPA:</label>
                </div>
                <div class="col-3 col-sm-2">
                    <input type="text" class="form-control" id="gpa" name="gpa" placeholder="" required>
                </div>
            </div>
            <br><br>
            <div class="row justify-content-evenly">
                <div class="col-2">
                    <!-- <input id="submitApplication" class='btn btn-primary align-self-center' name="submitApplication"  type="Submit"></input> -->
                    <button type="submit" id="submitApplication" name="submitApplication" class="btn btn-primary align-self-center">Create</button>
                </div>
                <div class="col-1">
                    <button class='btn btn-primary align-self-center' name="button" value="ok" type="button" onclick="window.location.href='trainingApplications.php'">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script>
        $(function() {
            $('.multiple-select').multipleSelect({})
        })
    </script>
</body>

</html>