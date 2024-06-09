<?php

require_once("connect.php");
$query = " SELECT * FROM addtocart WHERE Checkout = 'Approve' ";
$result = mysqli_query($conn, $query);

?>
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
    font-size: 17px;
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
    font-family: "Oswald", sans-serif;
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
    padding: 20px;
    color: white;
    font-family: "Oswald", sans-serif;
}
.orders {
    text-align: center;
    margin-top: 20px; /* Adjust the margin as needed */
}


table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 10px;
    margin-left: 90px;
    overflow: hidden; /* Ensures border radius is applied */
}

thead {
    background-color: #370bb7;
    color: white;
}

th, td {
    padding: 20px;
    text-align: left;
}

th {
    border: none; /* Remove borders from column headers */
}

td {
    border: none; /* Remove borders from table cells */
    background-color: rgba(255, 255, 255, 0.8); /* Light background for readability */
    color: black;
}

tbody tr:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.6); /* Alternate row coloring */
}

tbody tr:nth-child(odd) {
    background-color: rgba(255, 255, 255, 0.8);
}

td a {
    color: #333; /* Button color */
    text-decoration: none; /* Remove underline */
    margin: 0 5px; /* Adjust spacing between buttons */
}
th act {
    width: 100px;
}

td a ion-icon {
    font-size: 20px; /* Adjust icon size */
}

.delete-button ion-icon {
    color: red; /* Change delete button color */
}

/* Hover effect for buttons */
td a:hover {
    opacity: 0.8; /* Reduce opacity on hover */
}


    </style>
</head>
<body>

<?php

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
        
        <div class="content">
    <h1 class="orders">My Cart</h1>
    <table>
        <thead>
            <tr class="column">
                <th>Date and Time</th>
                <th>Order ID</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Total</th>
                <th class="act">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample row, replace with PHP-generated rows -->




            <tr>
                <?php 
                
                    while($row = mysqli_fetch_assoc($result)){
                
                ?>
                <td><?php echo $row['Date'] ?></td>
                <td><?php echo $row['cart_id'] ?></td>
                <td><?php echo $row['Name'] ?></td>
                <td><?php echo $row['Quantity'] ?></td>
                <td>₱ <?php echo $row['Price'] ?>.00</td>
                <td>
                <td>
    </td>
    <td>
        <a href="#" class="delete-button" data-id="<?php echo $row['cart_id']; ?>"><ion-icon name="trash"></ion-icon></a>
    <td>
    <a href="#" id="download-link"><ion-icon name="download"></ion-icon></a>
</td>

                
    </tr>
    <?php 
        
        }
        
    ?>
    
        </tbody>
    </table>
</div>
    </div>

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<!--Delete row-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-button').click(function(e) {
            e.preventDefault();
            var cartId = $(this).data('id');
            var $button = $(this); // Store the button reference
            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    url: 'delete_cart_item.php',
                    type: 'POST',
                    data: { id: cartId },
                    success: function(response) {
                        // Optionally, you can check the response for success message
                        if (response.includes("Record deleted successfully")) {
                            location.reload(); // Reload the page
                            // $button.closest('tr').remove(); // Alternatively, remove the row from the table
                        } else {
                            console.error("Failed to delete record: " + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error: " + xhr.responseText);
                    }
                });
            }
        });
    });
</script>


<!-- Download Order Receipt-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#download-link').click(function() {
            // AJAX call to retrieve data from the database
            $.ajax({
                type: 'POST',
                url: 'downloadreceipt.php',
                success: function(response) {
                    // Open a new tab with the response data
                    var newTab = window.open();
                    newTab.document.write('<!DOCTYPE html><html><head><title>Receipt</title><style>body { font-family: Arial, sans-serif; } .receipt { width: 400px; margin: 20px auto; border: 2px solid #000; padding: 20px; } .receipt-header { text-align: center; font-weight: bold; } .receipt-table { width: 100%; border-collapse: collapse; margin-top: 20px; } .receipt-table th, .receipt-table td { padding: 10px; border-bottom: 1px solid #ddd; } .receipt-table th { text-align: left; }</style></head><body><div class="receipt"><div class="receipt-header">Receipt</div><table class="receipt-table">' + response + '</table></div></body></html>');
                    
                    // Download the content of the new tab as a file
                    var htmlContent = newTab.document.documentElement.outerHTML;
                    var blob = new Blob([htmlContent], { type: 'text/html' });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'OrderReceipt.html'; // Set the file name
                    link.click();
                    
                    // Close the new tab
                    newTab.close();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle error
                }
            });
        });
    });
</script>

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
