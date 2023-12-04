<?php
    $title = "Products | Kōhī®";
    include('functions/userfunction.php');
    include('./includes/header.php');

    if(isset($_GET['category'])){
        $category_slug = $_GET['category'];
        $category_data = getSlugActive("tbl_category", $category_slug);
        $category = mysqli_fetch_array($category_data);

        if($category){
            $cid = $category['id'];
            ?>
                <section class="pb-lg-5" style="background-color: #e4e4e4;">
                    <!-- <div class="container mt-lg-5">                        
                        <div class="row pb-lg-5">
                            <div class="col-lg-6">
                                <?php
                                    $products = getProdByCategory($cid);
                                    if(mysqli_num_rows($products) > 0){
                                        foreach($products as $item){
                                            ?> 
                                                <a href="view-prod.php?product=<?= $item['slug']; ?>">
                                                    <div class="card mt-lg-3" style="background-color: #181818; width: 80%; border: none;">
                                                    
                                                        <div class="card-body">
                                                            <div class="image_hover" >
                                                                <img src="uploaded/<?= $item['image']; ?>" alt="Product Image" width="100%">
                                                            </div>
                                                            <h6 style="letter-spacing: 3px; font-size: 12pt; color: white;" class="text-center"><?= $item['name']; ?></h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php
                                        }
                                    }else{
                                        echo "No data available";
                                    }
                                ?>
                            </div>
                        </div>
                    </div> -->

                    <div class="container py-lg-5">
                        <div class="row min-vh-50">
                            <ul class="breadcrumb d-flex align-items-center pt-lg-4">
                                <li class="breadcrumb-item"><a href="menu.php" class="nav__link">Menu</a></li>
                                <li class="breadcrumb-item">
                                    <a href="#" class="nav__link active-link"><?= $category['name']; ?></a>
                                </li>
                            </ul>
                            <hr>                  
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php 
                                     $products = getProdByCategory($cid);
                                        if(mysqli_num_rows($products) > 0){
                                            foreach($products as $item){
                                                ?> 
                                                    <div class="col-lg-4">
                                                        <a href="view-prod.php?product=<?= $item['slug']; ?>">
                                                            <div class="card mt-lg-3" style="background-color: #181818; width: 80%; border: none;">
                                                                <div class="card-body text-center">
                                                                    <div class="image_hover">
                                                                        <img src="uploaded/<?= $item['image']; ?>" alt="Category Image" width="100%">
                                                                    </div>
                                                                    <h6 style="letter-spacing: 3px; font-size: 12pt; color: white;"><?= $item['name']; ?></h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php
                                            }
                                        }else{
                                            echo "No data available";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
        }else{
            echo "Someting Went Wrong";
        }
    }else{
      echo "Someting Went Wrong";
    }
    include('./includes/footer.php');
?>