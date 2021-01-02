<?php

include "Database.php";

class Product
{

    public static function getAll()
    {
        global $conn;
        $sql = "SELECT * FROM products";
        $products = $conn->query($sql);

        $productsArray = array();

        while ($row = $products->fetch_assoc()) {
            array_push($productsArray, $row);
        }
        $conn->close();

        return $productsArray;
    }

    public static function getById($id)
    {
        global $conn;

        $sql = "SELECT * FROM products WHERE id = '$id'";

        $product = $conn->query($sql);

        return $product;
    }

    public static function create($data)
    {
        global $conn;

        $name = $data['name'];
        $price = $data['price'];
        $description = $data['description'];
        $image = $data['image'];
        $stock = $data['stock'];

        $sql = "INSERT INTO products (name, price, image, description, stock) VALUES ('$name', '$price', '$image', '$description', '$stock')";
        if ($conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }


    public static function update($data)
    {
        global $conn;

        if ($data['image'] != NULL) {
            $name = $data['name'];
            $price = $data['price'];
            $description = $data['description'];
            $image = $data['image'];
            $id = $data['id'];
            $stock = $data['stock'];

            $sql = "UPDATE products SET name = '$name', price = '$price', image = '$image', stock = '$stock' , description = '$description' WHERE id = '$id'";
        } else {
            $name = $data['name'];
            $price = $data['price'];
            $description = $data['description'];
            $id = $data['id'];
            $stock = $data['stock'];

            $sql = "UPDATE products SET name = '$name', price = '$price', stock = '$stock', description = '$description' WHERE id = '$id'";
        }

        if ($conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public static function count()
    {
        global $conn;

        $sql = "SELECT * FROM products";
        $count = $conn->query($sql)->num_rows;

        return $count;
    }

    public static function delete($id)
    {
        global $conn;

        $sql = "DELETE FROM products WHERE id = '$id'";
        if ($conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}