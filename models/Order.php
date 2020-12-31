<?php

include "Database.php";

class Order{

    public static function create($user_id, $address_id){
        global $conn;
        $allInserted = true;
        $order = $conn->query("INSERT INTO orders (user_id, status, address_id) VALUES ('$user_id', 'Issued', '$address_id')");
        $order_id = $conn->insert_id;
        
        $cartItems = $conn->query("SELECT * FROM carts WHERE user_id = '$user_id'");

        while($cartItem = $cartItems->fetch_assoc()){
            if(!$conn->query("INSERT INTO order_item (order_id, item_id, quantity) VALUES ('$order_id', '$cartItem[item_id]', '$cartItem[quantity]')")){
                $allInserted = false;
            }   
        }

        if($allInserted){
            $conn->query("DELETE FROM carts WHERE user_id = '$user_id'");
            return $allInserted;
        }
        else{
            return false;
        }
    }
}



?>