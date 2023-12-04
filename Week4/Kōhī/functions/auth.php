<?php 
    session_start();
    include('../config/dbcon.php');
    include('./myfunction.php');

    // if btn clicked / true
    // Register btn (register.php)
    if(isset($_POST['register_btn'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        // Check if email is already registered
        $check_email_query = "SELECT email FROM tbl_users WHERE email='$email' ";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0 ){
            $_SESSION['message'] = "Email already registered";
            header('Location: ../register.php');
            
        }else{
            // condition if match ba yung passwords sa cpass
            if($password == $cpassword){
                // insert user data
                $insert_query = "INSERT INTO tbl_users (name, email, phone, password) VALUES ('$name','$email','$phone','$password')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if( $insert_query_run){
                    $_SESSION['Registered Successfully'];
                    header('Location: ../login.php');
                }else{
                    $_SESSION['Something went wrong'];
                    header('Location: ../register.php ');
                }
            }else{
                $_SESSION['message'] = "Password do not match.";
                header('Location: ../register.php');
            }
        }
    }

    else if(isset($_POST['login_btn'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $login_query = "SELECT * FROM tbl_users WHERE email='$email' AND password='$password' ";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0 ){

            $_SESSION['auth'] = true;

            $userdata = mysqli_fetch_array($login_query_run);
            $userid = $userdata['id'];
            $username = $userdata['name']; // STORING data
            $useremail = $userdata['email'];
            $role_as = $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $username,
                'email' => $useremail
            ];

            // ACCESS LEVEL 
            $_SESSION['role_as'] = $role_as;

            if($role_as == 1){
                redirect("../admin/index.php", "Welcome To Dashboard");
                // $_SESSION['message'] = "Welcome To Dashboard";
                // header('Location: ../admin/index.php');
                
            }else{
                redirect("../index.php", "Logged In Successfully");
                // $_SESSION['message'] = "Logged In Successfully";
                // header('Location: ../index.php');
            }
        }else{
            redirect("../login.php", "Invalid Credentials");
            // $_SESSION['message'] = "Invalid Credentials ";
            // header('Location: ../login.php');
        }
    }
?>