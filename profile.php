<?php
include "./includes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Profile";
    require_once('./models/Cart.php');
    include "./partials/header.php";

    require_once('./models/Address.php');
    $addresses = Address::getAll($_SESSION['user']['id']);
    ?>

    <link rel="stylesheet" href="assets/css/landing.css">

</head>

<body>

    <?php
    include "./partials/navbar.php";
    ?>



    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg mb-5 border-light">
                    <div class="card-body">
                        <h1 class="text-center mb-3" style="font-size : 84px;">
                            <i class="fas fa-user"></i>
                        </h1>

                        <p class="font-weight-bold text-center">
                            <?php echo $_SESSION['user']['name']; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card shadow-lg border-light">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h4 class="font-weight-bold">Your Address</h4>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-md mx-0 " data-toggle="modal"
                                data-target="#addressModal">
                                Add New Adresses
                            </button>
                        </div>
                        <!-- Address Modal -->
                        <div class="modal fade" id="addressModal" tabindex="-1" role="dialog"
                            aria-labelledby="addressModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header elegant-color text-white">
                                        <h5 class="modal-title font-weight-bold" id="addressModalLabel">Add New
                                            Address</h5>


                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">&times;</span>
                                        </button>
                                    </div>

                                    <form action="./controllers/AddressController.php" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="create">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="name">Address Name</label>
                                                <p class="small text-muted">eg : Home , Office</p>
                                                <input class="form-control" type="text" name="name" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="province">Province</label>
                                                <input class="form-control" type="text" name="province" id="province"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="city">City</label>
                                                <input class="form-control" type="text" name="city" id="city" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="district">District</label>
                                                <input class="form-control" type="text" name="district" id="district"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold" for="detail">Address Detail</label>
                                                <p class="text-muted small">e.g. : Near the store</p>
                                                <textarea name="detail" id="detail" class="form-control" cols="10"
                                                    rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Add New Address</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <ul class="list-group mt-4">

                            <?php
                            $i = 1;
                            foreach ($addresses as $address) : ?>
                            <li class="list-group-item mb-3">

                                <h5 class="font-weight-bold"><?php echo $address['name']; ?></h5>
                                <p class="text-muted"><?php echo $address['province']; ?> -
                                    <?php echo $address['city']; ?> -
                                    <?php echo $address['district']; ?></p>
                                <p class="text-muted small"><?php echo $address['detail']; ?></p>
                                <div class="d-flex justify-content-around">
                                    <button type="button"
                                        class="btn btn-success btn-sm font-weight-bold mx-0 w-100 mr-2"
                                        data-toggle="modal" data-target="#addressEditModal<?php echo $i; ?>">
                                        Edit Address Data
                                    </button>
                                    <a class="btn btn-danger btn-sm mx-0 w-100 ml-2 font-weight-bold"
                                        href="address_delete.php?id=<?php echo $address['id']; ?>">Delete Address</a>
                                </div>
                                <!-- Address Modal -->
                                <div class="modal fade" id="addressEditModal<?php echo $i; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="addressModalLabel<?php echo $i; ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header elegant-color text-white">
                                                <h5 class="modal-title font-weight-bold"
                                                    id="addressModalLabel<?php echo $i; ?>">Update Address</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>

                                            <form action="./controllers/AddressController.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="update">
                                                    <input type="hidden" name="address_id"
                                                        value="<?php echo $address['id']; ?>">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="name">Address Name</label>
                                                        <p class="small text-muted">eg : Home , Office</p>
                                                        <input class="form-control" type="text" name="name" id="name"
                                                            value="<?php echo $address['name']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="province">Province</label>
                                                        <input class="form-control" type="text" name="province"
                                                            id="province" value="<?php echo $address['province']; ?>"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="city">City</label>
                                                        <input class="form-control" type="text" name="city" id="city"
                                                            value="<?php echo $address['city']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="district">District</label>
                                                        <input class="form-control" type="text" name="district"
                                                            id="district" value="<?php echo $address['district']; ?>"
                                                            required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="detail">Address
                                                            Detail</label>
                                                        <p class="text-muted small">e.g. : Near the store</p>
                                                        <textarea name="detail" id="detail" class="form-control"
                                                            cols="10"
                                                            rows="4"><?php echo $address['detail']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update
                                                        Address</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <?php
                                $i++;
                            endforeach; ?>
                        </ul>
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