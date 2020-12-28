<?php
session_start();
require_once "../middleware/Authenticate.php";
require_once "../middleware/Admin.php";
    if(Authenticate::isAuthenticated()){
        if(Admin::isAdmin($_SESSION['user'])){
         
            header('Location: http://localhost/CodeWear/admin');
        }
        else{
            header('Location: http://localhost/CodeWear');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Login";
    include "../partials/header.php";

    ?>
</head>

<body>
    <?php include "../partials/navbar.php";?>
    <div class="container pt-5 pb-5">
        <div class="card mx-auto">
            <div class="card-body">
                <h4 class="font-weight-bold text-center mb-3">Login</h4>
                <form action="../controllers/auth/LoginController.php" method="post">
                    <input type="hidden" name="login">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="d-flex justify-content-end">
                        <p>Not registered yet ? <a href="/CodeWear/auth/register.php">Register here</a></p>
                    </div>
                    <button class="btn elegant-color text-white font-weight-bold w-100 mx-0"
                        type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
    <?php include "../partials/footer.php";?>
</body>

</html>