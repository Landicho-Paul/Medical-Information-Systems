<?php error_reporting(E_ALL); ?>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mcis"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
/*
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
}
*/


$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="images/mlog.jpg">
</head>
<style>

h1 {
  display: flex;
  justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
  height: 50vh; /* Adjust to desired height */
  margin: 0; /* Remove default margin */
  font-size: 90px;
}

        
</style>

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
                <li><a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="meds.php">
                    <i class="uil uil-capsule"></i>
                    <span class="link-name">Medicine</span>
                </a></li>
                <li><a href="order.php">
                    <i class="uil uil-shopping-bag"></i>
                    <span class="link-name">Orders</span>
                </a></li>
                
                
            </ul>
          
            <ul class="logout-mode">
                <li><a href="index.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>     
        <img src="images/storm.jfif" alt="stormtropper">
    </div>
    <h1>WELCOME TO MCIS DASHBOARD</h1>  
 
</section>


    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
 function fetchDataFromDatabase() {
    $.ajax({
        url: "fetch_data.php",
        type: "GET",
        success: function(response) {
            console.log(response); // Log the response
            
            // Update the HTML table with the response
            $("#customerTable tbody").html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert("Failed to fetch data from the database.");
        }
    });
}
    </script>


</body>
</html>
