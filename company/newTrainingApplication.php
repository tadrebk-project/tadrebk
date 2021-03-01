<?php 
        // this is how to get the majors
        if(isset($_POST['submit'])){
            if(!empty($_POST['majors'])) {
                foreach($_POST['majors'] as $selected){
                  echo '  ' . $selected;
                }          
              } else {
                echo 'Please select the value.';
              }
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
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="#">Students</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="trainingApplications.php">Application</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="#">Announcement</a>
                    <a class="nav-link btn btn-outline-primary nav-btn" aria-current="page" href="#">Events</a>
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

    <div class="container con" style="background-color: white;">
        <form action="" method="post">
           <p class="text text-center">Create a new application</p>
            <br>
            <!-- training name -->
            <div class="mb-3">
                <label for="TrainingName" class="form-label">Training name</label>
                <input type="text" class="form-control" id="TrainingName" placeholder="Name here">
            </div>
            <!-- training type -->
            <div class="mb-3">
                <label for="TrainingName" class="form-label">Training type</label>
                <input type="text" class="form-control" id="TrainingName" placeholder="Type here">
            </div>
            <!-- training description -->
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Training description</label>
                <textarea class="form-control" placeholder="Description here" id="TrainingDescription"></textarea>
            </div>
            <br>
            <!-- Multiple Select -->
            <div class="form-group row">
                <label class="col-12 col-lg-3">
                    Select reqired majors: 
                </label>
                <div class="col-12 col-lg-9">
                    <select multiple="multiple" id="select" name="majors[]">
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
                <input type="text" class="form-control" id="TrainingName" placeholder="">
                </div>
            </div>
            <br><br>
            <div class="row justify-content-evenly" >
                <div class="col-2">
                    <input type="submit" name="submit" class='btn btn-primary align-self-center'></input>
                </div>
                <div class="col-1">
                    <button class='btn btn-primary align-self-center'>Cancle</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script>
        $(function() {
            $('select').multipleSelect()
        })


    </script>
</body>

</html>
