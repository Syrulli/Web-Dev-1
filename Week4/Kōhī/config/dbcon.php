<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project_lloyd";

    // Creating database con.
    $con = mysqli_connect($host, $username, $password, $database);
    // Check database con.
    if(!$con){
        die("Connection Failed". mysqli_connect_error());
    }
?>