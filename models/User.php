<?php 


include "Database.php";
class User {
    
    public static function getAll(){
        global $conn;
        $sql = "SELECT * FROM users";
        $users = $conn->query($sql);
        
        $usersArray = array();
        while($row = $users->fetch_assoc()){
            array_push($usersArray, $row);
        }

        return $usersArray;
    }
}

?>