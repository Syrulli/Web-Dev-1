<?php

    // session_start();
    include('../config/dbcon.php');
    include('../functions/myfunction.php');

    // ADD CATEGORY FUNCTIONS
        if (isset($_POST['add_category_btn'])) {
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $description = $_POST['description'];

            // storing image in database suckss
            $image = $_FILES['image']['name'];
            $path = "../uploaded";
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time() . '.' . $image_ext;

            $status = isset($_POST['status']) ? '1' : '0';
            $popular = isset($_POST['popular']) ? '1' : '0';

            $cate_query = "INSERT INTO tbl_category (
                            name,
                            slug,
                            description, 
                            image, 
                            status,
                            popular
                    ) VALUES ('
                            $name', 
                            '$slug', 
                            '$description', 
                            '$filename',
                            '$status',
                            '$popular'
                    )";

            $cate_query_run = mysqli_query($con, $cate_query);

            if ($cate_query_run) {
                move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
                redirect("category.php", "Item Added Successfully");
            } else {
                redirect("category.php", "Something Went Wrong");
            }
        }
    // ADD CATEGORY FUNCTIONS

    // UPDATE CATEGORY FUNCTIONS      
        else if (isset($_POST['update_category_btn'])) {
            //FETCH all Values
            $tbl_menu_id = $_POST['tbl_menu_id'];
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $description = $_POST['description'];
            $status = isset($_POST['status']) ? '1' : '0';
            $popular = isset($_POST['popular']) ? '1' : '0';

            // IMAGE STORING
            $new_image = $_FILES['image']['name'];
            $old_image = $_POST['old_image'];

            if ($new_image != "") {
                // $update_filename = $new_image;
                $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
                $update_filename = time() . '.' . $image_ext;
            } else {
                $update_filename = $old_image;
            }
            $path = "../uploaded";

            $update_query = "UPDATE tbl_category SET 
                name='$name', 
                slug='$slug', 
                description='$description', 
                status='$status', 
                popular='$popular', 
                image='$update_filename' 
                WHERE id='$tbl_menu_id' 
            ";
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run){
                if ($_FILES['image']['name'] != ""){
                    // move new image to the folder
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
                    // Delete old image
                    if (file_exists("../uploaded/" . $old_image)){
                        unlink("../uploaded/" . $old_image);
                    }
                }
                redirect("category.php?id=$tbl_menu_id", "Item Updated Successfully!");
            }else{
                redirect("category.php?id=$tbl_menu_id", "Item Updated Successfully!");
            }
        }
    // UPDATE CATEGORY FUNCTIONS

    // DELETE CATEGORY FUNCTIONS
        else if(isset($_POST['delete_category_btn'])){
            $tbl_menu_id = mysqli_real_escape_string($con, $_POST['tbl_menu_id']);

            $tbl_menu_query = "SELECT * FROM tbl_category WHERE id='$tbl_menu_id' ";
            $tbl_menu_query_run = mysqli_query($con, $tbl_menu_query);
            $tbl_menu_data = mysqli_fetch_array($tbl_menu_query_run);
            $image = $tbl_menu_data ['image'];

            $delete_query = "DELETE FROM tbl_category WHERE id='$tbl_menu_id' ";
            $delete_query_run = mysqli_query($con, $delete_query);

            if($delete_query_run){
                if(file_exists("../uploaded/".$image)){
                    unlink("../uploaded/".$image);
                }
                // redirect("menu.php", "Item Deleted Successfully!");
                echo 200;
            }else{
                // redirect("menu.php", "Something Went Wrong!");
                echo 500;
            }
        }
    // DELETE CATEGORY FUNCTIONS

    // ADD PRODUCTS FUNCTIONS
        else if(isset($_POST['add_product_btn'])){

            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $image = $_FILES['image']['name'];
            $path = "../uploaded";
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time() . '.' . $image_ext;
            
            $status = isset($_POST['status']) ? '1' : '0';
            $trending = isset($_POST['trending']) ? '1' : '0';

            if($name !== "" &&  $slug !== "" &&  $description !== ""){
                $product_query = "INSERT INTO tbl_products (
                        category_id,
                        name,
                        slug,
                        description,
                        price,
                        qty,
                        status,
                        trending,
                        image
                )
                VALUES('
                        $category_id',
                        '$name',
                        '$slug',
                        '$description',
                        '$price',
                        '$qty',
                        '$status',
                        '$trending',
                        '$filename'
                )";

                $product_query_run = mysqli_query($con, $product_query);
                if($product_query_run){
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
                    redirect("product.php", "Product Added Successfully");
                }else{
                    redirect("product.php", "Something Went Wrong");
                }
            }
            else{
                redirect("product.php", "All Fields are Mandatory");
            }
        }   
    // ADD PRODUCTS FUNCTIONS

    // EDIT PRODUCTS FUNCTIONS
        else if(isset($_POST['update_product_btn'])){

            $product_id = $_POST['product_id'];
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $status = isset($_POST['status']) ? '1' : '0';
            $trending = isset($_POST['trending']) ? '1' : '0';
           
            $path = "../uploaded";
            
            // IMAGE STORING
            $new_image = $_FILES['image']['name'];
            $old_image = $_POST['old_image'];

            if ($new_image != "") {
                // $update_filename = $new_image;
                $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
                $update_filename = time() . '.' . $image_ext;
            }else{
                $update_filename = $old_image;
            }

            // Query to update database
            $update_product_query = "UPDATE tbl_products SET
                -- category_id'$category_id',
                category_id='$category_id',
                name='$name',
                slug='$slug',
                description='$description',
                price='$price',
                qty='$qty',
                status='$status',
                trending='$trending',
                image='$update_filename' WHERE id='$product_id' ";
            $update_product_query_run = mysqli_query($con, $update_product_query);

            if ($update_product_query_run){
                if ($_FILES['image']['name'] != ""){
                    // move new image to the folder
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
                    // Delete old image
                    if (file_exists("../uploaded/" . $old_image)){
                        unlink("../uploaded/" . $old_image);
                    }
                }
                redirect("edit_product.php?id=$product_id", "Product Updated Successfully!");
            }else{
                redirect("edit_product.php?id=$product_id", "Product Updated Successfully!");
            }

        }
    // EDIT PRODUCTS FUNCTIONS

    // DELETE PRODUCTS FUNCTIONS
        else if(isset($_POST['delete_product_btn'])){

            $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

            $product_query = "SELECT * FROM tbl_products WHERE id='$product_id' ";
            $product_query_run = mysqli_query($con, $product_query);
            $product_data = mysqli_fetch_array($product_query_run);
            $image = $product_data ['image'];

            $delete_query = "DELETE FROM tbl_products WHERE id='$product_id' ";
            $delete_query_run = mysqli_query($con, $delete_query);

            if($delete_query_run){
                if(file_exists("../uploaded/".$image)){
                    unlink("../uploaded/".$image);
                }
                // redirect("product.php", "Item Deleted Successfully!");
                echo 200;
            }else{
                // redirect("product.php", "Something Went Wrong!");
                echo 500;
            }
        }
    // DELETE PRODUCTS FUNCTIONS

    else if(isset($_POST['update_order_btn'])){
    
        $track_no = $_POST['tracking_no'];
        $order_status = $_POST['order_status'];
        
        $updateOrder_query = "UPDATE tbl_orders SET status='$order_status' WHERE tracking_no='$track_no' ";
        $updateOrder_query_run = mysqli_query($con, $updateOrder_query);

        redirect("view-order.php?t=$track_no", "Order Status updated successfully!");
    
    }
    // UPDATE ACCOUNT FUNCTIONS
        else if (isset($_POST['update_acc_btn'])) {
            $userId = $_POST['userId'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $update_query = "UPDATE tbl_users SET 
                name='$name', 
                email='$email', 
                password='$password'
                WHERE id='$userId'
            ";
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run){
                    redirect("../index.php", "Account Updated Successfully!");

            }else{
                redirect("../index.php", "Account Updated Successfully!");

            }
        }
    // UPDATE ACCOUNT FUNCTIONS
    else{
        header('Location: ../index.php');
    }
?>