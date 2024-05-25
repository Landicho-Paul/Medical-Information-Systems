<?php
// Connect to your database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch customer data
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

// If there are results, create JSON array
if ($result->num_rows > 0) {
    $customers = array();
    while($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
    echo json_encode($customers);
} else {
    echo "0 results";
}

$conn->close();
?>
