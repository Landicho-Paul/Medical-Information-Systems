<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    die;
}

$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'];
$userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MCIS</title>
    <link rel="shortcut icon" href="images/mlog.jpg">
    <link rel="stylesheet" href="css/index.css">
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
    </style>
</head>
<body>

<div class="main">
    <div class="navbar">
        <div class="icon">
            <a href="index.php" class="logo" style="text-decoration: none;">MCIS</a>
        </div>

        <div class="menu">
            <ul>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropbtn" id="productsDropdown">PRODUCTS</a>
                    <div class="dropdown-content">
                        <a href="medicine.php">All Products</a>
                        <a href="tables.php">Medicine</a>
                        <a href="personalcare.php">Personal Care</a>
                        <a href="medicalsupplies.php">Medical Supplies</a>
                    </div>
                </li>
                <li><a href="Pharmacies.php">A.BDRUGMART</a></li>
                <li><a href="medicine.php">ABOUT</a></li>
                <li><a href="mycart.php">MY CART</a></li>
            </ul>
        </div>

        <div class="sign">
            <?php if ($loggedIn): ?>
                <?php if ($userRole === 'admin'): ?>
                    <a href="dashboard.php" class="btn btn-dashboard">Dashboard</a>
                <?php endif; ?>
                <a href="?logout" class="btn btn-logout">Log Out</a>
            <?php else: ?>
                <a href="register.php" class="btn btn-signup">Sign Up</a>
                <a href="login.php" class="btn btn-login">Login</a>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="content">
        <h1>Medcare Information System</h1>
        <h2 style="margin-bottom: 15px;">for A.B Drugmart</h2>
        <p class="par">Medicare Information System is a system that helps and guides consumers faster to know what available medicine does a drugstore have and it helps consumers avoid queuing longer if the medicine at the drugstore they’ve entered is out of stock.</p><br>
        <a href="medicine.php" class="cn">View Medicine!</a>
    </div>
</div>

<script>
    document.getElementById('productsDropdown').addEventListener('click', function() {
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    });

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    }
</script>
</body>
</html>
