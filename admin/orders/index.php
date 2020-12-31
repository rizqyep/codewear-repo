<?php
session_start();
require_once "../../middleware/Authenticate.php";
require_once "../../middleware/Admin.php";

if (Authenticate::isAuthenticated()) {
    if (!Admin::isAdmin($_SESSION['user'])) {
        header('Location: http://localhost/CodeWear');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Home Page";
    include "../partials/header.php";
    require_once "../../models/Order.php";
    require_once "../../models/User.php";

    $orders = Order::getAllOrders();
    ?>

    <link rel="stylesheet" href="http://localhost/CodeWear/assets/css/orders.css">

</head>

<body>

    <?php
    include "../partials/navbar.php";


    ?>

    <div class="container pt-3 pb-3">

        <h3 class="font-weight-bold">All Orders</h3>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>User</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Details</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($orders as $order) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo User::getById($order['user_id'])['name']; ?></td>

                        <td><?php echo $order['created_at']; ?></td>
                        <?php
                            $orderTotal = Order::getTotal($order['id'])['total'];
                            ?>
                        <td>Rp.<?php echo number_format($orderTotal, 0, ",", "."); ?></td>
                        <td>
                            <?php if ($order['status'] == 'On Delivery') :
                                    echo $order['status'];
                                else :
                                ?>
                            <a href="confirm_order.php?id=<?php echo $order['id']; ?>"
                                class="btn btn-sm btn-success mx-0">Process Order</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm mx-0 " data-toggle="modal"
                                data-target="#orderDetailModal<?php echo $i; ?>">
                                See Details
                            </button>
                        </td>


                        <div class="modal fade" id="orderDetailModal<?php echo $i; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="orderDetailModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header elegant-color text-white">
                                        <h5 class="modal-title font-weight-bold" id="orderDetailModalLabel">Add New
                                            Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <h4 class="font-weight-bold">Products Ordered</h4>
                                        <ul class="list-group mt-3">
                                            <?php foreach (Order::getItems($order['id']) as $orderItem) : ?>
                                            <li class="list-group-item mb-2">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img src="../../assets/img<?php echo $orderItem['image']; ?>"
                                                            alt="Product Image" class="product-detail-image">
                                                    </div>
                                                    <div class="col-9">
                                                        <h5 class="font-weight-bold">
                                                            <?php echo $orderItem['name']; ?>
                                                        </h5>
                                                        <p class="text-muted">Price : <span class="text-success">Rp.
                                                                <?php echo number_format($orderItem['price'], 0, ",", "."); ?></span>
                                                        </p>

                                                        <p class="mt-2"> Quantity :
                                                            <?php echo $orderItem['quantity']; ?>
                                                        </p>
                                                        <p class="orange-text">Subtotal :
                                                            Rp.
                                                            <?php echo number_format($orderItem['subtotal'], 0, ",", "."); ?>
                                                        </p>

                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php
                                            require_once "../../models/Address.php";
                                            $address = Address::deliveryAddress($order['address_id']); ?>

                                        <h4 class="font-weight-bold mt-3">Delivery Address</h4>
                                        <li class="list-group-item mb-3">
                                            <h5 class="font-weight-bold"><?php echo $address['name']; ?></h5>
                                            <p class="text-muted"><?php echo $address['province']; ?> -
                                                <?php echo $address['city']; ?> -
                                                <?php echo $address['district']; ?></p>
                                            <p class="text-muted small"><?php echo $address['detail']; ?></p>
                                        </li>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Exit</button>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </tr>
                    <?php
                        $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php
    include "../partials/footer.php";
    ?>
</body>

</html>