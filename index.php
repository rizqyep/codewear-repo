<?php
session_start();
require_once "./middleware/Authenticate.php";
require_once "./middleware/Admin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        $title = "Home Page";
        include "./partials/header.php"; 
    ?>

    <link rel="stylesheet" href="assets/css/landing.css">

</head>

<body>

    <?php
        include "./partials/navbar.php";
    ?>



    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="font-weight-bold">
                    Merch for Developers</h1>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <img class="dev-shirt-image" src="assets/img/landing-shirt.png" alt="Dev Shirt" loading="lazy">
                </div>
            </div>
        </div>

    </div>



    <?php
    include "./partials/footer.php";
    ?>
</body>

</html>