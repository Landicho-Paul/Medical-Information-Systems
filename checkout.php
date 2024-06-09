<?php
// Include the file for database connection
include 'connect.php';

// Assuming you're getting the medicine_name from somewhere in your code, let's say it's stored in a variable called $medicineName
$medicineName = $_POST['medicine_name']; // Adjust accordingly based on how you're getting the medicine name

// Assuming you're getting the new stock value from somewhere in your code, let's say it's stored in a variable called $newStockValue
$newStockValue = $_POST['new_stock']; // Adjust accordingly based on how you're getting the new stock value

// SQL query to update the stock value based on the medicine_name
$sql = "UPDATE medicine SET stock = '$newStockValue' WHERE medicine_name = '$medicineName'";

if ($conn->query($sql) === TRUE) {
    echo "Stock updated successfully";
} else {
    echo "Error updating stock: " . $conn->error;
}

$conn->close();
?>
