<?php 
    include('../functions/myfunction.php'); // admin middleware pang call ng myfucntion.php
    if(isset($_SESSION['auth'])){
        if($_SESSION['role_as'] != 1){
            redirect("../index.php", "You are not authorize to access this page");
        }
    }else{
        redirect("../index.php", "Login to continue");
    }
?>