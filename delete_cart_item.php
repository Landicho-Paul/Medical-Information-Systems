<?php
session_start();
require_once("connect.php");

// Check if ID is set and is a number
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    // Escape the ID to prevent SQL injection
    $cartId = $conn->real_escape_string($_POST['id']);

    // Prepare and execute the delete query
    $query = "DELETE FROM addtocart WHERE cart_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $cartId);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID";
}

$conn->close();
?>
