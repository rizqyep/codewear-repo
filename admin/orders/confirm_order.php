<?php
session_start();
require_once "../../middleware/Authenticate.php";
require_once "../../middleware/Admin.php";
require_once "../../models/Database.php";
if (Authenticate::isAuthenticated()) {
    if (!Admin::isAdmin($_SESSION['user'])) {
        header('Location: http://localhost/CodeWear');
    }
}

$order_id = $_GET['id'];
$sql = "UPDATE orders SET status = 'On Delivery' WHERE id = '$order_id'";

if ($conn->query($sql)) {
    $_SESSION['flash_success']['message'] = 'Order is confirmed!';
    $_SESSION['flash_success']['title'] = 'Success';
    header('Location: http://localhost/CodeWear/admin/orders');
} else {
    $_SESSION['flash_fail']['message'] = 'Order not confirmed';
    $_SESSION['flash_fail']['title'] = 'Failed';
    header('Location: http://localhost/CodeWear/admin/orders');
}