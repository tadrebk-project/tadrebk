<?php
// this is how to get the majors
if (isset($_POST['submit'])) {
    if (!empty($_POST['Select'])) {
        foreach ($_POST['Select'] as $selected) {
            echo '  ' . $selected;
        }
    } else {
        echo 'Please select the value.';
    }
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


    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>New Training Application</title>

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