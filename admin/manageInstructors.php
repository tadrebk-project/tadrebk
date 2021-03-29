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

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js" integrity="sha512-2xXe2z/uA+2SyT/sTSt9Uq4jDKsT0lV4evd3eoE/oxKih8DSAsOF6LUb+ncafMJPAimWAXdu9W+yMXGrCVOzQA==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" integrity="sha512-/Ae8qSd9X8ajHk6Zty0m8yfnKJPlelk42HTJjOHDWs1Tjr41RfsSkceZ/8yyJGLkxALGMIYd5L2oGemy/x1PLg==" crossorigin="anonymous" />

    <link rel="stylesheet" href="admin.css">

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Manage Instructor</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="adminHome.php">
                <img src="../general_resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary nav-btn active" aria-current="page" href="manageStudents.php">Students</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="manageCompanies.php">Companies</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="manageInstructors.php">Instructors</a>
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
            <div class="card-body px-0">
                <nav>
                    <div class="nav nav-tabs px-3" id="nav-tab" role="tablist">
                        <div class="d-flex align-self-center pe-3"></div>
                        <button class="nav-link active tap-btn" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="true">Register Instructor</button>
                        <button class="nav-link tap-btn" id="nav-csv-tab" data-bs-toggle="tab" data-bs-target="#nav-csv" type="button" role="tab" aria-controls="nav-csv" aria-selected="false">Delete Instructor</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                        <div class="px-3 pt-3">
                            <form action="backend/registerStudents.php" method="post">
                                <div class="mb-3 row">
                                    <label for="inputInstructorName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputInstructorName" name="inputInstructorName" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputMajor" class="col-sm-2 col-form-label">Major</label>
                                    <div class="col-sm-10">
                                        <select id="inputMajor" name="inputMajor" class="form-select" aria-label="Default select example" required>
                                            <option selected value="">select</option>
                                            <?php include "backend/getMajors.php" ?>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    var DECIMAL_REGEXP = /(?<=^.{1}$)/g;

                                    function handleKeyUp(e) {
                                        var target = e.target;
                                        var charCode = e.which || e.keyCode;

                                        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                            return false;
                                        }

                                        target.value = target.value.replace(DECIMAL_REGEXP, '.');

                                        return true;
                                    }
                                </script>
                                
                                <hr style="background-color: #e4e7ef; opacity: 1;">
                                <div class="mb-3 row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control" id="inputUsername" name="inputUsername" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control" id="inputPassword" name="inputPassword" pattern="^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{10,}$" title="Must contain at least one number and one special character, and at least 10 or more characters" required>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    inputInstructorName.addEventListener('keyup', function() {
                                        if ($('#inputInstructorName').val()) {
                                            document.getElementById('inputUsername').disabled = !this.value
                                            document.getElementById('inputPassword').disabled = !this.value
                                            var usernameFormat = "I" + document.getElementById('inputInstructorName').value.replaceAll(/\s/g,'');
                                            var passwordFormat = "I#" + document.getElementById('inputInstructorName').value.replaceAll(/\s/g,'');
                                        
                                            $('#inputUsername').val(usernameFormat);
                                            $('#inputPassword').val(passwordFormat);
                                        } else {
                                            document.getElementById('inputUsername').disabled = !this.value
                                            document.getElementById('inputPassword').disabled = !this.value
                                            $('#inputUsername').val("");
                                            $('#inputPassword').val("");
                                        };
                                    });
                                </script>
                                <button type="submit" class="btn btn-primary float-end" id="registerManually" name="registerManually">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-csv" role="tabpanel" aria-labelledby="nav-csv-tab">
                    <div class="card-body">
                <p class="text mb-0">Remove Instructor</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include "backend/getInstructor.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end -->
                        
        </div>
        <!-- end -->

    </div>

    <hr class="invisible">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>
