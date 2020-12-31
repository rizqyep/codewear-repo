<?php
include "./includes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        $title = "Home Page";
        require_once('./models/Cart.php');
        include "./partials/header.php"; 
    ?>

    <link rel="stylesheet" href="assets/css/landing.css">

</head>

<body>

    <?php
        include "./partials/navbar.php";
    ?>



    <div class="container pt-3 pb-3">
        <div class="row mt-5">
            <div class="col-md-6 order-2 order-md-1">
                <h1 class="font-weight-bold text-center text-md-left mt-3 mb-3">
                    Merch for Developers</h1>
                <p class="text-muted text-center text-md-left">
                    Walk confidently into work and conferences by wearing the merch of your favorite Tech Stack!
                </p>


                <div class="d-flex d-md-none justify-content-center">
                    <a href="products.php" class="btn elegant-color text-white font-weight-bold">
                        Explore Catalog
                    </a>
                </div>


                <div class="d-none d-md-flex ">
                    <a href="products.php" class="btn mx-0 elegant-color text-white font-weight-bold">
                        Explore Catalog
                    </a>
                </div>

            </div>

            <div class="col-md-6 order-1 order-md-2">
                <div class="d-flex justify-content-center">
                    <img class="dev-shirt-image" src="assets/img/landing-shirt.png" alt="Dev Shirt" loading="lazy">
                </div>
            </div>
        </div>

        <div class="row-5">

        </div>


    </div>



    <?php
    include "./partials/footer.php";
    ?>
</body>

</html>