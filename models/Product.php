<?php

include "Database.php";

class Product{
    
    public static function getAll(){
        global $conn;
        $sql = "SELECT * FROM products";
        $products = $conn->query($sql);
        
        $productsArray = array();

        while($row = $products->fetch_assoc()){
            array_push($productsArray, $row);
        }
        $conn->close();
        
        return $productsArray;
    }

    public static function getById($id){
        global $conn;

        $sql = "SELECT * FROM products WHERE id = '$id'";

        $product = $conn->query($sql);

        return $product;

    }
}



?>