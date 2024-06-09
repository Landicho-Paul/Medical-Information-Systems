<?php
// Include database connection
include 'connect.php';

// Check if cart_id is set and not empty
if (isset($_GET['cart_id']) && !empty($_GET['cart_id'])) {
    // Escape any special characters to prevent SQL injection
    $cart_id = $conn->real_escape_string($_GET['cart_id']);
    
    // SQL to delete cart_id from the addtocart table
    $sql = "DELETE FROM addtocart WHERE cart_id = '$cart_id'";

    // Execute the deletion query
    if ($conn->query($sql) === TRUE) {
        // Output an empty response for successful deletion
        echo "";
    } else {
        // Output an error response
        echo "error";
    }
} else {
    // Output an empty response for missing cart ID
    echo "";
}

// Close connection
$conn->close();
?>
