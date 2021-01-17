<?php
session_start();
error_reporting(-1);
require_once("../../models/User.php");
require_once("../../middleware/Admin.php");
function authenticate($request){
    $users = User::getAll();
    $logged_in = false;
    foreach($users as $user){
        if($user['email'] == $request['email'] && password_verify($request['password'], $user['password'])){
            $_SESSION['user'] = $user;
            $logged_in = true;
            if(Admin::isAdmin($_SESSION['user'])){
                header('Location: /codewear/admin');
            }
            else{
                header('Location: /codewear');
            }
        }
    }
    if($logged_in == false){
        $_SESSION['flash_fail']['title'] = "Log-in Failed!";
        $_SESSION['flash_fail']['message'] = "Invalid credentials provided"; 
        header('Location: /codewear/auth/login.php');
    }
}

if(isset($_POST['login'])){
    authenticate($_POST);
}


?>
