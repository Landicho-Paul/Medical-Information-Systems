<?php
include("connect.php");

$sql = "UPDATE addtocart SET Checkout='Approve' ";

if ($conn->query($sql) === TRUE) {
    
    header("Location: mycart.php");
    $_SESSION["error"] = '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
    Cart Successfully Checkout
  </div>';
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


$conn->close();
?>