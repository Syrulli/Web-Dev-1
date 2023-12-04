/*==================== ALERT for Product ====================*/
$(document).on('click', '.delete_product_btn', function (e) {
    e.preventDefault();
    var id = $(this).val();
    // alert(id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_product_btn': true
                },
                success: function (response) {
                    if(response == 200){
                        swal("Success!", "Product Deleted Successfully!", "success");
                        $("#products_table").load(location.href + " #products_table");

                    }else if(response == 500){
                        swal("Error!", "Something went Wrong", "error");
                    }
                }
            });
        }
    });
});


/*==================== ALERT for MENU ====================*/
$(document).on('click', '.delete_category_btn', function (e) {
    e.preventDefault();
    var id = $(this).val();
    // alert(id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'tbl_menu_id':id,
                    'delete_category_btn': true
                },
                success: function (response) {
                    if(response == 200){
                        swal("Success!", "Product Deleted Successfully!", "success");
                        $("#category_table").load(location.href + " #category_table");

                    }else if(response == 500){
                        swal("Error!", "Something went Wrong", "error");
                    }
                }
            });
        }
    });
});

// INPUT QTY BUTTONS
$(document).ready(function () {

    $(document).on('click','.increment_btn', function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input_qty').val();
        var value = parseInt(qty, 10);

        value = isNaN(value) ? 0 : value;
        if(value < 100){
            value++;
            $(this).closest('.product_data').find('.input_qty').val(value);
        }
    });

    $(document).on('click','.decrement_btn', function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input_qty').val();
        var value = parseInt(qty, 10);

        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.input_qty').val(value);
        }
    });

    // ADD CART BUTTONS
    $(document).on('click','.add_cart', function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input_qty').val();
        var prod_id = $(this).val(); // product id in db

        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function (response) {
                
                if(response == 201){
                    alertify.success('Product Added Successfully');
                }
                else if(response == "existing"){
                    alertify.success('Product Already in Added');
                }
                else if(response == 401){
                    alertify.success('Login to Continue');
                }
                else if(response == 500){
                    alertify.success('Something Went Wrong');
                }
            }
        });
    });

    // Update QTY 
    $(document).on('click','.update_qty', function () {

        var qty = $(this).closest('.product_data').find('.input_qty').val();      
        var prod_id = $(this).closest('.product_data').find('.prodId').val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            success: function (response) {
                if(response == 200){
                    alertify.success('Item Updated Successfully');
                    $('#myCart').load(location.href + " #myCart");
                }else{
                    alertify.success(response);
                }
            }
        });
    });

    $(document).on('click','.delete_item', function () {
        var cart_id = $(this).val();  

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function (response) {
                if(response == 200){
                    alertify.success('Item Removed Successfully');
                    $('#myCart').load(location.href + " #myCart");
                }else{
                    alertify.success(response);
                }
            }
        });
    });
});


