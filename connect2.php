<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "mcis2";

try {
    // Attempt to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set character set to utf8mb4
    $pdo->exec("set names utf8mb4");
} catch (PDOException $e) {
    // If connection fails, display error message
    echo "Connection failed: " . $e->getMessage();
    // You can log this error message or handle it in any other appropriate way
}
?>