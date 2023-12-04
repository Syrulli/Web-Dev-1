<?php
    $title = "Kōhī";
    include('functions/userfunction.php');
    include('./includes/header.php');
?>

<section style="background-color: #e4e4e4;">
    <div class="container mt-lg-5 mb-lg-5 py-lg-3 w-50">
        <div class="row" >
            <div class="col-lg-12">
                <?php 
                    $users = getByAccId("tbl_users");
                    if(mysqli_num_rows($users) > 0){

                        $users = mysqli_fetch_array($users);
                        ?>
                            <div class="card  shadow mb-5 bg-body-tertiary rounded">
                                <div class="card-header text-white text-center"  style="background-color: #1f8555;">
                                    <h6 style="letter-spacing: 5px; font-size: 15pt;"><i class="fa-solid fa-user fa-xs pe-lg-2"></i>My Account</h6>
                                </div>
                                <div class="card-body">
                                    <form action="admin/code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="hidden" name="userId" value="<?= $users['id'] ?>">

                                                <div class="mb-3">
                                                    <label class="form-label"><small><i class="fa-solid fa-tag"></i> Name</label></small>
                                                    <input type="name" name="name" class="form-control"  value="<?= $users['name'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"><small><i class="fa-solid fa-at"></i> Email</label></small>
                                                    <input type="email" name="email" class="form-control"  value="<?= $users['email'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"><small><i class="fa-solid fa-key"></i> Password</label></small>
                                                    <input name="password" class="form-control"  value="<?= $users['password'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <button type="submit" value="<?= $data['id']; ?>" class="btn btn-outline-primary btn-sm" name="update_acc_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else{
                        echo "Product Not Found for given ID";
                    }
                ?>   
            </div>
        </div>
    </div>
</section>
<?php include('./includes/footer.php'); ?>