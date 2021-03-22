<?php
//to check if the file that includes this code is two level far from the required page or one level.
if(file_exists("../general_backend/sessionStart.php")){
    require "../general_backend/sessionStart.php";
    require "../general_backend/conn.php";
}
elseif (file_exists("../../general_backend/sessionStart.php")){
    require "../../general_backend/sessionStart.php";
    require "../../general_backend/conn.php";
}
else{
    require "general_backend/sessionStart.php";
    require "general_backend/conn.php";
}

$query = "SELECT * FROM company where status = 'pending'";


if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="";
        while($row=mysqli_fetch_array($result)){
            //$str .= "<tr><td>".$row['text']."</td><td>".$row['date']."</td><td>".$row['studentID']."</td>" where compID=".$_GET['compID'];

            $str .= "<div class='company'>
                <p class='fs-3 fw-bold mb-4'>".$row['name']."</p>
                <p>".$row['description']."</p>
                <hr>
                <p class='fs-5 fw-bold'>Location: ".$row['location']."</p>
                <p class='fs-5 fw-bold'>Website: ".$row['website']."</p>
                <!--  accept and reject buttons-->
                <div class='row justify-content-center' style='padding-bottom: 5px;'>
                    <div class='col-4 col-md-2'>
                        <form action='backend/acceptAssociationRequest.php' method='post'>
                            <input type='text' value='".$row['compID']."' name='compID' hidden></input>
                            <input type='submit' class='btn btn-primary align-self-center' id='acceptAssociation' name='acceptAssociation' onclick='return checkDelete()' value='Accept'></input>
                            <script language='JavaScript' type='text/javascript'>
                                function checkDelete() {
                                    return confirm('Are you sure?');
                                }
                            </script>
                        </form>
                    </div>
                    <div class='col-4 col-md-2'>
                        <form action='backend/rejectAssociationRequest.php' method='post'>
                            <input type='text' value='".$row['compID']."' name='compID' hidden></input>
                            <input type='submit' class='btn btn-primary align-self-center' id='rejectAssociation' name='rejectAssociation' onclick='return checkDelete()' value='Reject'></input>
                            <script language='JavaScript' type='text/javascript'>
                                function checkDelete() {
                                    return confirm('Are you sure?');
                                }
                            </script>
                        </form>
                    </div>
                </div>



            </div>";
          }

        echo $str;
    }
    else {
        echo "There are no association requests";
    }
}

mysqli_close($conn);

?>
