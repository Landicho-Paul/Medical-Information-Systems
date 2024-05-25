<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <title>Dashboard</title>
    <link rel="shortcut icon" href="images/mlog.jpg">
</head>
<style>
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
 
    <div class="content">
    <h1 class="orders">Orders</h1>
    <table>
        <thead>
            <tr class="column">
                <th>Date</th>
                <th>Order ID</th>
                <th>Name</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample row, replace with PHP-generated rows -->
            <tr class="row">
                <td>2024-05-25</td>
                <td>12345</td>
                <td>John Doe</td>
                <td>Medicine, Personal Care</td>
                <td>2</td>
                <td>$50.00</td>
                <td>
                    <a href="#"><ion-icon name="create"></ion-icon></a>
                    <a href="#"><ion-icon name="trash"></ion-icon></a>
                    <a href="#"><ion-icon name="download"></ion-icon></a>
                </td>
            </tr>
            <tr>
                <td>2024-05-25</td>
                <td>12345</td>
                <td>John Doe</td>
                <td>Medicine, Personal Care</td>
                <td>2</td>
                <td>$50.00</td>
                <td>
                    <a href="#"><ion-icon name="create"></ion-icon></a>
                    <a href="#"><ion-icon name="trash"></ion-icon></a>
                    <a href="#"><ion-icon name="download"></ion-icon></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
    </div>

    
 
</section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





</body>
</html>
