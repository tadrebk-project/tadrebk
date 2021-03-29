<?php
//to check if the file that includes this code is two level far from the required page or one level. 
if (file_exists("../general_backend/sessionStart.php")) {
    require "../general_backend/sessionStart.php";
    require "../general_backend/conn.php";
} elseif (file_exists("../../general_backend/sessionStart.php")) {
    require "../../general_backend/sessionStart.php";
    require "../../general_backend/conn.php";
} else {
    require "general_backend/sessionStart.php";
    require "general_backend/conn.php";
}

if (isset($_GET['compID'])) {
    $query = "SELECT * FROM application where compID=" . $_GET['compID'];
    if ($result = mysqli_query($conn, $query)) {
        if (mysqli_num_rows($result) > 0) {
            //(here table)
            $str = "";
            while ($row = mysqli_fetch_array($result)) {
                $trainingType = "";
                if ($row['trainingType'] == 'summer') {
                    $trainingType = "Summer Training";
                } elseif ($row['trainingType'] == 'COOP') {
                    $trainingType = "CO-OP";
                }
                $str2 = "";
                $query2 = "SELECT name from major where MID in (SELECT MID from requiredmajors where appID = '" . $row['appID'] . "')";
                if ($result2 = mysqli_query($conn, $query2)) {
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $str2 .= $row2["name"] . ", ";
                        }
                        $str2 = substr($str2, 0, -2);
                    } else {
                        $str2 = "No required majors is specified...";
                    }
                }
                $str .= "<div class='container-sm app'>
                <div class='row'>
                    <div class='col-12 col-md-10' style='padding-top: 5px;'>
                        <h4>" . $row['name'] . "</h4>
                        <p>" . $row['description'] . "</p>
                    </div>
                    <div class='col-3 col-md-2' style='display: flex; align-items: center; justify-content: center;'>
                    <form action='backend/insertRequest.php?appID= " . $row['appID'] . "&compID=" . $_GET['compID'] . "' method='post'>
                            <button type='submit' class='btn btn-primary' id='add_request' name='add_request'>Request</button>
                    </form>
                    </div>
                </div>
                <hr>
                <div class='row'>
                    <div class='col'>
                        <h5>Training Type: " . $trainingType . "</h5>
                        <h5>Required Majors:</h5>
                        <p>" . $str2 . "</p>
                        <h5>Required GPA: " . $row['reqGPA'] . "</h5>
                    </div>
                </div>
            </div>";
            }
            echo $str;
        } else {
            echo "
            <div class='container-sm app pb-3'>
            No applications available...
            </div>
            ";
        }
    }
} else {
    echo "
            <div class='container-sm app pb-3'>
            No applications available...
            </div>
            ";
}

mysqli_close($conn);
