<?php
session_start();
include("connect.php");

$image = $_POST['image'];
$Name = $_POST['title'];
$Price = (int)$_POST['price'];
$dateandtime = date("Y-m-d h:i:sa");

// Insert item into the cart
$sql = "INSERT INTO addtocart (Name, Price, Quantity, Date, image)
VALUES ('$Name', '$Price', 1, '$dateandtime', '$image')";

if ($conn->query($sql) === TRUE) {
    $_SESSION["error"] = '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
    Cart Successfully Added
  </div>';
} else {
    $_SESSION["error"] = '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
    Error: ' . $sql . '<br>' . $conn->error . '
  </div>';
}

$conn->close();

// Redirect back to the referring page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
