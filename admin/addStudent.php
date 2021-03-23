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
    <title>Manage Students</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="companyHome.php">
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
                <nav>
                    <div class="nav nav-tabs px-3" id="nav-tab" role="tablist">
                        <div class="d-flex align-self-center pe-3">Choose a method:</div>
                        <button class="nav-link active tap-btn" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="true">Register student</button>
                        <button class="nav-link tap-btn" id="nav-csv-tab" data-bs-toggle="tab" data-bs-target="#nav-csv" type="button" role="tab" aria-controls="nav-csv" aria-selected="false">CSV file</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                        <div class="px-3 pt-3">
                            <form action="#">
                                <div class="mb-3 row">
                                    <label for="inputStudentID" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputStudentID">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputGPA" class="col-sm-2 col-form-label">GPA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputGPA">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputMajor" class="col-sm-2 col-form-label">Major</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputMajor">
                                    </div>
                                </div>
                                <hr style="background-color: #e4e7ef; opacity: 1;">
                                <div class="mb-3 row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control" id="inputUsername">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <script type="text/javascript">
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
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-csv" role="tabpanel" aria-labelledby="nav-csv-tab">
                        <div class="px-3 pt-3">
                            <form action="#">
                                <label for="inputCSV" class="form-label">Upload CSV file</label>
                                <input class="form-control visually-hidden" type="file" id="inputCSV" name="inputCSV" placeholder="progress report" required="" capture accept=".csv">
                                <div class="dashed-border p-1 d-flex justify-content-between">
                                    <p id="file-upload-filename" class="text-muted m-0 align-self-center">CSV file</p>
                                    <button type="button" id="CSVButton" class="btn btn-primary">Browse</button>
                                </div>
                                <div class="py-2">
                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
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