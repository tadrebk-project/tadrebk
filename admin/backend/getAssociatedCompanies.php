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

$query = "SELECT * FROM company where status = 'available'";

if($result=mysqli_query($conn, $query)){
    if(mysqli_num_rows($result)>0){
        //(here table)
        $str ="";

        while($row=mysqli_fetch_array($result)){
            //$str .= "<tr><td>".$row['text']."</td><td>".$row['date']."</td><td>".$row['studentID']."</td>" where compID=".$_GET['compID'];

            $str .= "<div class='d-flex justify-content-between'>
                <p class='mb-0 mt-2'>".$row['name']."</p>
                <form action='backend/disassociatedCompany.php' method='post'>
                    <input type='text' value='".$row['compID']."' name='compID' hidden></input>
                    <input type='submit' class='btn btn-primary align-self-center' id='disassociate' name='disassociate' onclick='return checkDelete()' value='Disassociate'></input>
                    <script language='JavaScript' type='text/javascript'>
                        function checkDelete() {
                            return confirm('Are you sure?');
                        }
                    </script>
                </form>
            </div>
            <hr>";
          }

        echo $str;
    }
    else {
        echo "There are no assosiated companies";
    }
}

mysqli_close($conn);

?>
