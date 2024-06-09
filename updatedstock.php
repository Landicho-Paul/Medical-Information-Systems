<?php
include("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if medicine name is passed
if (isset($_POST['medicine_name'])) {
    $medicine = $_POST['medicine_name'];

    // Query to reduce the stock of the specified medicine by 1
    $updateSql = "UPDATE medicine SET stock = stock - 1 WHERE medicine_name = '$medicine' AND stock > 0";

    if ($conn->query($updateSql) === TRUE) {
        echo "Stock updated successfully for $medicine";
    } else {
        echo "Error updating stock for $medicine: " . $conn->error;
    }
} else {
    echo "No medicine name provided.";
}

$conn->close();
?>
