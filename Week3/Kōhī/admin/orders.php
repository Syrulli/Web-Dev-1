<?php
    $title = "Products - Kohi";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
?>

<div class="container-fluid px-4">
    <div class="row">
        <h1 class="mt-4">All Orders</h1>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Order list
                </div>
                <div class="card-body">
                    <div class="table table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Tracking No.</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $orders = getAllOrders("tbl_orders");
                                    if (mysqli_num_rows($orders) > 0) {
                                        foreach ($orders as $item) {
                                            ?>
                                                <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td><?= $item['tracking_no']; ?></td>
                                                    <td><?= $item['total_price']; ?></td>
                                                    <td><?= $item['created_at']; ?></td>

                                                    <td class="">
                                                        <div class="row">
                                                            <div class="col-lg-12 ps-lg-3">
                                                                <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        echo "No record found.";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php                                    
    include('inc/footer.php');
?>