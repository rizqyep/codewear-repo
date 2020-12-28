<?php
session_start();
require_once "../middleware/Authenticate.php";
require_once "../middleware/Admin.php";

    if(Authenticate::isAuthenticated()){
        if(!Admin::isAdmin($_SESSION['user'])){
            header('Location: http://localhost/CodeWear');
        }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>