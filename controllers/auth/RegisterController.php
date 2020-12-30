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
        $_SESSION['user'] = $user;
        header('Location: http://localhost/CodeWear');
    }
    else{
        $_SESSION['flash_fail']['title'] = "Terjadi Kesalahan!";
        $_SESSION['flash_fail']['message'] = "Mohon melakukan ulang proses pendaftaran!"; 
        header('Location: http://localhost/CodeWear/register');
    }
}


?>