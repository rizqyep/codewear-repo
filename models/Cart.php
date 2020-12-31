<?php

include "Database.php";

class Cart{
    
    public static function getAll($user_id){
        global $conn;
        $sql = "SELECT carts.id, name, price, quantity,image FROM carts JOIN products on products.id = carts.item_id WHERE user_id = '$user_id'";
        $carts= $conn->query($sql);
        
        $cartsArray = array();

        while($row = $carts->fetch_assoc()){
            array_push($cartsArray, $row);
        }
        $conn->close();
        
        return $cartsArray;
    }

    public static function add($data){
        global $conn;
        $user_id = $data['user_id'];
        $item_id = $data['item_id'];
        $quantity = $data['quantity'];
        $sql = "INSERT INTO carts (user_id, item_id, quantity) VALUES('$user_id', '$item_id', '$quantity')";
        if($conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($data){
        global $conn;
        $user_id = $data['user_id'];
        $item_id = $data['item_id'];
        $quantity = $data['quantity'];
        $sql = "SELECT * from carts WHERE user_id = '$user_id' AND item_id = '$item_id'";
        $cart = $conn->query($sql)->fetch_assoc();
        $cart_id = $cart['id'];
        $newQuantity = $cart['quantity'] + $quantity;

        $sql = "UPDATE carts SET quantity = '$newQuantity' WHERE id = '$cart_id'";

        if($conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
        
    }

    public static function checkItem($user_id,$item_id){
        global $conn;

        $sql = "SELECT * from carts WHERE user_id = '$user_id' AND item_id = '$item_id'";
        $check = $conn->query($sql)->num_rows;
        
  
        if($check >0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function count($user_id){
        global $conn;

        $sql = "SELECT * FROM carts WHERE user_id = '$user_id'";
        $count = $conn->query($sql)->num_rows;
        
        if($count > 0){
            return $count;
        }
        else{
            return 0;
        }
    }

    public static function delete($user_id, $cart_id){
        global $conn;
        $sql = "DELETE FROM carts WHERE user_id = '$user_id'AND id = '$cart_id'";
        if($conn->query($sql))
        {
            return true;
        }
        else{
            return false;
        }

    }


}



?>