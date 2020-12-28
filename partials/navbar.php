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
                <a class="nav-link" href="#">Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
            </li>

        </ul>
        <!-- Links -->


        <ul class="navbar-nav ml-auto">
            <?php
            if(Authenticate::isAuthenticated()) :
            ?>
            <li class="nav-item">
                <a href="/CodeWear/auth/logout.php" class="btn btn-md btn-danger font-weight-bold">Logout</a>
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