<?php
session_start();
include "../models/Address.php";

error_reporting(-1);

function createAddressOnCheckout($data){

    $addressData = array(
        'user_id' => $_SESSION['user']['id'],
        'name' => $data['name'],
        'city' => $data['city'],
        'province' => $data['province'],
        'district' => $data['district'],
        'detail' => $data['detail']
    );

    if(Address::create($addressData)){
        $_SESSION['flash_success']['message'] = 'Address has been added !';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/checkout.php');
    }
    else{
        $_SESSION['flash_fail']['message'] = 'Address has not been added';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/checkout.php');
    }
}


function createAddress($data){

    $addressData = array(
        'user_id' => $_SESSION['user']['id'],
        'name' => $data['name'],
        'city' => $data['city'],
        'province' => $data['province'],
        'district' => $data['district'],
        'detail' => $data['detail']
    );

    if(Address::create($addressData)){
        $_SESSION['flash_success']['message'] = 'Address has been added !';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/profile.php');
    }
    else{
        $_SESSION['flash_fail']['message'] = 'Address has not been added';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/profile.php');
    }
}


function updateAddress($data){

    $addressData = array(
        'address_id' =>$data['address_id'],
        'user_id' => $_SESSION['user']['id'],
        'name' => $data['name'],
        'city' => $data['city'],
        'province' => $data['province'],
        'district' => $data['district'],
        'detail' => $data['detail']
    );

    if(Address::update($addressData)){
        $_SESSION['flash_success']['message'] = 'Address has been Edited !';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/profile.php');
    }
    else{
        $_SESSION['flash_fail']['message'] = 'Address has not been Edited';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/profile.php');
    }
    
}



if(isset($_POST['createOnCheckout'])){
    createAddressOnCheckout($_POST);
}


if(isset($_POST['create'])){
    createAddress($_POST);
}

if(isset($_POST['update'])){
    updateAddress($_POST);
}


?>