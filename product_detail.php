<?php
include "./includes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Product Detail Page";
    include "./partials/header.php";
    require_once "./models/Product.php";
    $id = $_GET['id'];
    $product = Product::getById($id)->fetch_assoc();
    ?>

    <link rel="stylesheet" href="assets/css/product_details.css">

</head>

<body>

    <?php
    include "./partials/navbar.php";

    ?>

    <div class="container pt-3 pb-3">


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-center">
                            <img class="product-image" src="/codewear/assets/img<?php echo $product['image']; ?>"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="font-weight-bold"><?php echo $product['name']; ?></h4>
                        <p class="font-weight-bold orange-text">Rp.
                            <?php echo number_format($product['price'], 0, ",", "."); ?></p>
                        <p class="font-weight-bold orange-text">Available Stock : <?php echo $product['stock']; ?> pcs
                        </p>
                        <p class="mt-3 mb-5 text-muted"><?php echo $product['description']; ?></p>

                        <?php if (Authenticate::isAuthenticated()) : ?>
                        <?php if ($product['stock'] > 0) : ?>
                        <form action="./controllers/CartController.php" method="POST">
                            <input type="hidden" name="create">
                            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
                            <div class="form-group col-3 px-0">
                                <label for="quantity">Quantity</label>
                                <input type="number" value="1" name="quantity" id="quantity" class="form-control">
                            </div>
                            <button class="btn btn-success w-100 mx-0 text-white font-weight-bold">Add To Cart</button>
                        </form>
                        <?php else : ?>
                        <div class="badge badge-md grey text-white pt-3 py-1 w-100">
                            <p class="font-weight-bold text-center">Product out of stock</p>
                        </div>
                        <?php endif; ?>
                        <?php else : ?>
                        <a href="auth/login.php" class="btn btn-primary w-100 mx-0 font-weight-bold">
                            Login / Register to buy this item
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <?php
    include "./partials/footer.php";
    ?>
</body>

</html>
