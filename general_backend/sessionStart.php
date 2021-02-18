<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start(); 
    }

    
    if (!isset($_SESSION['userid'])) {   
        //to check if the file that includes this code is two level far from the required page or one level.   
        if(file_exists("../Login.html")){
            header('location: ../Login.html');
        }
        elseif (file_exists("../../Login.html")){
            header('location: ../../Login.html');
        }
        else{
            header('location: Login.html');
        }
    }
?>