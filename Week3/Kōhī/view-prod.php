<?php
    $title = "View Product | Kōhī®";
    include('functions/userfunction.php');
    include('./includes/header.php');
    include('authenticate.php'); // beta remove if di pwedde

    if(isset($_GET['product'])){

        $product_slug = $_GET['product'];
        $product_data = getSlugActive("tbl_products", $product_slug);
        $product = mysqli_fetch_array($product_data);

        if($product){
            ?>  
                <section style="background-color: #e4e4e4;">
                    <div class="container product_data" >
                        <ul class="breadcrumb mt-lg-5 d-flex align-items-center" >
                            <li class="breadcrumb-item"><a href="menu.php" class="nav__link">Menu</a></li>
                            <li class="breadcrumb-item">
                                <a href="#" class="nav__link active-link"><?= $product['name']; ?></a>
                            </li>
                        </ul>
                        <hr>
                        <div class="row pb-lg-5 py-lg-5">
                            <div class="col-lg-4">
                                <img src="uploaded/<?= $product['image']; ?>" alt="Product Image" width="100%" style="border-radius: 10px; background: #181818;">
                            </div>
                            <div class="col-lg-8 pt-lg-5 ps-lg-5">
                                <h4 style="letter-spacing: 7px; font-size: 20pt; color: #1f8555;">
                                    <ins>
                                        <?= $product['name']; ?> 
                                    </ins>
                                    
                                    <!-- <p class="float-end text-danger">
                                        <?php if($product['trending']){echo "Trending";}?>
                                    </p> -->
                                </h4>

                                <p><?= $product['description']; ?>
                                 <i class="fa-solid fa-circle-info text-success" title="Information is based on standard recipes"></i> 
                                </p>

                                <div class="col-lg-12 d-flex flex-row align-items-center">
                                    <div>
                                        <h4 class="pt-lg-2"><span>₱</span> <?= $product['price']; ?>.</h4>

                                    </div>
                                    <div class="ps-lg-5">
                                        <div class="input-group" style="width: 50%;">
                                            <button class="input-group-text decrement_btn">-</button>
                                                <input type="text" class="form-control input_qty text-center bg-white" value="1" disabled>
                                            <button class="input-group-text increment_btn">+</button>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="float-end">
                                    <button class="btn btn-outline-success add_cart btn-sm" value="<?= $product['id']; ?>"> <i class="fa-solid fa-plus"></i> Add to order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
        }else{
            echo "Product Not Found";
        }   
    }else{
        echo "Someting Went Wrong";
    } 
    include('./includes/footer.php');
?>