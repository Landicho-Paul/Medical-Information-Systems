<?php
session_start();
    include("connect.php");

    $image = $_POST['image'];
    $Name = $_POST['title'];
    $Price = (int)$_POST['price'];
    $dateandtime = date("Y-m-d h:i:sa");
    

    $sql = "INSERT INTO addtocart (Name, Price, Quantity, Date,image)
    VALUES ('$Name', '$Price', 1 ,'$dateandtime','$image')";

    if ($conn->query($sql) === TRUE) {
    
    header("Location: medicalsupplies.php");
    $_SESSION["error"] = '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
    Cart Successfully Added
  </div>';
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>