<?php
    $title = "Kōhī";
    include('functions/userfunction.php');
    include('./includes/header.php');
    include('authenticate.php');

    if(isset($_GET['t'])) {

        $tracking_no = $_GET['t'];
        $orderdata = checkTrackingNoValid($tracking_no);

        if(mysqli_num_rows($orderdata) < 0){
            ?><h4>Something went wrong</h4><?php
            die();
        }

    }else{
        ?><h4>Something went wrong</h4><?php
        die();
    }

    $data = mysqli_fetch_array($orderdata);
?>
    <section>
        <div class="container" style="height: 65px !important;">
            <ul class="breadcrumb d-flex align-items-center pt-lg-4">
                <li class="breadcrumb-item"><a href="menu.php" class="nav__link">Menu</a></li>
                <li class="breadcrumb-item"><a href="my-orders.php" class="nav__link">My Orders</a></li>
                <li class="breadcrumb-item"><a href="#" class="nav__link active-link">View Order</a></li>
            </ul>
            <hr>
        </div>

        <div class="container mt-lg-4 mb-lg-5 ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-5 bg-body-tertiary rounded">
                        <div class="card-header text-center" style="background-color: #1f8555;">
                         <h1 style="letter-spacing: 5px; font-size: 15pt;" class="text-white">Delivery Details <i class="fa-solid fa-circle-info"></i></h1>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="name"><small><i class="fa-solid fa-tag"></i> Name</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $data['name']; ?>">
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="email"><small> <i class="fa-solid fa-at"></i> E-mail</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $data['email']; ?>">
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="phone"><small><i class="fa-solid fa-phone"></i> Phone</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $data['phone']; ?>">
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="address"><small><i class="fa-solid fa-location-pin"></i> Address</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $data['address']; ?>">
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="pincode"><small><i class="fa-solid fa-hashtag"></i> Pincodes</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $data['pincode']; ?>">
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="tracking_no"><small><i class="fa-solid fa-square-check"></i> Tracking No.</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $data['tracking_no']; ?>">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $userId = $_SESSION['auth_user']['user_id'];

                                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM tbl_orders o, tbl_order_items oi,
                                                tbl_products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id 
                                                AND o.tracking_no='$tracking_no' ";

                                                $order_query_run = mysqli_query($con, $order_query);
                                                
                                                if(mysqli_num_rows($order_query_run) > 0){

                                                    foreach ($order_query_run as $item){
                                                        ?>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <img src="uploaded/<?= $item['image']; ?>" width="50px" height="50px"> <?= $item['name']; ?>
                                                                </td>

                                                                <td class="align-middle">
                                                                    <?= $item['price']; ?>
                                                                </td>

                                                                <td class="align-middle">
                                                                    <?= $item['orderqty']; ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- <hr> -->
                                    <div class="pt-lg-1">
                                        <h6 class="ps-lg-2">Total Price: <span class="float-end">₱ <?= $data['total_price']; ?>.</span></h5>
                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="payment_mode"><small><i class="fa-solid fa-credit-card"></i> Payment Mode</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder=" <?= $data['payment_mode']; ?>">
                                            </fieldset>
                                        </div>


                                        <div class="col-lg-12 mb-lg-3">
                                            <fieldset disabled>
                                                <label class="fw-bold" for="status"><small><i class="fa-solid fa-list-check"></i></i> Status</small></label>    
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php if($data['status'] == 0){echo "Under Process";}else if ($data['status'] == 1){echo "Completed";}else if ($data['status'] == 2){echo "Cancel";}?>">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('./includes/footer.php'); ?>