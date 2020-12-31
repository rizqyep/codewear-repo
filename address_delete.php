<?php
session_start();
include "./models/Address.php";
error_reporting(-1);


$user_id = $_SESSION['user']['id'];
$address_id = $_GET['id'];

if(Address::delete($user_id, $address_id)){
    $_SESSION['flash_success']['message'] = 'Address data has been deleted !';
    $_SESSION['flash_success']['title'] = 'Success';
    header('Location: http://localhost/CodeWear/profile.php');
}
else{
    $_SESSION['flash_fail']['message'] = 'Address failed to delete!';
    $_SESSION['flash_fail']['title'] = 'Failed';
    header('Location: http://localhost/CodeWear/profile.php');
}