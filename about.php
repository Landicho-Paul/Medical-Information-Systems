<!DOCTYPE html>
<html lang="en">
<head>
    <title>MCIS</title>
    <link rel="shortcut icon" href="images/mlog.jpg">
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
    font-size: 30px;
    font-weight: bold;
    color: #FFA500;
    font-family: "Oswald", sans-serif;
}

.menu {
    flex: 1;
    display: flex;
    justify-content: flex-start; /* Align menu items to the start */
    margin-left: 750px; /* Adjust this value to move the menu left or right */
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
    font-size: 17px;
}

.menu ul li a {
    text-decoration: none;
    color: white;
    padding: 10px;
    display: block;
    font-family: "Oswald", sans-serif;
}

.menu ul li .dropdown-content {
    display: none;
    position: absolute;
    background-color: white; /* Ensures the background is white */
    color: black; /* Ensures the text color is black */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Optional: Adds a shadow for better visibility */
    font-family: "Oswald", sans-serif;
}

.menu ul li .dropdown-content a {
    color: black; /* Ensures the text color remains black in the links */
    padding: 10px; /* Adds padding for better spacing */
    text-decoration: none; /* Removes underline from links */
    display: block; /* Ensures each link takes up full width */
    font-family: "Oswald", sans-serif;
}




.sign {
    display: flex;
    align-items: center;
    font-family: "Oswald", sans-serif;
}

.sign a {
    margin-left: 10px;
    text-decoration: none;
    color: #333;
    padding: 10px 20px;
    background: #FFA500;
    border-radius: 5px;
}



.content {
    margin-top: 150px;
    text-align: center;
    color: white;
    padding: 20px;
    font-family: "Oswald", sans-serif;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.content h1 {
    font-size:55px;
}

.content h2 {
    font-family: 'Times New Roman', Times, serif;
    font-size: 50px;
}

.content p {
    font-size: 28px;
    color: white;
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
                <?php if($loggedIn): ?>
                    <a href="dashboard.php" class="btn btn-dashboard">Dashboard</a>
                    <a href="?logout" class="btn btn-logout">Log Out</a>
                <?php else: ?>
                    <a href="register.php" class="btn btn-signup">Sign Up</a>
                    <a href="login.php" class="btn btn-login">Login</a>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="content">
            <h1>ABOUT US</h1>
            <p class="para"> We the Tech Support decided to help the community, to solve this problem, 
                we Tech Support will make a system that will bring guide to customers who will buy in 
                a pharmacy that has an available product or medicines. This system will bring insights 
                about the information of medicine of how much stocks do they have and it will help them 
                avoid queueing long in a pharmacy that doesn’t have the medicine. This system will ensure 
                to make an ease to everyone
                </p>
        </div>
    </div>


    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

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
