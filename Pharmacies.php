<!DOCTYPE html>
<html lang="en">
<head>
    <title>MCIS</title>
    <link rel="shortcut icon" href="images/mlog.jpg">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
body {
    background-image: url('images/med.jpg');
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    font-family: Arial, sans-serif; 
    margin: 0; 
    padding: 0;
}
body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Overlay */
    z-index: -1; /* Ensure it stays behind the content */
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    color: black;
}

.icon .logo {
    font-size: 24px;
    font-weight: bold;
    color: #FFA500;
}

.menu {
    flex: 1;
    display: flex;
    justify-content: flex-start; /* Align menu items to the start */
    margin-left: 100px; /* Adjust this value to move the menu left or right */
}

.menu ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
}

.menu ul li {
    position: relative;
    margin-right: 20px;
}

.menu ul li a {
    text-decoration: none;
    color: white;
    padding: 10px;
    display: block;
}

.menu ul li .dropdown-content {
    display: none;
    position: absolute;
    background-color: white; /* Ensures the background is white */
    color: black; /* Ensures the text color is black */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Optional: Adds a shadow for better visibility */
}

.menu ul li .dropdown-content a {
    color: black; /* Ensures the text color remains black in the links */
    padding: 10px; /* Adds padding for better spacing */
    text-decoration: none; /* Removes underline from links */
    display: block; /* Ensures each link takes up full width */
}


.menu ul li .dropdown-content a:hover {
    background-color: #f1f1f1; /* Optional: Adds a light grey background on hover for better UX */
}

.sign {
    display: flex;
    align-items: center;
}

.sign a {
    margin-left: 10px;
    text-decoration: none;
    color: #333;
    padding: 10px 20px;
    background: #FFA500;
    border-radius: 5px;
}



.container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
        .card {
            border: 1px solid #E5E4E2; 
            border-radius: 10px; 
            margin: 0 10px; 
            width: 1300px; 
            height: 530px;
            border-style: none;
        }

        .card-img-top-p {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px; 
            border-top-right-radius: 10px; 
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            color: #E5E4E2; 
            font-weight: bold;
            margin-top: 20px; 
            margin-bottom: 10px; 
            font-size: 200%;
            font-family: "Oswald", sans-serif;
        
            
            
        }

        .card-text {
            color: #E5E4E2; 
            font-size: 190%; 
            margin-bottom: 20px;
            font-family: "Oswald", sans-serif;
        }


    </style>
</head>
<body>

<?php
session_start();

// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    // User is logged in
    $loggedIn = true;
} else {
    // User is not logged in
    $loggedIn = false;
}

// Logout functionality
if(isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();
    // Destroy the session
    session_destroy();
    // Redirect to index.php
    header("Location: index.php");
    exit;
}
?>

<div class="main">
    <div class="navbar">
    <div class="icon" >
        <a href="index.php" class="logo" style="text-decoration: none; ">MCIS</a>
    </div>

        <div class="menu" >
            <ul>
                <li class="dropdown">
                    <a href="" class="dropbtn">PRODUCTS</a>
                    <div class="dropdown-content">
                        <a href="medicine.php">All Products</a>
                        <a href="tables.php">Medicine</a>
                        <a href="personalcare.php">Personal Care</a>
                        <a href="medicalsupplies.php">Medical Supplies</a>
                    </div>
                </li>
                <li><a href="Pharmacies.php">A.BDRUGMART</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="mycart.php">MY CART</a></li>
            </ul>
        </div>

            <div class="sign">
                <?php if($loggedIn): ?>
                    <a href="dashboard.php" class="btn btn-dashboard">Dashboard</a>
                    <a href="?logout" class="btn btn-logout">Log Out</a>
                <?php else: ?>
                    <a href="register.php" class="btn btn-signup">Sign Up</a>
                    <a href="login.php" class="btn btn-login">Login</a>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="container">
    <div class="card" id="card">
        <img src="images/abdrug.png" class="card-img-top-p" alt="A.B Drugstore">
        <div class="card-body">
            <h5 class="card-title">A.B DRUGMART</h5>
            <p class="card-text">With us, your health is always first. <br> 45 San Juan, Sta Ana, Pampanga <br> 0998-574-8158/0908-892-8121 <br> abdrugmart@gmail.com</p>
            <a href="https://maps.app.goo.gl/o7SavFrqFDaPTyqaA" class="btn btn-primary" style="text-decoration: none; background-color: orange; ">Look</a>     
        </div>
    </div> 
</div>


    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
