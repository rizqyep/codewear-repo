<?php
include "./includes.php";
if (Authenticate::isAuthenticated() == false) {
    header('Location: /codewear');
}
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

        <?php if (Cart::count($_SESSION['user']['id']) > 0) : ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold mb-3">Items in your cart</h4>
                        <?php
                            $i = 0;
                            foreach ($carts as $cart) : ?>
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
                                            <h5><?php echo $cart['name']; ?></h5>
                                        </div>
                                        <p class="font-weight-bold">Rp.
                                            <?php echo $cart['price']; ?></p>

                                    </div>
                                    <a href="carts_delete.php?id=<?php echo $cart['id']; ?>"
                                        class="text-danger small text-uppercase mr-3"><i
                                            class="fas fa-trash-alt mr-1"></i>
                                        Remove item </a>
                                    <?php $subtotal = $cart['quantity'] * $cart['price']; ?>

                                    <p class="orange-text mt-3">Quantity : <?php echo $cart['quantity']; ?></p>
                                    <p class="text-success">Subtotal : Rp. <?php echo $subtotal ?></p>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm mx-0" data-toggle="modal"
                                        data-target="#cartItemModal<?php echo $i; ?>">
                                        Edit Quantity
                                    </button>


                                    <!-- Address Modal -->
                                    <div class="modal fade" id="cartItemModal<?php echo $i; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="cartItemModal<?php echo $i; ?>Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header elegant-color text-white">
                                                    <h5 class="modal-title font-weight-bold"
                                                        id="cartItemModal<?php echo $i; ?>Label">Edit
                                                        Item Quantity</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true" class="text-white">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <input type="hidden" name="createOnCheckout">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="quantity">Quantity</label>
                                                        <p class="small text-muted">Edit Current Cart Item Quantity
                                                        </p>
                                                        <input class="form-control" type="number" name="quantity"
                                                            id="quantity" value="<?php echo $cart['quantity']; ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Add New
                                                        Address</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <?php
                                $i++;
                                $total += $subtotal;
                            endforeach; ?>
                    </div>

                </div>
            </div>
            <div class="col-md-4 mt-4 mt-md-0">
                <div class="card">
                    <div class="card-body py-0 px-0">
                        <div class="p-3">
                            <h4 class="font-weight-bold text-center mb-3">Total Price</h4>
                            <h5 class="font-weight-bold text-center orange-text mb-3">Rp. <?php echo $total; ?></h5>
                        </div>
                        <a href="checkout.php"
                            class="btn btn-success font-weight-bold mx-0 my-0 w-100 btn-checkout">Proceed To
                            Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="mt-5"></div>

        <div class="d-flex justify-content-center mt-4">
            <img src="assets/svg/shop.svg" alt="Shop Illustration" width="300" height="300">
        </div>

        <h4 class="text-center font-weight-bold mt-3">There are no items on your cart!</h4>

        <div class="d-flex justify-content-center">
            <a href="products.php" class="mt-3 btn btn-success btn-md">Lets Go Shopping!</a>
        </div>
        <?php endif; ?>
    </div>
    <?php
    include "./partials/footer.php";
    ?>
</body>

</html>
