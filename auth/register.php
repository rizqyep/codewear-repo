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
    $title = "Register";
    include "../partials/header.php";

    ?>
</head>

<body>
    <?php include "../partials/navbar.php";?>
    <div class="container pt-5 pb-5">
        <div class="card mx-auto">
            <div class="card-body">
                <h4 class="font-weight-bold text-center mb-3">Register Yourself</h4>
                <form action="../controllers/auth/RegisterController.php" method="post">
                    <input type="hidden" name="register">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="d-flex justify-content-end">
                        <p>Already have an account? <a href="/CodeWear/auth/login.php">Login here</a></p>
                    </div>
                    <button class="btn elegant-color text-white font-weight-bold w-100 mx-0"
                        type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
    <?php include "../partials/footer.php";?>
</body>

</html>