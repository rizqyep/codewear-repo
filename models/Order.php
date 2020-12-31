<?php

include "Database.php";

class Order
{

    public static function create($user_id, $address_id)
    {
        global $conn;
        $allInserted = true;
        $order = $conn->query("INSERT INTO orders (user_id, status, address_id) VALUES ('$user_id', 'Issued', '$address_id')");
        $order_id = $conn->insert_id;

        $cartItems = $conn->query("SELECT * FROM carts JOIN products on item_id = products.id WHERE user_id = '$user_id'");

        while ($cartItem = $cartItems->fetch_assoc()) {
            $subtotal = $cartItem['quantity'] * $cartItem['price'];
            if (!$conn->query("INSERT INTO order_item (order_id, item_id, quantity, subtotal) VALUES ('$order_id', '$cartItem[item_id]', '$cartItem[quantity]', '$subtotal')")) {
                $allInserted = false;
            }
        }

        if ($allInserted) {
            $conn->query("DELETE FROM carts WHERE user_id = '$user_id'");
            return $allInserted;
        } else {
            return false;
        }
    }

    public static function getAll($user_id)
    {
        global $conn;
        $sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
        $ordersArray = array();
        $orders = $conn->query($sql);

        while ($order = $orders->fetch_assoc()) {
            array_push($ordersArray, $order);
        }

        return $ordersArray;
    }

    public static function getTotal($id)
    {
        global $conn;

        $sql = "SELECT SUM(subtotal) as total FROM order_item WHERE order_id = '$id'";

        return $conn->query($sql)->fetch_assoc();
    }

    public static function getItems($id)
    {
        global $conn;
        $sql = "SELECT order_item.quantity as quantity ,order_item.subtotal as subtotal ,products.image as image,products.name as name ,products.price as price FROM order_item JOIN products on item_id = products.id WHERE order_id = '$id'";
        $orderItemsArray = array();
        $orderItems = $conn->query($sql);

        while ($orderItem = $orderItems->fetch_assoc()) {
            array_push($orderItemsArray, $orderItem);
        }

        return $orderItemsArray;
    }

    public static function countSales()
    {
        global $conn;

        $sql = "SELECT SUM(subtotal) as total from order_item";

        return $conn->query($sql)->fetch_assoc();
    }

    public static function getAllOrders()
    {
        global $conn;

        $sql = "SELECT * FROM orders";
        $ordersArray = array();
        $orders = $conn->query($sql);

        while ($order = $orders->fetch_assoc()) {
            array_push($ordersArray, $order);
        }

        return $ordersArray;
    }
}