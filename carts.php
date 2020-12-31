<?php
include "./includes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        $title = "Carts";
        include "./partials/header.php"; 
     
        $carts = Cart::getAll($_SESSION['user']['id']);
        $total = 0;
        
    ?>

    <link rel="stylesheet" href="assets/css/carts.css">

</head>

<body>

    <?php
        include "./partials/navbar.php";

    ?>

    <div class="container pt-3 pb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold mb-3">Items in your cart</h4>
                        <?php foreach($carts as $cart) : ?>
                        <div class="row">
                            <div class="col-4 col-md-5 col-lg-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid" src="assets/img<?php echo $cart['image']; ?>" alt="Sample">
                                    <a href="#!">
                                        <div class="mask waves-effect waves-light">
                                            <img class="img-fluid w-100" src="assets/img<?php echo $cart['image']; ?>">
                                            <div class="mask rgba-black-slight waves-effect waves-light"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 col-md-7 col-lg-9 ">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><?php echo $cart['name'];?></h5>
                                        </div>
                                        <p class="font-weight-bold">Rp.
                                            <?php echo $cart['price'];?></p>

                                    </div>
                                    <a href="carts_delete.php?id=<?php echo $cart['id'];?>"
                                        class="text-danger small text-uppercase mr-3"><i
                                            class="fas fa-trash-alt mr-1"></i>
                                        Remove item </a>
                                    <?php $subtotal = $cart['quantity'] * $cart['price'];?>

                                    <p class="orange-text mt-3">Quantity : <?php echo $cart['quantity'];?></p>
                                    <p class="text-success">Subtotal : Rp. <?php echo $subtotal ?></p>


                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <?php 
                        $total+= $subtotal;
                        endforeach;?>
                    </div>

                </div>
            </div>
            <div class="col-md-4 mt-4 mt-md-0">
                <div class="card">
                    <div class="card-body py-0 px-0">
                        <div class="p-3">
                            <h4 class="font-weight-bold text-center mb-3">Total Price</h4>
                            <h5 class="font-weight-bold text-center orange-text mb-3">Rp. <?php echo $total;?></h5>
                        </div>
                        <a href="checkout.php"
                            class="btn btn-success font-weight-bold mx-0 my-0 w-100 btn-checkout">Proceed To
                            Checkout</a>
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