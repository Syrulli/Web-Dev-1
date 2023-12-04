<?php
    $title = "Category - Kohi";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
    include('./modal.php');

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">All Category</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                 Category Form
                </div>

                <div class="card-body" id="category_table">
                    <div class="table table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $menu = getAll("tbl_category");
                                    if (mysqli_num_rows($menu) > 0) {
                                        foreach ($menu as $item) {
                                            ?>
                                                <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td>
                                                        <img style="width: 50px; height: 50px; border-radius: 50%;" src="../uploaded/<?= $item['image']; ?>" alt="<?= $item['name']; ?>">
                                                    </td>
                                                    <td><?= $item['status'] == '0' ? "Visible" : "Hidden" ?></td>
                                                    <td class="">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <a href="edit_item.php?id=<?= $item['id']; ?>" class="pb-2 btn btn-primary">    
                                                                   Edit
                                                                </a>
                                                            </div>
                                                            <div class="col-3">
                                                                <button type="button" value="<?= $item['id']; ?>" class="btn btn-danger delete_category_btn">Delete</button>
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

    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary mt-lg-3  float-end" data-bs-toggle="modal" data-bs-target="#add_category_btn">
                Add Product
            </button>         
        </div>
    </div>
</div>
<?php
include('inc/footer.php');
?>