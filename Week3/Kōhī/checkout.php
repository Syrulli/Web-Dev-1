<?php
    $title = "Checkout | Kōhī®";
    include('functions/userfunction.php');
    include('./includes/header.php');
    include('authenticate.php');

    $cartItems = getCartItems();
    if(mysqli_num_rows($cartItems) == 0){
        header('Location: index.php');
    }
?>
<section>
    <div class="container mt-lg-2">
        <ul class="breadcrumb d-flex align-items-center pt-lg-4">
            <li class="breadcrumb-item"><a href="index.php" class="nav__link">Home</a></li>
            <li class="breadcrumb-item"><a href="cart.php" class="nav__link">My Cart</a></li>
            <li class="breadcrumb-item"><a href="checkout.php" class="nav__link active-link">CheckOut</a></li>
        </ul>
        <hr>
    </div>
</section>

<section class="min-vh-100">
    <div class="container mt-lg-3">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row text-black">
                        <div class="col-lg-7">
                            <h5 style="letter-spacing: 3px; color: #1f8555;" class="fw-bold">Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="fw-bold"><small>Name</small></label>
                                    <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control" required>
                                    <small class="text-danger name"></small>
                                </div>

                                <div class="col-lg-6">
                                    <label class="fw-bold"><small> E-mail</small></label>
                                    <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" required>
                                    <small class="text-danger name"></small>
                                </div>

                                <div class="col-lg-6 mt-2">
                                    <label class="fw-bold"><small>Phone</small></label>
                                    <input type="text" name="phone" id="phone" placeholder="Enter Your Phone no." class="form-control" required>
                                    <small class="text-danger name"></small>
                                </div>

                                <div class="col-lg-6 mt-2">
                                    <label class="fw-bold"><small>Pin Code</small></label>
                                    <input type="text" name="pincode" id="pincode" placeholder="Enter Pin Code" class="form-control" required>
                                    <small class="text-danger name"></small>
                                </div>

                                <div class="col-lg-12 mt-lg-4">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Address" name="address" id="address" style="height: 100px" required></textarea>
                                        <label for="floatingTextarea">Address</label>
                                        <small class="text-danger name"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5">
                            <h5 style="letter-spacing: 3px; color: #1f8555;" class="fw-bold">Order Detail</h5>
                            <hr>
                            <?php
                                $items = getCartItems();
                                $totalPrice = 0;
                                foreach ($items as $citem) {
                                ?>
                                    <div class="mb-1 border mt-2">
                                        <div class="row align-items-center">
                                            <div class="col-lg-3">
                                                <img src="uploaded/<?= $citem['image'] ?>" alt="Image" style="width: 50px; height: 50px; border-radius: 50%;">
                                            </div>

                                            <div class="col-lg-3">
                                                <?= $citem['name'] ?>
                                            </div>

                                            <div class="col-lg-3">
                                                <?= $citem['price'] ?>
                                            </div>

                                            <div class="col-lg-3">
                                                <label>x <?= $citem['prod_qty'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                                    $totalPrice += $citem['price'] * $citem['prod_qty'];
                                }
                            ?>

                            <h6 class="mt-lg-3 fw-bold">Total Price : <span class="float-end"><?= $totalPrice ?></span></h6>
                            <div class="container">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-outline-success w-100 mt-3">Confirm and Place order | COD</button>
                                <div id="paypal-button-container" class="mt-lg-2"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include('./includes/footer.php'); ?>
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AUVGMFBBRZ7KKP9VWwPkic9Y6gwCJ0hrjwtk14-QoaiebLD4O-nmJw-bDWgqSd-QyGtfcYMVNAcpaWrp&currency=USD"></script>
<script>
    paypal.Buttons({
        onClick(){

            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var pincode = $('#pincode').val();
            var address = $('#address').val();

            if(name.length == 0){
                $('.name').text("This field is required!");
            }else{
                $('.name').text("");
            }
            if(email.length == 0){
                $('.email').text("This field is required!");
            }else{
                $('.email').text("");
            }
            if(phone.length == 0){
                $('.phone').text("This field is required!");
            }else{
                $('.phone').text("");
            }
            if(pincode.length == 0){
                $('.pincode').text("This field is required!");
            }else{
                $('.pincode').text("");
            }
            if(address.length == 0){
                $('.address').text("This field is required!");
            }else{
                $('.address').text("");
            }

            if(name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0){
                return false;
            }
        },
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $totalPrice ?>'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var pincode = $('#pincode').val();
                var address = $('#address').val();

                var data = {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'pincode': pincode,
                    'address': address,
                    'payment_mode': "Paid by PayPal",
                    'payment_id': transaction.id,
                    'placeOrderBtn': true
                };
                $.ajax({
                    method: "POST",
                    url: "functions/placeorder.php",
                    data: data,
                    success: function (response) {
                        if(response == 201){
                            alertify.success("Order Placed Successfully");
                            // actions.redirect('my-orders.php'); kapag di nagana balik lang
                            window.location.href = 'my-orders.php';

                        }
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>