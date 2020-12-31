<?php
include "./includes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        $title = "Home Page";
        include "./partials/header.php"; 
        require_once "./models/Product.php";
        $products = Product::getALl();
    ?>

    <link rel="stylesheet" href="assets/css/products.css">

</head>

<body>

    <?php
        include "./partials/navbar.php";
     

    ?>

    <div class="container pt-3 pb-3">
        <h3 class="font-weight-bold">All Products</h3>
        <div class="row mt-5 mb-5">
            <?php foreach($products as $product):?>
            <div class="col-6 col-md-3">
                <div class="card">
                    <img src="http://localhost/CodeWear/assets/img<?php echo $product['image'];?>" alt=""
                        class="product-image">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-3"><?php echo $product['name'];?></h5>
                        <p class="font-weight-bold orange-text"><?php echo $product['price'];?></p>

                        <a href="product_detail.php?id=<?php echo $product['id'];?>"
                            class="btn elegant-color font-weight-bold w-100 mx-0 text-white">
                            See Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>



    <?php
    include "./partials/footer.php";
    ?>
</body>

</html>