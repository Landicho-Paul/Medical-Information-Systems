<?php

    require_once("connect.php");
    $query = " SELECT * FROM addtocart WHERE Checkout = 'Approve' ";
    $result = mysqli_query($conn,$query);

?>
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
                <th>Items</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
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
        <a href="#" class="delete-button" data-id="<?php echo $row['cart_id']; ?>"><ion-icon name="trash"></ion-icon></a>
    </td>
    <td>
    <a href="#" id="download-link"><ion-icon name="download"></ion-icon></a>
</td>
                </td>
                
            </tr>
            <?php 
                
                }
                
            ?>
    </table>
</div>
    </div>

    
 
</section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

<!--Delete row-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-button').click(function(e) {
            e.preventDefault();
            var cartId = $(this).data('id');
            if(confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    url: 'delete_cart_item.php',
                    type: 'POST',
                    data: {id: cartId},
                    success: function(response) {
                        // Reload the page or remove the row from the table
                        location.reload(); // Reload the page
                        //$(this).closest('tr').remove(); // Remove the row from the table
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>




</body>
</html>
