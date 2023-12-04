<?php 
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); // navbarr bg-color
?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Kohu</div>
                <a class="nav-link <?= $page == "index.php"? 'active bg-danger':''; ?>" href="../admin/index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
  
                <a class="nav-link <?= $page == "category.php"? 'active bg-danger':''; ?>" href="category.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Category
                </a>

                <a class="nav-link <?= $page == "product.php"? 'active bg-danger':''; ?>" href="product.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Products
                </a>

                <a class="nav-link <?= $page == "orders.php"? 'active bg-danger':''; ?>" href="orders.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Orders
                </a>

                <a class="nav-link <?= $page == "order-history.php"? 'active bg-danger':''; ?>" href="order-history.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Order History
                </a>
            </div>
        </div>
    </nav>
</div>