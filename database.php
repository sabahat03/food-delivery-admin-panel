<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "flutter-php";

try {
    $conn = new PDO("mysql:host=$servername;port=3307;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
