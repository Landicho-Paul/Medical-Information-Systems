<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    // Perform necessary sanitization
    return $data;
}

// Handle form submission for adding medicine
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addMedicine"])) {
    $medicineName = sanitizeInput($_POST["medicineName"]);
    $price = sanitizeInput($_POST["price"]);
    $stock = sanitizeInput($_POST["stock"]);

    // Insert new medicine into database
    $sql = "INSERT INTO medicine (medicine_name, price, stock) VALUES ('$medicineName', '$price', '$stock')";

    if ($conn->query($sql) === TRUE) {
        echo "Medicine added successfully";
    } else {
        echo "Error adding medicine: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
