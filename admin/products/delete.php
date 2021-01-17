<?php
session_start();
include "../../models/Product.php";

require_once "../../middleware/Authenticate.php";
require_once "../../middleware/Admin.php";

if (Authenticate::isAuthenticated()) {
    if (!Admin::isAdmin($_SESSION['user'])) {
        header('Location: /codewear');
    }
} else {
    header('Location: /codewear');
}

if (Product::delete($_GET['id'])) {
    $_SESSION['flash_success']['message'] = 'Product successfully deleted!';
    $_SESSION['flash_success']['title'] = 'Success';
    header('Location: /codewear/admin/products');
} else {
    $_SESSION['flash_fail']['message'] = 'Product not deleted !';
    $_SESSION['flash_fail']['title'] = 'Failed';
    header('Location: /codewear/admin/products');
}
