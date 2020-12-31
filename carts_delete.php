<?php
session_start();
include "./models/Cart.php";
error_reporting(-1);


$user_id = $_SESSION['user']['id'];
$cart_id = $_GET['id'];

if(Cart::delete($user_id, $cart_id)){
    $_SESSION['flash_success']['message'] = 'Product deleted from cart!';
    $_SESSION['flash_success']['title'] = 'Success';
    header('Location: http://localhost/CodeWear/carts.php');
}
else{
    $_SESSION['flash_fail']['message'] = 'Product not deleted from cart!';
    $_SESSION['flash_fail']['title'] = 'Failed';
    header('Location: http://localhost/CodeWear/carts.php');
}