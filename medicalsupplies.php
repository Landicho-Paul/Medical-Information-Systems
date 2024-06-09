<?php
// Start the session
session_start();

        // Start the session


include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine</title>
    <link rel="stylesheet" href="css/med.css"> 
    <link rel="shortcut icon" href="images/mlog.jpg">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

   
</head>
<body>



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
 
        <div>
        <a class="btn-shopping-cart" id="sidebarToggle" role="button"  aria-controls="offcanvasExample" onclick="toggleCart()">
    <i class="fa fa-shopping-cart" id="cartIcon"></i>

</div>
        <div class="search" style="text-decoration: none;  ">
        <input class="srch" type="search" name="" placeholder="Search" id="medicineSearch">
        <button class="btnsearch" onclick="searchMedicine()">Search</button>
    </div>
</a> 
</div>
    
    
<div class="cartTab" id="cartTab">
    <h1>Shopping Cart</h1>
    <div class="listCart" id="listCart">
        <?php
        include('connect.php');
        $sql = "SELECT * FROM addtocart WHERE Checkout = ''";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="product">
                    <img src="'.$row['Image'].'" alt="'.$row['Name'].'">
                    <div class="info">
                        <div class="name">'.$row['Name'].'</div> 
                        
                    </div>
                    <div>
                        <div class="price">₱'.$row['Price'].'</div>
                    </div>
                    <div class="quantity">
                        <span onclick="changeQuantity(this, -1)">-</span>
                        <span>'.$row['Quantity'].'</span>
                        <span onclick="changeQuantity(this, 1)">+</span>
                    </div>
                    <div class="remove" onclick="removeFromCart('.$row['cart_id'].')">
                        <i class="uil uil-times-circle"></i>
                    </div>
                </div>';
            }
        } else {
            echo "<p>No items in the cart.</p>";
        }
        mysqli_close($conn);
        ?> 
    </div>


    
    <div class="btn-cls">
    <button class="close" id="closeCartBtn" style="font-size: 14px;">CLOSE</button>
    <button id="checkOutButton" class="checkOut" onclick="goToContactPage()">Check Out</button>

    </div>
</div>


<!--Cards-->
<div class="container" id="medicineContainer">

<div class="card">
    <img src="images/thermo.jpg" class="card-img-top" alt="Thermometer">
    <div class="card-body">
        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/thermo.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Omron Digital Thermometer MC-246" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="298" >
            </div>
            
            
        
            <h5 class="card-title">Omron Digital Thermometer MC-246</h5>
            <h3>Price: PHP 298.00</h3>
            <h3>In Stock :3</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thermoModal">
                More Info
            </button>
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">

           <!-- 
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button> 
            
            -->
        </form>
        
    </div>
</div>

<div class="modal fade" id="thermoModal" tabindex="-1" aria-labelledby="thermoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thermoModalLabel">Omron Digital Thermometer MC-246</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>MC-246 thermometer incorporates features that facilitate a memory capacity, with an auto measuring recall of the last reading and a buzzer alarm, that alerts you when the measurement has been completed. Safe and accurate measurement can be obtained within 60 seconds of operation.</p>
                <p><b>Features</b><br>MC-246 thermometer incorporates features that facilitate a memory capacity, with an auto measuring recall of the last reading and a buzzer alarm, that alerts you when the measurement has been completed. Safe and accurate measurement can be obtained within 60 seconds of operation.</p>
                <p><b>Product Usage</b><br>Omron electronic thermometer MC  246 helps in measuring body temperature by eliminating any broken glass or mercury hazards. You can easily switch between °C/°F and the device is also water resistant. Omron digital thermometer measures the temperature accurately.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/smask.jpg" class="card-img-top" alt="Surgical Mask">
    <div class="card-body">




        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/smask.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Healmed 3 Ply Surgical Face Mask - 10s" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="142" >
            </div>
            
           <!-- 
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button> 
            
            -->
            <h5 class="card-title">Healmed 3 Ply Surgical Face Mask - 10s</h5>
            <h3>Price: PHP 142.90</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#smaskModal">
                More Info
            </button>
            
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
    
        </form>
    </div>
</div>

<div class="modal fade" id="smaskModal" tabindex="-1" aria-labelledby="smaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smaskModalLabel">Healmed 3 Ply Surgical Face Mask - 10s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>Healmed surgical mask designed for use in healthcare environments. It is a type of facial personal protective equipment (PPE) commonly employed by nurses, surgeons, and other healthcare workers.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/3dmask.jpg" class="card-img-top" alt="3M Mask">
    <div class="card-body">





        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/3dmask.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="3M 9513 KN95 Adult Facemask" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="55" >
            </div>
            
            
        
            <h5 class="card-title">3M 9513 KN95 Adult Facemask</h5>
            <h3>Price: PHP 55.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#3dmaskModal">
                More Info
            </button>
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">

           <!-- 
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
            
            -->
        </form>





        
        
    </div>
</div>

<div class="modal fade" id="3dmaskModal" tabindex="-1" aria-labelledby="3dmaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="3dmaskModalLabel">3M 9513 KN95 Adult Facemask</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>The 3M™ Particulate Respirator 9513 is a maintenance-free, flat fold disposable respirator that is intended for use by consumers used in consumer applications (and other users where permitted by applicable regulations) to help reduce exposure to certain airborne particulate matter. The respirator is worn over the mouth and nose and attaches via elastic side bands with hook attachment behind the base of the head/top of the neck. When used as instructed, this respirator can help reduce inhalation exposure to certain types of non-oily airborne particles, such as dirt, dust, sand, vehicle exhaust particles, pollen, environmental air pollution, PM2.5 (fine particles), PM10 and other airborne particulate matter.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/bloodpressure.jpg" class="card-img-top" alt="bloodpressure">
    <div class="card-body">

        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/bloodpressure.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Omron HEM 7120 Automatic Blood Pressure Monitor" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="2780" >
            </div>
            
        
            <h5 class="card-title">Omron HEM 7120 Automatic Blood Pressure Monitor</h5>
            <h3>Price: PHP 2780.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bloodpressureModal">
                More Info
            </button>
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">

           <!-- 
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
            
            -->
        </form>



        
        
    </div>
</div>

<div class="modal fade" id="bloodpressureModal" tabindex="-1" aria-labelledby="bloodpressureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bloodpressureModalLabel">Omron HEM 7120 Automatic Blood Pressure Monitor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>The Omron HEM 7120 is a compact and easy-to-use blood pressure monitor that delivers precise measurements of blood pressure & pulse rate and quick results. Fits Arm Circumference (22-32cm) device uses IntelliSense technology for accurate measurements, with a comfortable and controlled inflation process.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <img src="images/pregnancytest.jpg" class="card-img-top" alt="/pregnancytest">
    <div class="card-body">




        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/pregnancytest.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Partners Pregnancy Test" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="72" >
            </div>
            
            
        
            <h5 class="card-title">Partners Pregnancy Test</h5>
            <h3>Price: PHP 72.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#/pregnancytestModal">
                More Info
            </button>
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">

           <!-- 
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
            
            -->
        </form>





        
        
    </div>
</div>

<div class="modal fade" id="/pregnancytestModal" tabindex="-1" aria-labelledby="/pregnancytestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="/pregnancytestModalLabel">Partners Pregnancy Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <p><b>Description</b><br>Partners is a rapid chromatographic immunoassay one-step urine pregnancy test that can qualitatively identify the presence of human Chorionic Gonadotropin (hCG), or the hormone produced by the placenta that is detected when you are pregnant, in human urine with a sensitivity of 25mlU/mL.</p>
            <p><b>Product Usage</b><br>
                <br>1. Lay the testing device on a flat surface.
                <br>2. Use the pipette to transfer 3 drops of your urine sample onto the window of the testing device.
                <br>3. Wait for each drop to be completely absorbed before adding the next one.
                <br>4. Observe the results in 1-3 minutes.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/nebulizer.jpg" class="card-img-top" alt="nebulizer">
    <div class="card-body">



        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/nebulizer.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Omron NE C801VVV Compressor Nebulizer" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="73" >
            </div>
            
            
        
            <h5 class="card-title">Omron NE C801VVV Compressor Nebulizer</h5>
            <h3>Price: PHP 73.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nebulizerModal">
                More Info
            </button>
            
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">

           <!-- 
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
            
            -->
        </form>




        
    </div>
</div>

<div class="modal fade" id="nebulizerModal" tabindex="-1" aria-labelledby="nebulizerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nebulizerModalLabel">Omron NE C801VVV Compressor Nebulizer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <p><b>Description</b><br>Omron NE C801VVV Compressor Nebulizer use to manage asthma, chronic bronchitis, allergies and other respiratory disorders on a daily basis. Silent operation ensures comfortable use.</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>
 function searchMedicine() {
    // Your search logic here
    console.log("Searching for medicine...");
}

// Add event listener for click event
document.getElementById("searchButton").addEventListener("click", searchMedicine);

// Add event listener for keypress event
document.getElementById("searchInput").addEventListener("keypress", function(event) {
    if (event.key === 'Enter') {
        searchMedicine();
    }
});
</script>

<script>
    function goToContactPage() {
            window.location.href = 'updateCart.php'; // Replace 'contact.html' with the actual URL of the contact page
        }
    function searchMedicine() {
        var input = document.getElementById("medicineSearch").value.toUpperCase();
        var cards = document.getElementsByClassName("card");

        for (var i = 0; i < cards.length; i++) {
            var title = cards[i].getElementsByClassName("card-title")[0].innerText.toUpperCase();

            if (title.includes(input)) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }

    function searchMedicineEnter(event) {
        if (event.keyCode === 13) {
            searchMedicine();
        }
    }
    
    document.getElementById("medicineSearch").addEventListener("input", function() {
        searchMedicine();
    });

    document.getElementById("medicineSearch").addEventListener("keydown", function(event) {
        searchMedicineEnter(event);
    });

</script>

<script>

<?php 

?>
  function toggleCart() {
        document.body.classList.toggle('showCart');
    }

    function changeQuantity(button, delta) {
        const quantityElement = button.parentElement.querySelector('span:nth-child(2)');
        let quantity = parseInt(quantityElement.innerText) + delta;
        if (quantity < 1) quantity = 1;
        quantityElement.innerText = quantity;

        // Update total price
        const priceElement = button.closest('.item').querySelector('.price');
        const pricePerUnit = parseFloat(priceElement.innerText.replace('$', ''));
        const totalPrice = quantity * pricePerUnit;
        priceElement.innerText = `$${totalPrice.toFixed(2)}`;
    }

    document.addEventListener('DOMContentLoaded', (event) => {
            const closeButton = document.getElementById('closeCartBtn');
            const cart = document.getElementById('cart');

            function toggleCart() {
                document.body.classList.toggle('showCart');
                if (document.body.classList.contains('showCart')) {
                    localStorage.setItem('cartState', 'open');
                } else {
                    localStorage.setItem('cartState', 'closed');
                }
            }

            closeButton.addEventListener('click', () => {
                toggleCart();
            });

            // Check the stored state in localStorage when the page loads
            if (localStorage.getItem('cartState') === 'open') {
                document.body.classList.add('showCart');
            }
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

 



<script>
    document.getElementById('checkOutButton').addEventListener('click', function() {
        // Assuming you have retrieved the medicine name and new stock value already
        var medicineName = "Omron Digital Thermometer MC-246"; // Adjust this based on how you're retrieving the medicine name
        var newStockValue = 2; // Adjust this based on how you're retrieving the new stock value

        // Create a new XMLHttpRequest object
        var xhttp = new XMLHttpRequest();

        // Define the PHP script URL that updates the database
        var url = "checkout.php";

        // Define the parameters to be sent with the AJAX request
        var params = "medicine_name=" + medicineName + "&new_stock=" + newStockValue;

        // Open a POST request to the PHP script URL
        xhttp.open("POST", url, true);

        // Set the Content-Type header for POST requests
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Define the callback function to handle the response from the server
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Handle the response from the server
                console.log(this.responseText); // For debugging purposes
                // You can update the UI or perform any other action based on the response here
            }
        };

        // Send the AJAX request with the parameters
        xhttp.send(params);
    });
</script>

<script>
function removeFromCart(cart_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "remove_from_cart.php?cart_id=" + cart_id, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle response here, like updating the cart display
            // For example, you can update the listCart div with the new cart contents
            document.getElementById("listCart").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>




<script>
function removeFromCart(cart_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "remove_from_cart.php?cart_id=" + cart_id, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Log the response for debugging
            // Attempt to remove the specific item from the cart display
            var cartItem = document.getElementById("listcart" + cart_id);
            if (cartItem !== null) {
                cartItem.remove();
            } else {
                console.error("Cart item with ID " + cart_id + " not found.");
            }
            // Auto-refresh the cart contents
            refreshCart();
        }
    };
    xhr.send();
}
function refreshCart() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "medicine.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("listCart").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>


    
</body>
</html>
        <?php
        // Start the session
        $_SESSION["error"] = "";
        ?>