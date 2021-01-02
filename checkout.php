<?php
include "./includes.php";
if (Authenticate::isAuthenticated() == false) {
    header('Location: http://localhost/CodeWear');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Checkout Page";
    include "./partials/header.php";

    $carts = Cart::getAll($_SESSION['user']['id']);
    $total = 0;

    require_once("./models/Address.php");
    $addresses = Address::getAll($_SESSION['user']['id']);



    ?>

    <link rel="stylesheet" href="assets/css/carts.css">

</head>

<body>

    <?php
    include "./partials/navbar.php";

    ?>

    <!-- Address Modal -->
    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header elegant-color text-white">
                    <h5 class="modal-title font-weight-bold" id="addressModalLabel">Add New Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>

                <form action="./controllers/AddressController.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="createOnCheckout">
                        <div class="form-group">
                            <label class="font-weight-bold" for="name">Address Name</label>
                            <p class="small text-muted">eg : Home , Office</p>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="province">Province</label>
                            <input class="form-control" type="text" name="province" id="province" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="city">City</label>
                            <input class="form-control" type="text" name="city" id="city" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="district">District</label>
                            <input class="form-control" type="text" name="district" id="district" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="detail">Address Detail</label>
                            <p class="text-muted small">e.g. : Near the store</p>
                            <textarea name="detail" id="detail" class="form-control" cols="10" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add New Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="container pt-3 pb-5">
        <h3 class="font-weight-bold mb-4">
            Checkout Page</h3>

        <form action="./controllers/OrderController.php" method="POST">
            <input type="hidden" name="create">
            <div class="card mb-5">
                <div class="card-body">
                    <h4 class="font-weight-bold">Choose Address</h4>
                    <ul class="list-group mt-4">
                        <?php foreach ($addresses as $address) : ?>
                        <li class="list-group-item mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="address_id"
                                    value="<?php echo $address['id']; ?>">
                                <label class="form-check-label" for="inlineRadio1">
                                    <h5 class="font-weight-bold"><?php echo $address['name']; ?></h5>
                                    <p class="text-muted"><?php echo $address['province']; ?> -
                                        <?php echo $address['city']; ?> -
                                        <?php echo $address['district']; ?></p>
                                    <p class="text-muted small"><?php echo $address['detail']; ?></p>
                                </label>
                            </div>
                        </li>
                    </ul>

                    <?php endforeach; ?>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary w-100 mx-0 mt-4" data-toggle="modal"
                        data-target="#addressModal">
                        Add New Adresses
                    </button>



                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold mb-3">Items to Checkout</h4>
                    <?php foreach ($carts as $cart) : ?>
                    <div class="row">
                        <div class="col-4 col-md-5 col-lg-3">
                            <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                <img class="img-fluid" src="assets/img<?php echo $cart['image']; ?>" alt="Sample">
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
                                    class="text-danger small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i>
                                    Remove item </a>
                                <?php $subtotal = $cart['quantity'] * $cart['price']; ?>

                                <p class="orange-text mt-3">Quantity : <?php echo $cart['quantity']; ?></p>
                                <p class="text-success">Subtotal : Rp. <?php echo $subtotal ?></p>


                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <?php
                        $total += $subtotal;
                    endforeach; ?>
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