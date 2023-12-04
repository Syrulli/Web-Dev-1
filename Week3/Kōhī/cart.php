<?php
    $title = "My Cart | Kōhī®";
    include('functions/userfunction.php');
    include('./includes/header.php');
    include('authenticate.php');
?>
    <section>
        <div class="container pt-lg-4">
            <ul class="breadcrumb d-flex align-items-center pt-lg-4">
                <li class="breadcrumb-item"><a href="menu.php" class="nav__link">Menu</a></li>
                <li class="breadcrumb-item"><a href="cart.php" class="nav__link active-link">My Cart</a></li>
            </ul>
            <hr>
        </div>

        <div class="container pt-lg-3 mb-lg-5 min-vh-100">
            <div class="row">
                <div class="col-lg-12">
                    <div id="myCart">
                        <?php
                            $items = getCartItems();
                            if(mysqli_num_rows($items) > 0){
                                ?>
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <h6>Product</h6>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <h6>Price</h6>
                                                </div>

                                                <div class="col-lg-2">
                                                    <h6 class="ps-lg-4">Quantity</h6>
                                                </div>

                                                <div class="col-lg-2">
                                                    <h6 class="ms-lg-3">Action</h6>
                                                </div>
                                            
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div>
                                        <?php
                                            foreach($items as $citem){
                                                ?> 
                                                    <div class="card shadow-sm mb-3 text-black">
                                                        <div class="row align-items-center product_data">
                                                            <div class="col-lg-2">
                                                                <img src="uploaded/<?= $citem['image'] ?>" alt="Image" style="width: 50px; height: 50px; border-radius: 50%;">
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <?= $citem['name'] ?>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <?= $citem['price'] ?>
                                                            </div>

                                                            <div class="col-lg-2">
                                                                <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                                <div class="input-group p-lg-2" style="width: 120px;">
                                                                    <button class="input-group-text decrement_btn update_qty">-</button>
                                                                        <input type="text" class="form-control input_qty text-center bg-white" value="<?= $citem['prod_qty'] ?>" disabled>
                                                                    <button class="input-group-text increment_btn update_qty">+</button>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2">
                                                                <button class="btn btn-outline-danger btn-sm mt-lg-2 delete_item" value="<?= $citem['cid'] ?>">
                                                                    <i class="fa fa-trash"></i> Remove
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="float-end pe-lg-4">
                                        <a href="checkout.php" class="btn btn-outline-success btn-sm">Proceed to checkout</a>
                                    </div>
                                <?php
                            }else{
                                // redirect("menu.php", "Your cart is empty");
                                ?>
                                    <div class="container w-50">
                                        <div class="card text-center shadow mb-5 bg-body-tertiary rounded">
                                            <div class="card-header fw-bold pt-lg-2" style="background-color: #1f8555;">
                                                <h5>
                                                    <h1 style="letter-spacing: 5px; font-size: 15pt;" class="pb-lg-0 mb-lg-0 text-white"><i class="fa-solid fa-cart-shopping"></i> My Cart</h1>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text fw-bold">Your cart is empty.</p>
                                                <a href="my-orders.php" class="btn btn-outline-primary btn-sm">View order <i class="fa-solid fa-eye"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>       
        </div>
    </section>
<?php include('./includes/footer.php'); ?>