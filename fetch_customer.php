<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "mcis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all users from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if there are any users
if ($result->num_rows > 0) {
    // Output data of each row
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    // Output the data as JSON
    echo json_encode($users);
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
