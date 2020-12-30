<!--Navbar-->

<nav class="navbar navbar-expand-lg navbar-dark elegant-color">

    <!-- Navbar brand -->
    <a class="navbar-brand font-weight-bold" href="#">Code Wear</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/CodeWear">Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/CodeWear/products.php">Products</a>
            </li>

        </ul>
        <!-- Links -->


        <ul class="navbar-nav ml-auto">
            <?php
            if(Authenticate::isAuthenticated()) :
            
            ?>
            <li class="nav-item">
                <a href="http://localhost/CodeWear/carts.php" class="nav-link">
                    <span class="icon-holder">
                        <i class="fas fa-shopping-cart cart-icon"></i>
                        <span class="icon-count">

                            <?php echo Cart::count($_SESSION['user']['id']);?>
                        </span>
                    </span>
                    <span class="d-md-none">Carts</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user text-white mr-2"></i><?php echo $_SESSION['user']['name'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://localhost/CodeWear/profile.php">Edit Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="http://localhost/CodeWear/auth/logout.php">Logout</a>
                </div>
            </li>
            <?php else : ?>
            <li class="nav-item">
                <a href="/CodeWear/auth/register.php" class="btn btn-md btn-primary font-weight-bold">Register</a>
            </li>
            <li class="nav-item">
                <a href="/CodeWear/auth/login.php"
                    class="btn btn-md elegant-color text-white font-weight-bold">Login</a>
            </li>
            <?php endif ;?>
        </ul>


    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->