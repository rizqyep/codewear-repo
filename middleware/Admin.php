<?php 


class Admin{
    public static function isAdmin($user){
        if($user['role'] == 'admin'){
            return True;
        }
        else{
            return False;
        }
    }
}

?>