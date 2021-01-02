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
    $title = "Home Page";
    include "../partials/header.php";
    require_once "../../models/Product.php";
    $products = Product::getAll();
    ?>

    <link rel="stylesheet" href="http://localhost/CodeWear/assets/css/products.css">

</head>

<body>

    <?php
    include "../partials/navbar.php";


    ?>

    <div class="container pt-3 pb-3">
        <div class="d-flex justify-content-between">
            <h3 class="font-weight-bold">All Products</h3>
            <a href="create.php" class="btn btn-sm btn-success">Create Product</a>
        </div>
        <div class="row mt-5 mb-5">
            <?php foreach ($products as $product) : ?>
            <div class="col-6 col-md-3 mb-5">
                <div class="card rounded">
                    <img src="http://localhost/CodeWear/assets/img<?php echo $product['image']; ?>" alt=""
                        class="product-image rounded">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-3"><?php echo $product['name']; ?></h5>
                        <p class="font-weight-bold orange-text"><?php echo $product['price']; ?></p>

                        <a href="edit.php?id=<?php echo $product['id']; ?>"
                            class="btn elegant-color font-weight-bold w-100 mx-0 text-white">Edit Product</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>



    <?php
    include "../partials/footer.php";
    ?>
</body>

</html>