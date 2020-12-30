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
        $conn->close();
        return $usersArray;
    }

    public static function create($user){
        global $conn;
  
        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];
        $role = 'user';
        $sql = "INSERT INTO users (name, email, password, role) VALUES('$name', '$email', '$password', '$role')";
        if($conn->query($sql)){
            return "Success";
        }
        else{
            return "Fail";
        }
    }
}

?>