<?php
session_start();
error_reporting(-1);
require_once("../../models/User.php");


if(isset($_POST['register'])){
    $user = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'],PASSWORD_BCRYPT)
    );
    
    if(User::create($user) == 'Success'){
        $_SESSION['flash_success']['title'] = "Success!";
        $_SESSION['flash_success']['message'] = "You can login with your account now!"; 
   
        header('Location: http://localhost/CodeWear/auth/login.php');
    }
    else{
        $_SESSION['flash_fail']['title'] = "Oops!";
        $_SESSION['flash_fail']['message'] = "A problem occured, please retry to register!"; 
        header('Location: http://localhost/CodeWear/auth/register.php');
    }
}


?>