<?php
$title = "My Orders | Kōhī®";
include('functions/userfunction.php');
include('./includes/header.php');
include('authenticate.php');
?>
<section>
    <div class="container pt-lg-3" style="height: 65px !important;">
        <ul class="breadcrumb d-flex align-items-center pt-lg-4">
            <li class="breadcrumb-item"><a href="menu.php" class="nav__link">Menu</a></li>
            <li class="breadcrumb-item"><a href="cart.php" class="nav__link">My Cart</a></li>
            <li class="breadcrumb-item"><a href="my-orders.php" class="nav__link active-link">My Orders</a></li>
        </ul>
        <hr>
    </div>

    <div class="container mt-lg-5">
        <div class="row min-vh-100">
            <div class="col-lg-12">
                <table class="table table-striped text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tracking No.</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $orders = getOrders();

                            if (mysqli_fetch_array($orders) > 0) {
                                foreach ($orders as $item) {
                                    ?>
                                
                                        <tr>
                                            <td> <?= $item['id']; ?> </td>
                                            <td> <?= $item['tracking_no']; ?></td>
                                            <td> <?= $item['total_price']; ?></td>
                                            <td> <?= $item['created_at']; ?></td>
                                            <td><a href="view-order.php?t=<?= $item['tracking_no']; ?> " class="btn btn-outline-primary btn-sm"> <i class="fa-solid fa-eye"></i> View Details</a></td>
                                        
                                    
                                    <?php
                                }
                            }else{
                                ?>
                                        
                                            <td colspan="5">No orders yet</td>
                                        </tr>

                                <?php
                                // redirect("cart.php", "No data available");
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include('./includes/footer.php'); ?>