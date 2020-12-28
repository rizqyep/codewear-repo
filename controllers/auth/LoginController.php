<?php
session_start();
error_reporting(-1);
require_once("../../models/User.php");
require_once("../../middleware/Admin.php");
function authenticate($request){
    $users = User::getAll();
    
    foreach($users as $user){
        if($user['email'] == $request['email'] && password_verify($request['password'], $user['password'])){
            $_SESSION['user'] = $user;
            if(Admin::isAdmin($_SESSION['user'])){
                header('Location: http://localhost/CodeWear/admin');
            }
            else{
                header('Location: http://localhost/CodeWear');
            }
        }
    }
}

if(isset($_POST['login'])){
    authenticate($_POST);
}


?>