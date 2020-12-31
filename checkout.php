<?php
include "./includes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        $title = "Checkout Page";
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
        <h3 class="font-weight-bold mb-4">
            Checkout Page</h3>

        <form action="./controllers/OrderController.php" method="POST">
            <input type="hidden" name="create">
            <div class="card mb-5">
                <div class="card-body">
                    <h4 class="font-weight-bold">Choose Address</h4>
                    <div class="form-group">
                        <label for="address_id">Address Choice</label>

                        <select class="form-control" name="address_id" id="address_id">
                            <option value="">Select Address</option>
                            <option value="1">Address 1</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold mb-3">Items to Checkout</h4>
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
                                    class="text-danger small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i>
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

            <button type="submit" class="btn btn-order btn-success w-100 mx-0 mt-4">Create Order</button>

        </form>
    </div>



    <?php
    include "./partials/footer.php";
    ?>
</body>

</html>