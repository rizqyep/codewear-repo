<?php
session_start();
include "../models/Order.php";

error_reporting(-1);

function createOrder($user_id, $address_id){
    global $conn;
 
    if(Order::create($user_id, $address_id)){
        $_SESSION['flash_success']['message'] = 'Order successfully issued!';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/');
    }
    else{
        $_SESSION['flash_fail']['message'] = 'Order not issued!';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/checkout.php');
    }
}

if(isset($_POST['create'])){
    
    if($_POST['address_id'] == ''){
        $_SESSION['flash_fail']['message'] = 'Please choose your address!';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/checkout.php');
    }
    else{
        createOrder($_SESSION['user']['id'],$_POST['address_id']);
    }
}


?>