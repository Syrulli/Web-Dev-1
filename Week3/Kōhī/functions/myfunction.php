<?php 
    session_start();
    include('../config/dbcon.php');

    // ADMIN SIDE FUNC 
    // Menu func
    function getAll($tbl_category){
        global $con;
        $q = "SELECT * FROM $tbl_category";
       return $q = mysqli_query($con, $q);
    }

    // Edit item func
    function getByID($tbl_category, $id){
        global $con;
        $q = "SELECT * FROM $tbl_category WHERE id='$id' ";
       return $q = mysqli_query($con, $q);
    }
    // END ADMIN SIDE FUNC 
    
    

    function redirect($url, $message){
        $_SESSION['message'] =  $message;
        header('Location:' .$url);
        exit();
    }

    function getAllOrders(){
        global $con;
        $q = "SELECT * FROM tbl_orders WHERE status='0' ";
       return $q = mysqli_query($con, $q);
    }

    function getOrderHistory(){
        global $con;
        $q = "SELECT * FROM tbl_orders WHERE status !='0' ";
       return $q = mysqli_query($con, $q);
    }

    function checkTrackingNoValid($trackingNo){
        global $con;

        $q = "SELECT * FROM tbl_orders WHERE tracking_no='$trackingNo' ";
        return $q = mysqli_query($con, $q);
    }
    
?>