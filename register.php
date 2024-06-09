<?php 
session_start();

include("connect.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        $user_id = random_num(3);

        $query = "INSERT INTO users (user_id, username, password) VALUES ('$user_id', '$user_name', '$password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Please enter valid information!";
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title> 
    <link rel="shortcut icon" href="images/mlog.jpg">
    
</head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form method="post" action="register.php"> <!-- Changed action to register.php -->
      <div class="input-box">
        <input name="username" type="text" placeholder="Put @customer after your username" required> <!-- Added name attribute -->
      </div>
      <div class="input-box">
        <input name="password" type="password" placeholder="Create password" required> <!-- Added name attribute -->
      </div>
      <div class="input-box button">
        <input type="submit" value="Sign up">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
