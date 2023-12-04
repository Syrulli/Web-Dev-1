<?php
    $title ="Edit Item - Kōhī";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Category</li>
        <li class="breadcrumb-item">Edit Category</li>
    </ol>
    <div class="row mt-3">
        <div class="col-lg-12">
            <?php 
                if(isset($_GET['id'])){

                    $id = $_GET['id']; // fetch item with id.
                    $tbl_menu = getByID("tbl_category", $id);

                    if(mysqli_num_rows($tbl_menu) > 0){

                        $data = mysqli_fetch_array($tbl_menu);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit item Form</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">

                                                    <input type="hidden" name="tbl_menu_id" value="<?= $data['id'] ?>">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" placeholder="Enter Item Name">

                                                    <label class="form-label pt-1">Slug</label>
                                                    <input type="text" name="slug" value="<?= $data['slug'] ?>" class="form-control" placeholder="Enter Slug">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea rows="4" type="text" name="description" class="form-control" placeholder="Description"><?= $data['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-group col-lg-12 mb-2">
                                                <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                            </div>
                                        </div>


                                        <div class="row">
                                        
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">

                                                    <label class="form-label ms-5">Popular</label>
                                                    <input type="checkbox"  <?= $data['popular'] ?"checked":"" ?> name="popular">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }else{
                        redirect("menu.php", "Item Not Found");
                    }
                }else{
                    redirect("menu.php", "ID Missing from URL");
                }
            ?>
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>