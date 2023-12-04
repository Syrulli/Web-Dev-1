<?php
    $title = "Edit Product - Kōhī";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Products</li>
        <li class="breadcrumb-item">Edit Product</li>
    </ol>
    <div class="row mt-3">
        <div class="col-lg-12">
            <?php 
                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                    $products = getByID("tbl_products", $id);

                    if(mysqli_num_rows($products, $id) > 0){

                        $data = mysqli_fetch_array($products);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Product Form</h4>
                                </div>  

                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">

                                        <div class="row">
                                            <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" required name="name" value="<?= $data['name']; ?>" class="form-control" placeholder="Enter Item Name">

                                                    <label class="form-label pt-1">Slug</label>
                                                    <input type="text" required name="slug" value="<?= $data['slug']; ?>" class="form-control" placeholder="Enter Slug">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Category</label>
                                                    <select required name="category_id" class="form-select" aria-label="Default select example">
                                                        <option selected>Select Category</option>
                                                        <?php 
                                                            $products = getAll("tbl_category");
                                                            if(mysqli_num_rows($products) > 0 ){
                                                                foreach($products as $item){
                                                                    ?> 
                                                                        <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?>><?= $item['name']; ?></option>
                                                                    <?php
                                                                }
                                                            }else{
                                                                echo "No Categorty Available";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea rows="6"  required type="text" required name="description" class="form-control" placeholder="Enter Description"><?= $data['description']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="text" required name="price" value="<?= $data['price']; ?>" class="form-control" placeholder="Enter Price">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="text" required name="qty" value="<?= $data['qty']; ?>" class="form-control" placeholder="Enter Quantity">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="input-group col-lg-12 mb-2">
                                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                                <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            </div>
                                        </div>

                                        <div class="row">
                                    
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>

                                                    <label class="form-label ms-5">Trending</label>
                                                    <input type="checkbox" name="trending"  <?= $data['trending'] == '0'?'':'checked' ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else{
                        echo "Product Not Found for given ID";
                    }
                }else{
                    echo "ID Missing from URL";
                }
            ?>   
        </div>
    </div>
</div>
<?php
include('inc/footer.php');
?>