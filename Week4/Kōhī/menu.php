<?php
    $title = "Menu | Kōhī®";
    include('functions/userfunction.php');
    include('./includes/header.php');
?>

<section style="background-image: url('img/menu-sec1.png')
     !important; background-repeat: no-repeat; background-position: left !important; background-size: cover; background-attachment: fixed;"">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-12 col-sm-12 text-center">
                <h1 style="letter-spacing: 10px; font-size: 50pt; color: #1f8555;">Our Menu</h1>
                <h3 id="text" style="letter-spacing: 3px; font-size: 15pt;" class="text-white"></h3>
                <button type="button" class="btn btn-success mt-lg-2 btn-sm">Discover our flavors!</button>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #e4e4e4;">
    <div class="container py-lg-5">
        <div class="row min-vh-50">
            <h3>Our Menu</h3>

            <hr>
            <div class="col-lg-12">
                <div class="row">
                    <?php 
                    $menu = getAllActive("tbl_category");
                        if(mysqli_num_rows($menu) > 0){
                            foreach($menu as $item){
                                ?> 
                                    <div class="col-lg-4">
                                        <a href="products.php?category=<?= $item['slug']; ?>">
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

<script>
    var i=0,text;
    text = " 7 days without coffee makes one WEAK."
    function typing() {
    if(i<text.length){
        document.getElementById("text").innerHTML += text.charAt(i);
        i++;
        setTimeout (typing, 50);
    }
    }
    typing();
</script>
<?php include('./includes/footer.php'); ?>