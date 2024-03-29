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

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk_favicon.png"/>
    <title>Manage Students</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="adminHome.php">
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
            <div class="card-body">
                <div class="mx-3">
                    <div class="d-md-flex justify-content-between">
                        <p class="text mb-0">Add Student</p>
                        <a href="manageStudents.php" class="btn btn-primary my-1">Manage Student</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body px-0">
                <div class="d-block d-md-none align-self-center px-3 mb-2">Choose a method:</div>
                <nav>
                    <div class="nav nav-tabs px-3" id="nav-tab" role="tablist">
                        <div class="d-none d-md-flex align-self-center pe-3">Choose a method:</div>
                        <button class="nav-link active tap-btn" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="true">Register student</button>
                        <button class="nav-link tap-btn" id="nav-csv-tab" data-bs-toggle="tab" data-bs-target="#nav-csv" type="button" role="tab" aria-controls="nav-csv" aria-selected="false">CSV file</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                        <div class="px-3 pt-3">
                            <form action="backend/registerStudents.php" method="post">
                                <div class="mb-3 row">
                                    <label for="inputStudentID" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputStudentID" name="inputStudentID" pattern="^[0-9]{9}$" maxlength="9" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="inputName" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputGPA" class="col-sm-2 col-form-label"><abbr title="Out of 4.00">GPA</abbr></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputGPA" name="inputGPA" pattern="^[0-4]\.\d\d$" title="Of the form X.XX" maxlength="4" onkeypress="return handleKeyUp(event)" required>
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
                                <div class="mb-3 row">
                                    <label for="inputMajor" class="col-sm-2 col-form-label">Major</label>
                                    <div class="col-sm-10">
                                        <select id="inputMajor" name="inputMajor" class="form-select" aria-label="Default select example" required>
                                            <option selected value="">select</option>
                                            <?php include "backend/getMajors.php" ?>
                                        </select>
                                    </div>
                                </div>
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
                                <script>
                                    inputStudentID.addEventListener('keyup', function() {
                                        if ($('#inputStudentID').val()) {
                                            document.getElementById('inputUsername').disabled = !this.value
                                            document.getElementById('inputPassword').disabled = !this.value
                                            var usernameFormat = "s" + document.getElementById('inputStudentID').value
                                            var passwordFormat = "Stu#" + document.getElementById('inputStudentID').value
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
                        <div class="px-3 pt-3">
                            <form action="backend/registerStudents.php" method="post" enctype="multipart/form-data" lang="en">
                                <label for="inputCSV" class="form-label">Upload CSV file</label><br>
                                <input class="form-control visually-hidden" type="file" id="inputCSV" name="inputCSV" required="" capture="environment" accept=".csv">
                                <div class="dashed-border p-1 d-flex justify-content-between">
                                    <p id="file-upload-filename" class="text-muted m-0 align-self-center">CSV file</p>
                                    <button type="button" id="CSVButton" class="btn btn-primary">Browse</button>
                                </div>
                                <span class="badge bg-secondary text-wrap">CSV Data format must be in the format: StudentID, Student Name, GPA, Student Major</span><br>
                                <div class="py-2">
                                    <button type="submit" class="btn btn-primary float-end" id="registerByFile" name="registerByFile">Submit</button>
                                </div>
                                <script>
                                    $("#CSVButton").click(function(e) {
                                        $("#inputCSV").click();
                                    });

                                    var input = document.getElementById('inputCSV');
                                    var infoArea = document.getElementById('file-upload-filename');

                                    input.addEventListener('change', showFileName);

                                    function showFileName(event) {
                                        // the change event gives us the input it occurred in
                                        var input = event.srcElement;
                                        var fileName = input.files[0].name;
                                        infoArea.textContent = fileName;
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- end -->

    </div>

    <hr class="invisible">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>
