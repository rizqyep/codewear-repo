<?php
session_start();
include "../../models/Product.php";


function addProduct($data)
{
    if (Product::create($data)) {
        $_SESSION['flash_success']['message'] = 'Product successfully added!';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/admin/products');
    } else {
        $_SESSION['flash_fail']['message'] = 'Product not added !';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/admin/products/create.php');
    }
}

function updateProduct($data)
{

    if (Product::update($data)) {
        $_SESSION['flash_success']['message'] = 'Product successfully updated!';
        $_SESSION['flash_success']['title'] = 'Success';
        header('Location: http://localhost/CodeWear/admin/products');
    } else {
        $_SESSION['flash_fail']['message'] = 'Product not updated !';
        $_SESSION['flash_fail']['title'] = 'Failed';
        header('Location: http://localhost/CodeWear/admin/products/edit.php?id=' . $data['id']);
    }
}

if (isset($_POST['create'])) {

    $target_dir = "../../assets/img/products/";
    $target_file = $_FILES['image']['name'];
    $uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file);

    $toDbFileName = "/products/" . $target_file;

    $data = array(
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'description' => $_POST['description'],
        'image' => $toDbFileName
    );

    addProduct($data);
}

if (isset($_POST['update'])) {
    $file_provided = $_FILES['image']['name'] == '';

    if ($file_provided == false) {

        $target_dir = "../../assets/img/products/";
        $target_file = $_FILES['image']['name'];
        $uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file);

        $toDbFileName = "/products/" . $target_file;

        $data = array(
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'image' => $toDbFileName
        );
    } else {
        $data = array(
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
        );
    }
    updateProduct($data);
}