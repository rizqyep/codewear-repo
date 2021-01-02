<?php
session_start();
require_once "../../middleware/Authenticate.php";
require_once "../../middleware/Admin.php";

if (Authenticate::isAuthenticated()) {
    if (!Admin::isAdmin($_SESSION['user'])) {
        header('Location: http://localhost/CodeWear');
    }
} else {
    header('Location: http://localhost/CodeWear');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Create Product";
    include "../partials/header.php";
    ?>

    <link rel="stylesheet" href="http://localhost/CodeWear/assets/css/landing.css">

</head>

<body>

    <?php
    include "../partials/navbar.php";
    include "../../models/Product.php";
    $product = Product::getById($_GET['id'])->fetch_assoc();
    ?>



    <div class="container pt-3 pb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold text-center mb-4">Edit Product</h3>

                <div class="d-flex justify-content-end">
                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $product['id']; ?>">
                        <i class="fas fa-trash text-white mr-2"></i> Delete Product
                    </a>
                </div>

                <form action="../controllers/ProductController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="<?php echo $product['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" name="price" id="price" value="<?php echo $product['price']; ?>"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control"
                            value="<?php echo $product['stock']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            cols="10"><?php echo $product['description']; ?></textarea>
                    </div>

                    <button type="submit" class="mx-0 btn btn-success w-100">Update Product</button>

                </form>
            </div>
        </div>



    </div>



    <?php
    include "../partials/footer.php";
    ?>
</body>

</html>