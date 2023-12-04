`                    </main>
                
                <footer class="py-4 bg-light mt-auto postion">
                    <div class="container-fluid px-4">
                        <div class="small text-center">
                            <div class="text-muted">&copy; 2022 Hitler Inc Kōhī, All rights reserved.</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>       
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="lib/js/jquery.js"></script>
        <script src="lib/js/function.js"></script>
        <script src="lib/js/designfuncs.js"></script>
        <script src="lib/js/bs.js"></script>
        <script src="lib/js/scripts.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
            <?php 
                if(isset($_SESSION['message'])){
                    ?>
                        alertify.set('notifier','position', 'top-right');
                        alertify.success('<?= $_SESSION['message']; ?>');
                    <?php
                    unset($_SESSION['message']);
                }
            ?>
        </script>
    </body>
</html>
