<?php 
session_start();

  include("connect.php");
  include("function.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title >
        User
    </title>
    <link rel="shortcut icon"  href="images/mlog.jpg">
    <style>

    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/mlog.jpg" alt="MCISLogo">
            </div>
            <a href="index.php" class="logo_name" style="text-decoration: none;">MCIS</a>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="user.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="usermeds.php">
                    <i class="uil uil-capsule"></i>
                    <span class="link-name">Medicine</span>
                </a></li>
                <li><a href="userpharmacy.php">
                <i class='uil uil-building'></i>
                    <span class="link-name">Pharmacy</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="index.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>


            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            
            <img src="images/storm.jfif" alt="stormtropper">
        </div>

        <div class="container">
    <div class="card" id="card" style="margin-top: 50px; ">
        <img src="images/abdrug.png" class="card-img-top-p" style="margin-top: 50px;" alt="A.B Drugstore">
        <div class="card-body">
            <h5 class="card-title">A.B DRUGMART
            </h5>
            <p class="card-text">With us, your health is always first. <br> 45 San Juan, Sta Ana, Pampanga <br> 0998-574-8158/0908-892-8121 <br> abdrugmart@gmail.com</p>
            <a href="#" class="btn btn-primary" style="text-decoration: none; " >View</a>
        </div>
    </div> 
        

    <script src="script.js"></script>
</body>
</html>