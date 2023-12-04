<?php
    $title = "Kōhī";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
 
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

    <div class="container mt-lg-4 mb-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        View Order
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <h4>Delivery Details</h4>
                            <hr>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12 mb-lg-3">
                                        <label class="fw-bold" for="name">Name</label>    
                                        <div class="border p-lg-1"> 
                                            <?= $data['name']; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-lg-3">
                                        <label class="fw-bold" for="email">Email</label>    
                                        <div class="border p-lg-1"> 
                                            <?= $data['email']; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-lg-3">
                                        <label class="fw-bold" for="phone">Phone</label>    
                                        <div class="border p-lg-1"> 
                                            <?= $data['phone']; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-lg-3">
                                        <label class="fw-bold" for="address">Address</label>    
                                        <div class="border p-lg-1"> 
                                            <?= $data['address']; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-lg-3">
                                        <label class="fw-bold" for="pincode">Pincode</label>    
                                        <div class="border p-lg-1"> 
                                            <?= $data['pincode']; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-lg-2">
                                        <label class="fw-bold" for="tracking_no">Tracking No.</label>    
                                        <div class="border p-lg-1"> 
                                            <?= $data['tracking_no']; ?>
                                        </div>
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
                                            // $userId = $_SESSION['auth_user']['user_id'];

                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM tbl_orders o, tbl_order_items oi,
                                            tbl_products p WHERE oi.order_id=o.id AND p.id=oi.prod_id 
                                            AND o.tracking_no='$tracking_no' ";

                                            $order_query_run = mysqli_query($con, $order_query);
                                            
                                            if(mysqli_num_rows($order_query_run) > 0){

                                                foreach ($order_query_run as $item){
                                                    ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <img src="../uploaded/<?= $item['image']; ?>" width="50px" height="50px"> <?= $item['name']; ?>
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
                                <div>
                                    <h5 class="ps-lg-2">Total Price: <span class="float-end"><?= $data['total_price']; ?></span></h5>

                                    <label for="payment_mode" class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                    </div>

                                    <label for="status" class="fw-bold">Status</label>

                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="tracking_no" value="<?= $data['tracking_no']; ?>">
                                        <select name="order_status" class="form-select form-select-sm mb-lg-3">
                                            <option value="0" <?= $data['status'] == 0?"selected":"" ?> >Under Process</option>
                                            <option value="1" <?= $data['status'] == 1?"selected":"" ?> >Completed</option>
                                            <option value="2" <?= $data['status'] == 2?"selected":"" ?> >Cancel</option>
                                        </select>
                                        <button type="submit" name="update_order_btn" class="btn btn-primary float-end mt-lg-3">Update Status</button> 
                                                                    <!-- code.php -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('inc/footer.php');?>