<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcis";

$conn = new mysqli( $username, $password, $mcis);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if user exists
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User exists, redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }
}

$conn->close();
?>
