<?php
// Include database connection
include('connect.php');

// Check if the request method is GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the 'id' parameter is set and is a positive integer
    if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) !== false && $_GET['id'] > 0) {
        // Sanitize the input to prevent SQL injection
        $id = $_GET['id'];

        // Prepare SQL statement to delete a record from 'addtocart' table
        $stmt = $conn->prepare("DELETE FROM addtocart WHERE cart_id = ?");
        // Bind the 'id' parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Check if any record was affected
            if ($stmt->affected_rows > 0) {
                echo "Record deleted successfully.";
            } else {
                echo "No record found with the provided ID.";
            }
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Invalid ID provided.";
    }
} else {
    echo "Invalid request method.";
}

// Close database connection
$conn->close();
?>
