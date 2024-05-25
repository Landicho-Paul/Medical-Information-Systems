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
              if(strpos($user_name, '@admin') !== false) {
                  header("Location: dashboard.php");
                  die;
              } elseif(strpos($user_name, '@customer') !== false) {
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
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="shortcut icon" href="images/mlog.jpg">
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  background: #370bb7;
  overflow: hidden;
}
::selection{
  background: rgba(26,188,156,0.3);
}
.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 170px auto;
}
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
  height: 90px;
  background: #4070f4;
  border-radius: 5px 5px 0 0;
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  border-color: #4070f4;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999;
}
.wrapper form .row i{
  position: absolute;
  width: 47px;
  height: 100%;
  color: #fff;
  font-size: 18px;
  background: #4070f4;
  border: 1px solid #4070f4;
  border-radius: 5px 0 0 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form .pass{
  margin: -8px 0 20px 0;
}
.wrapper form .pass a{
  color: #4070f4;
  font-size: 17px;
  text-decoration: none;
}
.wrapper form .pass a:hover{
  text-decoration: underline;
}
.wrapper form .button input{
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background: #4070f4;
  border: 1px solid #4070f4;
  cursor: pointer;
}
form .button input:hover{
  background: #4070f4;
}
.wrapper form .signup-link{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-link a{
  color: #4070f4;
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}
  </style>
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
                <input type="password" name="password" placeholder="Password" required >
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