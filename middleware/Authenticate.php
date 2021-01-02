<?php
class Authenticate
{

    public static function isAuthenticated()
    {

        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }
}