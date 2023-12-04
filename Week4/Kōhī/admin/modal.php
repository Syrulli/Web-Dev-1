<!-- ADD CATEGORY MODAL -->
    <div class="modal fade" id="add_category_btn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Item Name">

                                    <label class="form-label pt-1">Slug</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Enter Slug">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea rows="4" type="text" name="description" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group col-lg-12 mb-2">
                                <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="checkbox" name="status">

                                    <label class="form-label ms-5">Popular</label>
                                    <input type="checkbox" name="popular">
                                </div>
                            </div>

                            <div class="col-lg-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- ADD CATEGORY MODAL -->

<!-- ADD PRODUCT MODAL -->
    <div class="modal fade" id="add_product_btn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-lg">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" required name="name" class="form-control" placeholder="Enter Item Name">

                                    <label class="form-label pt-1">Slug</label>
                                    <input type="text" required name="slug" class="form-control" placeholder="Enter Slug">
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Category</label>
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        <?php
                                            $tbl_category = getAll("tbl_category");
                                            if (mysqli_num_rows($tbl_category) > 0) {
                                                foreach ($tbl_category as $item) {
                                                ?>
                                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
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
                                    <textarea rows="6" required type="text" required name="description" class="form-control" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" required name="price" class="form-control" placeholder="Enter Price">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" required name="qty" class="form-control" placeholder="Enter Quantity">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="input-group col-lg-12 mb-2">
                                <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="checkbox" name="status">

                                    <label class="form-label ms-5">Trending</label>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="add_product_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- ADD PRODUCT MODAL -->