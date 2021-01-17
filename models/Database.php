<?php

date_default_timezone_set("Asia/Jakarta");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codewear";


$conn = new mysqli($servername, $username, $password, $dbname);


//Validate Connection
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}
