<?php
session_start();
require_once "../../middleware/Authenticate.php";
require_once "../../middleware/Admin.php";

if (Authenticate::isAuthenticated()) {
    if (!Admin::isAdmin($_SESSION['user'])) {
        header('Location: /codewear');
    }
} else {
    header('Location: /codewear');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Create Product";
    include "../partials/header.php";
    ?>

    <link rel="stylesheet" href="assets/css/landing.css">

</head>

<body>

    <?php
    include "../partials/navbar.php";
    include "../../models/Product.php";

    ?>



    <div class="container pt-3 pb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold text-center mb-4">Create Product</h3>

                <form action="../controllers/ProductController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="create">
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            cols="10"></textarea>
                    </div>

                    <button type="submit" class="mx-0 btn btn-success w-100">Add Product</button>

                </form>
            </div>
        </div>



    </div>



    <?php
    include "../partials/footer.php";
    ?>
</body>

</html>
