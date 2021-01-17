<?php
session_start();
require_once "../middleware/Authenticate.php";
require_once "../middleware/Admin.php";

if (Authenticate::isAuthenticated()) {
    if (!Admin::isAdmin($_SESSION['user'])) {
        header('Location: /codewear');
    }
}
