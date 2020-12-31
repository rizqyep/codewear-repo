<?php
session_start();
require_once "../middleware/Authenticate.php";
require_once "../middleware/Admin.php";

if(Authenticate::isAuthenticated()){
    if(!Admin::isAdmin($_SESSION['user'])){
        header('Location: http://localhost/CodeWear');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        $title = "Create Product";
        include "./partials/header.php"; 
    ?>

    <link rel="stylesheet" href="assets/css/landing.css">

</head>

<body>

    <?php
        include "./partials/navbar.php";
        include "../models/Product.php";
        include "../models/Order.php";

        $totalSales = Order::countSales()['total'];

        $productCount = Product::count();
    ?>


    <?php var_dump($_ENV);?>
    <div class="container pt-3 pb-3">
        <h3 class="font-weight-bold mb-4">Welcome Admin!</h3>

        <div class="row mt-3 mb-5">

            <div class="col-6 col-md-4">
                <div class="card">
                    <div class="card-body" style="min-height : 200px;">
                        <h1 class="text-center font-weight-bold"><?php echo $productCount; ?></h1>
                        <p class="text-center text-muted">Products</p>
                        <div class="d-flex justify-content-around">
                            <a href="http://localhost/CodeWear/admin/products/index.php" class="btn mx-0 btn-primary">
                                See Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="card" style="min-height : 200px;">
                    <div class="card-body">
                        <h3 class="text-center mb-4 text-success font-weight-bold">
                            Rp.<?php echo number_format($totalSales,0,",","."); ?></h3>
                        <p class="text-center text-muted">Total Selling</p>
                        <div class="d-flex justify-content-around">
                            <a href="http://localhost/CodeWear/admin/stats/index.php" class="btn mx-0 btn-primary">
                                See More Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



    <?php
    include "../partials/footer.php";
    ?>
</body>

</html>