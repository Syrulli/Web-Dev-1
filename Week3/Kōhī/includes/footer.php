        <footer>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="col-md-6">
                            <p class="mb-0"><span style="font-weight: bold; font-size: 20pt;">Kōhī ®</span><br> <small>© 2023 <span>Kōhī</span> Company | All rights reserved.</small></p>
                        </div>

                        <div class="col-auto mr-md-4">
                            <a class="social-icons" href="https://www.facebook.com/syrullicerulli"><i class="fa-brands fa-facebook-f"></i></i></a>
                            <a class="social-icons" href="https://www.instagram.com/"> <i class="fa-brands fa-instagram"></i></a>
                            <a class="social-icons" href="https://github.com/Syrulli"><i class="fa-brands fa-github"></i></i></a>
                            <a class="social-icons" href="https://www.linkedin.com/in/lloyd-languido-917776221/"> <i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="admin/lib/js/bs.js"></script>
        <script src="admin/lib/js/jquery.js"></script>
        <script src="admin/lib/js/function.js"></script>
        <script src="admin/lib/js/designfunc.js"></script>
       
        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/f200f2da0d.js" crossorigin="anonymous"></script>

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
            alertify.set('notifier','position', 'top-right');

            <?php 
                if(isset($_SESSION['message'])){
                    ?>
                        alertify.success('<?= $_SESSION['message']; ?>');
                    <?php
                    unset($_SESSION['message']);
                }
            ?>
        </script>

        <!-- AOS -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script> -->
    </body>
</html>