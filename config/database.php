<?php

$host = "localhost";
$dbName = "BookShop";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host; dbname=$dbName", $user, $pass);
   
} catch (Exception $err) {
    echo "error: " . $err->getMessage();
}

?>