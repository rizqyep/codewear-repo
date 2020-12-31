<?php


include "Database.php";


class Address{
    public static function getAll($user_id){
        global $conn;
        $addresses = $conn->query("SELECT * FROM addresses WHERE user_id = '$user_id'");
        $addressArray = array();
        while($address = $addresses->fetch_assoc()){
            array_push($addressArray, $address);
        }

        return $addressArray;
    }

    public static function create($data){
        global $conn;
        $user_id = $data['user_id'];
        $name = $data['name'];
        $province = $data['province'];
        $city = $data['city'];
        $district = $data['district'];
        $detail = $data['detail'];

        $sql = "INSERT INTO addresses (user_id, name, province, city, district, detail) VALUES ('$user_id', '$name', '$province', '$city', '$district', '$detail')";

        if($conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($data){
        global $conn;
        $address_id = $data['address_id'];
        $user_id = $data['user_id'];
        $name = $data['name'];
        $province = $data['province'];
        $city = $data['city'];
        $district = $data['district'];
        $detail = $data['detail'];

        $sql = "UPDATE addresses SET name = '$name', province = '$province', city = '$city', district = '$district', detail = '$detail' WHERE id = '$address_id'";

        if($conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function delete($user_id, $address_id){

        global $conn;

        $sql = "DELETE FROM addresses WHERE id = '$address_id' AND user_id = '$user_id'";
        if($conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function deliveryAddress($id){
        global $conn;
        $sql = "SELECT * FROM addresses WHERE id = '$id'";
        $address = $conn->query($sql)->fetch_assoc();
        return $address;
    }
}



?>