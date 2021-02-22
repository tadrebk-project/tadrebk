<?php
//to check if the file that includes this code is two level far from the required page or one level. 
if(file_exists("../general_backend/sessionStart.php")){
    require "../general_backend/sessionStart.php";
}
elseif (file_exists("../../general_backend/sessionStart.php")){
    require "../../general_backend/sessionStart.php";
}
else{
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="project.css">

    <link rel="icon" type="image/png" href="../general_resources/Tadreabk favicon.png" />
    <title>Profile</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="studentHome.php">
                <img src="../general_resources/Tadreabk logo.png" alt="" width="270" height="50">
            </a>
            <div class="container d-flex mx-auto flex-column">
                <nav class="nav nav-masthead justify-content-center float-md">
                    <a class="nav-link btn btn-outline-primary" href="studentHome.php">Home</a>
                    <a class="nav-link btn btn-outline-primary active" href="profile.php">Profile</a>
                    <a class="nav-link btn btn-outline-primary" href="ViewRequestStatus.php">Requests</a>
                    <a class="nav-link btn btn-outline-primary" href="Companies.php">Companies</a>
                </nav>
            </div>
            <nav class="d-flex mx-auto">
                <div class="container d-flex justify-content-center"
                    style="width: 270px; margin-left: 0.5rem; margin-right: 0.5rem;">
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

    <div class="container">
        <div class="row" style="min-height: calc(100vh - 90px);">
            <div class="col-12 col-lg-3 my-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-auto d-block" id="profile-container">
                            <img id="profileImage" src="../general_resources/abstract-user.svg" class="rounded-circle"
                                alt="Profile Photo" height="250px" width="250px">
                            <div id="ChangeImageOverlay">
                                <i class="bi bi-arrow-up-circle"></i>
                                <div>Change Image</div>
                            </div>
                        </div>
                        <input class="visually-hidden" id="imageUpload" type="file" name="profile_photo"
                            placeholder="Photo" required="" capture accept="image/*" />
                        <script>
                            $("#ChangeImageOverlay").click(function (e) {
                                $("#imageUpload").click();
                            });

                            function previewProfileImage(uploader) {
                                //ensure a file was selected 
                                if (uploader.files && uploader.files[0]) {
                                    var imageFile = uploader.files[0];
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        //set the image data as source
                                        $('#profileImage').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(imageFile);
                                }
                            }

                            $("#imageUpload").change(function () {
                                previewProfileImage(this);
                            });
                        </script>
                        <div class="my-3">
                            <p style="font-size: 3rem;">
                                Saleh Almaqwashy
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 my-4">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="InputName" class="form-label">Name</label>
                                <div class="input-group">
                                    <input type="text" placeholder='Saleh Almaqwashy' class="form-control"
                                        id="InputName" disabled>
                                    <button type="button" class="btn btn-primary"
                                        onclick="toggleEnable('InputName')">Update</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="InputPhone" class="form-label">Phone number</label>
                                <div class="input-group">
                                    <input type="tel" placeholder='+966505555555' class="form-control" id="InputPhone"
                                        pattern="[+][0-9]{3}[0-9]{9}" disabled>
                                    <button type="button" class="btn btn-primary"
                                        onclick="toggleEnable('InputPhone')">Update</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="InputEmail" class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="email" placeholder='email@domain.com' class="form-control"
                                        id="InputEmail" aria-describedby="emailHelp" disabled>
                                    <button type="button" class="btn btn-primary"
                                        onclick="toggleEnable('InputEmail')">Update</button>
                                </div>
                            </div>
                            <script>
                                function toggleEnable(id) {
                                    var textbox = document.getElementById(id);

                                    if (textbox.disabled) {
                                        document.getElementById(id).disabled = false;

                                    } else {
                                        document.getElementById(id).disabled = true;
                                        // code here
                                    }
                                }
                            </script>
                            <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
                        </form>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p style="font-size: 1.2rem;">CV</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <a id="file-upload-filename" class="align-self-center" href="">CV_name.pdf</a>
                                <button type="button" id="CVUploadButton" class="btn btn-primary">Upload</button>
                                <input class="visually-hidden" id="CVUpload" type="file" name="profile_CV"
                                    placeholder="CV" required="" capture accept=".pdf" />
                                <script>
                                    $("#CVUploadButton").click(function (e) {
                                        $("#CVUpload").click();
                                    });

                                    var input = document.getElementById('CVUpload');
                                    var infoArea = document.getElementById('file-upload-filename');

                                    input.addEventListener('change', showFileName);

                                    function showFileName(event) {
                                        // the change event gives us the input it occurred in 
                                        var input = event.srcElement;
                                        var fileName = input.files[0].name;

                                        infoArea.textContent = fileName;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>