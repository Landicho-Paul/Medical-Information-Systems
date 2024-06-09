<?php 
session_start();

include("connect.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $query = "SELECT * FROM users WHERE username = '$user_name' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] === $password) { 
                $_SESSION['user_id'] = $user_data['user_id'];
                $_SESSION['loggedIn'] = true;
                $_SESSION['user_role'] = (strpos($user_name, '@admin') !== false) ? 'admin' : 'customer';

                if($_SESSION['user_role'] === 'admin') {
                    header("Location: dashboard.php");
                    die;
                } else {
                    header("Location: index.php");
                    die;
                }
            } else {
                echo "Wrong username or password!";
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Wrong username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> 
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="shortcut icon" href="images/mlog.jpg">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <form action="login.php" method="post">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="pass"><a href="#">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" value="Login">
                </div>
                <div class="signup-link">Not a member? <a href="register.php">Signup now</a></div>
            </form>
        </div>
    </div>
</body>
</html>
