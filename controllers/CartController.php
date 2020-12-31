<?php
session_start();
include "../models/Cart.php";
error_reporting(-1);

function addToCart($item_id, $quantity){
    $cartData = array(
        'user_id' => $_SESSION['user']['id'],
        'item_id' => $item_id,
        'quantity' => $quantity
    );
    if(Cart::add($cartData)){
        $_SESSION['flash_success']['message'] = 'Product added to cart!';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/product_detail.php?id='.$item_id);
    }
    else{
        $_SESSION['flash_fail']['message'] = 'Product not added to cart!';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/product_detail.php?id='.$item_id);
    }
}


function updateCart($item_id, $quantity){
    $cartData = array(
        'user_id' => $_SESSION['user']['id'],
        'item_id' => $item_id,
        'quantity' => $quantity
    );


    if(Cart::update($cartData)){
        $_SESSION['flash_success']['message'] = 'Product added to cart!';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/product_detail.php?id='.$item_id);
    }
    else{
     
        $_SESSION['flash_fail']['message'] = 'Product not added to cart!';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/product_detail.php?id='.$item_id);
     }
}


if(isset($_POST['create'])){
    if($_POST['quantity'] <1 || $_POST['quantity'] == ''){
        $_SESSION['flash_fail']['message'] = 'Cannot add empty quantity!';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/product_detail.php?id='.$item_id);
  
    }

    if(Cart::checkItem($_SESSION['user']['id'], $_POST['item_id'])){
        echo ("on cart");
        updateCart($_POST['item_id'], $_POST['quantity']);
    }
    else{
    addToCart($_POST['item_id'], $_POST['quantity']);
}
}


?>