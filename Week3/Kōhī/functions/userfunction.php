<?php 
    // session_start(); 
    include('config/dbcon.php');

    function getAllActive($tbl_menu){
        global $con;
        $q = "SELECT * FROM $tbl_menu WHERE status='0' "; // 0 = active 1 = not visible to the users
        return $q = mysqli_query($con, $q);
    }
    
    function getAllTrending(){
        global $con;
        $q = "SELECT * FROM tbl_products WHERE trending='1' "; // 0 = active 1 = not visible to the users
        return $q = mysqli_query($con, $q);
    }

    function getSlugActive($tbl_category, $slug){
        global $con;
        $q = "SELECT * FROM $tbl_category WHERE slug='$slug' AND status='0' LIMIT 1";
        return $q = mysqli_query($con, $q);
    }
    
    function getProdByCategory($category_id){
        global $con;
        $q = "SELECT * FROM tbl_products WHERE category_id='$category_id' AND status='0' ";
        return $q = mysqli_query($con, $q);
    }

    function getIDActive($tbl_menu){
        global $con;
        $q = "SELECT * FROM $tbl_menu WHERE status='0' AND status='0' ";
        return $q = mysqli_query($con, $q);
    }

    function getByAccId(){
        global $con;
        $userId = $_SESSION['auth_user']['user_id'];
        $q = "SELECT * FROM tbl_users WHERE id= '$userId' ";
        return $q = mysqli_query($con, $q);
    }
    
    // connected sa auth
    function getCartItems(){
        global $con;
        $userId = $_SESSION['auth_user']['user_id'];
        $q = "SELECT c .id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.price 
                FROM tbl_carts c, tbl_products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";

        return $q = mysqli_query($con, $q); # recode $q if mag throw ng error
    }

    function getOrders(){
        global $con;
        $userId = $_SESSION['auth_user']['user_id'];
        $q = "SELECT * FROM tbl_orders WHERE user_id='$userId' ORDER BY id DESC ";
        return $q = mysqli_query($con, $q);  // $q
    }
    
    function redirect($url, $message){
        $_SESSION['message'] =  $message;
        header('Location:' .$url);
        exit();
    }

    function checkTrackingNoValid($trackingNo){
        global $con;
        $userId = $_SESSION['auth_user']['user_id'];

        $q = "SELECT * FROM tbl_orders WHERE tracking_no='$trackingNo' AND user_id='$userId' ";
        return $q = mysqli_query($con, $q);
    }
?>