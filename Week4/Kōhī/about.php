<?php
    // session_start();
    $title = "About | Kōhī®";
    include('functions/userfunction.php');
    include('./includes/header.php');
?>

    <section style="background-image: url('img/about.png') !important; background-repeat: no-repeat; background-position: left 
        !important; background-size: cover; background-attachment: fixed;">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-lg-6 col-sm-12 ps-lg-3">
                    <h1 id="text" style="letter-spacing: 10px; font-size: 50pt; color: #1f8555;" class="pb-lg-0 mb-lg-0"></h1>
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde consequatur voluptatibus quibusdam laudantium saepe quidem tenetur nam ut sequi nesciunt similique, debitis quia necessitatibus magnam eos velit? Fugiat, numquam itaque!</p>
                    <a href="503.php">
                     <button type="button" class="btn btn-success mt-lg-2 btn-sm">View More!</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #e4e4e4;">
        <div class="container">
            <div class="row min-vh-50 align-items-center">
                <div class="col-lg-7 col-sm-12 ps-lg-3">
                    <h1 style="letter-spacing: 7px; font-size: 30pt; color: #1f8555;" class="pb-lg-0 mb-lg-0">Our Heritage</h1>
                    <h5>Our story begins in 1939.</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam rerum minus asperiores quas eos repudiandae, placeat temporibus alias consequuntur iusto dolor odit accusantium repellendus doloribus sequi. Asperiores possimus illo cupiditate?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint deserunt veritatis repudiandae illo quas velit quis quae, et magni amet vero reiciendis debitis aperiam ea neque rem suscipit ab voluptatem?</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim cumque ducimus, ipsam quas doloremque quo. Dolores obcaecati architecto sequi totam nam natus rem harum et repellat asperiores? Incidunt, aliquam et?s</p>
                    <hr style="color: #1f8555;">

                    <figcaption class="blockquote-footer mt-lg-1">
                      Coffee is a hug in a mug. <i class="fa-solid fa-mug-hot"></i>
                    </figcaption>
                    <a href="503.php">
                        <button type="button" class="btn btn-outline-success btn-sm">Learn more.</button>
                    </a>
                </div>

                <div class="col-lg-5 text-center col-sm-12">
                    <img src="img/about-sec2.png" style="height: 100%; width: 35rem;">
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div>
            <div class="row min-vh-50 align-items-center py-lg-5">
                <div class="col-lg-5 col-sm-12">
                    <img src="img/about-sec3.png">
                </div>
                <div class="col-lg-7 col-sm-12">
                    <h1 style="letter-spacing: 10px; font-size: 30pt; color: #1f8555;">Coffee & Crafts</h1>
                    <p>It takes many hands to craft the perfect cup of coffee – from the farmers who tend to the red-ripe coffee cherries, to the master roasters who coax the best from every bean, and to the barista who serves it with care. We are committed to the highest standards of quality and service, embracing our heritage while innovating to create new experiences to savor.</p>
                    <a href="503.php">
                        <button type="button" class="btn btn-outline-success btn-sm">Learn more</button>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <script>
      var i=0,text;

      text = "About Kōhī®"
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