    <?php
    // session_start();
    $title = "Kōhī";
    include('functions/userfunction.php');
    include('./includes/header.php');
    ?>
    <section style="background-color: #e4e4e4;">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-lg-6 col-sm-12 ps-lg-3">
                    <h1 style="letter-spacing: 20px; font-size: 80pt; color: #1f8555;" class="pb-lg-0 mb-lg-0">Kōhī</h1>
                    <h3 id="text" style="letter-spacing: 3px; font-size: 15pt;" class="text-black">Enjoy warm and quality time with your loved ones with</h3>
                    <button type="button" class="btn btn-outline-success mt-lg-2 btn-sm">View More!</button>
                </div>
                <div class="col-lg-6 text-center col-sm-12">
                    <img src="img/home.png" style="height: 20rem;">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div>
            <div class="row min-vh-50 align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <img src="img/test.png">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h1 style="letter-spacing: 10px; font-size: 30pt; color: #1f8555;">Introducing</h1>
                    <h5>Iced Shaken Espresso.</h5>
                    <p>Layers of richness and nondairy milk in our new brown sugar <span>Oatmilk and Chocolate Almondmilk</span>.</p>
                    <figcaption class="blockquote-footer mt-lg-2">
                        Flavors under 200 calories in a grande. <i class="fa-solid fa-circle-info" title="Information is based on standard recipes"></i>
                    </figcaption>

                    <button type="button" class="btn btn-outline-success btn-sm">Try Iced shaken espresso</button>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #e4e4e4;">
        <!-- style="background-image: url('img/home1.png') !important; background-repeat: no-repeat; background-position: left 
        !important; background-size: cover; background-attachment: fixed;" -->
        <div class="container">
            <div class="row min-vh-50 align-items-center">
                <div class="col-lg-7 col-sm-12 ps-lg-3">
                    <h1 style="letter-spacing: 7px; font-size: 30pt; color: #1f8555;" class="pb-lg-0 mb-lg-0">Featured Food</h1>
                    <h5>Ham & Swiss Penis.</h5>
                    <p>Cheese meld with Dijon butter on a toasted baguette.</p>
                    <figcaption class="blockquote-footer mt-lg-1">
                        480 calories, 2g sugar, 23g fat. <i class="fa-solid fa-circle-info" title="Information is based on standard recipes"></i>
                    </figcaption>
                    <hr style="color: #1f8555;">
                    <p>Whatever your preferences or mood may be, you’ll find a Kōhī® sandwich and a sweet slice of cake that’s perfectly your own.</p>
                    <button type="button" class="btn btn-outline-success btn-sm">Explore Food</button>
                </div>

                <div class="col-lg-5 text-center col-sm-12">
                    <img src="img/home-sec3.png" style="height: 30rem; width: 35rem;">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <h1 style="letter-spacing: 5px; font-size: 30pt; color: #1f8555;" class="pb-lg-0 mb-lg-0">Kōhī® Delivers</h1>
                    <h5>Your coffee is on its way</h5>
                    <p style="font-size: small;">Place an order through the DoorDash app or check the Uber Eats app for availability.</p>
                    <button type="button" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-plus"></i> Order now!</button>

                </div>

                <div class="col-lg-6">
                    <img src="img/home-sec4.png" alt="">
                </div>

            </div>
        </div>
    </section>


    <section style="padding-bottom: 100px; background-color: #e4e4e4;">
        <div class="container">
            <div class="row align-items-center">
                <div class="row text-center mt-5 mb-5">
                    <h1 style="letter-spacing: 5px; font-size: 20pt; color: #1f8555;" class="pb-lg-0 mb-lg-0">Customer Service</h1>
                    <p style="font-size: small;">We always welcome your feedback about our service and your in-store experience – whether you found it friendly and helpful, or it fell short of your expectations.</p>
                </div>

                <div class="col-lg-6">
                    <iframe class="frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15449.097360368622!2d121.04093402526051!3d14.526294058613376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8c8c683603d%3A0xe71e5f3cd00d6813!2sPinagsama%2C%20Taguig%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1646354666141!5m2!1sen!2sph" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <div class="col-lg-4 offset-lg-1">
                    <form>
                        <div class="mb-3">
                            <small>Name</small>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <small>Email</small>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <small>Message</small>
                            <textarea cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        
                        <button type="button" class="btn btn-outline-success btn-sm">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- <section>
        <div class="container mt-lg-5">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-white">Best Seller Coffee</h4>
                    <hr>
                    <?php
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                                    <div class="col-lg-4">
                                        <a href="view-prod.php?product=<?= $item['slug']; ?>">
                                            <div class="card" style="background-color: #181818; width: 100%; border: none;">
                                                <div class="card-body">
                                                    <img src="uploaded/<?= $item['image']; ?>" alt="Product Image" width="100%">
                                                    <h4 class="text-white text-center mt-2"><?= $item['name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                                ?>
                </div>
            </div>
        </div>
    </section> -->

    <script>
      var i=0,text;
      text = " new beverages."
      function typing() {
        if(i<text.length){
          document.getElementById("text").innerHTML += text.charAt(i);
          i++;
          setTimeout (typing, 100);
        }
      }
      typing();
    </script>
    <?php include('./includes/footer.php'); ?>