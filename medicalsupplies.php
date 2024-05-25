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
    <link rel="stylesheet" href="css/styles.css"> 
    <link rel="shortcut icon" href="images/mlog.jpg">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <style>

.logo {
    font-size: 30px;
    font-weight: bold;
    color: #FFA500;
    font-family: "Oswald", sans-serif;
    margin-bottom: 100px;
}
.menu {
    flex-grow: 1;
    display: flex;
    justify-content: center;
    margin-bottom: 100px;
}
.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.card {
    width: calc(33.33% - 70px);
    margin: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.card-body {
    padding: 13px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center; 
}
.card h5, .card h3 {
    margin: 0;
    padding: 0;
    text-align: center;
    width: 100%;
    font-weight: bold;
    margin-top: 10px;
}

.card h5 {
    font-size: 20px; 
    margin-bottom: 10px;
}

.card h3 {
    font-size: 18px; 
    margin-bottom: 10px;
    font-family: 'Times New Roman', Times, serif;
}
.card-img-top {
    width: 100%;
    height: auto;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
@media (max-width: 768px) {
    .card {
        width: calc(50% - 20px);
    }
}
.search-container {
    display: flex;
    align-items: center;
}

.search {
    display: flex;
    align-items: center;
    margin-bottom: 100px;
    flex: 1; /* Allow the search container to grow */
}

.srch {
    flex: 1;
    padding: 5px 10px;
}
.btnsearch {
    padding: 5px 10px;
    cursor: pointer;
    background-color: #ff7200;
    color: #fff;
    border: none;
    border-radius: 4px;
    margin-left: 10px;
}

.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 200%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-body {
    max-height: 560px;
    overflow-y: auto;
}
.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    border-radius: 10px;
    max-width: 500px;
}

.btn{
    margin-top: 30px;
    background-color: #ff7200;
    color: #fff;
    padding: 5px 10px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    outline: none; 
    font-size: 18px;
}


.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}   

p {
    line-height: 1.5;
    margin-bottom: 15px;
}


img {
    max-width: 100%;
    height: auto;
    display: block;
    margin-top: 15px;
    cursor: pointer;
}

.add-to-cart-btn {
    background-color: #52595D;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 50px;
    font-size: 16px;
    margin-left: 10px; /* Add margin between search and add to cart button */
    margin-bottom: 30px;
    font-family: "Oswald", sans-serif;
}

.fa-cart-cart{
  font-size: 24px; /* Adjust size as needed */
  background-color: #007bff; /* Example background color */
  color: #ffffff; /* Example text color */
  border: none;
  border-radius: 50%; /* To make it circular */
  padding: 10px; /* Adjust padding as needed */
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.fa-cart-shopping img {
  width: 24px; /* Adjust the width as needed */
  height: 24px; /* Adjust the height as needed */
  margin-right: 5px; /* Adjust the spacing between the icon and the image */
}


.cartTab {
    width: 600px;
    background-color: #353432;
    color: #eee;
    position: fixed;
    top: 0;
    right: -600px; /* initially hidden */
    bottom: 0;
    display: grid;
    grid-template-rows: 70px 1fr 70px;
    transition: .5s;
    z-index: 999; /* Ensure it's above other content */
}

body.showCart .cartTab {
    right: 0; /* Slide in when body has showCart class */
}

.cartTab h1 {
    padding: 20px;
    margin: 0;
    font-weight: 300;
}

.cartTab .btn {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
}

.cartTab button {
    background-color: #E8BC0E;
    border: none;
    font-family: Poppins;
    font-weight: 500;
    cursor: pointer;
}

.cartTab .close {
    background-color: #eee;
}

.listCart  img {
    width: 100%;
}

.listCart  {
    display: grid;
    grid-template-columns: 70px 150px 50px 1fr;
    gap: 10px;
    text-align: center;
    align-items: center;
}

.listCart .quantity span {
    display: inline-block;
    width: 25px;
    height: 25px;
    background-color: #eee;
    border-radius: 50%;
    color: #555;
    cursor: pointer;
}

.listCart .quantity span:nth-child(2) {
    background-color: transparent;
    color: #eee;
    cursor: auto;
    font-family: "Oswald", sans-serif;
}

.listCart :nth-child(even) {
    background-color: #eee1;
}

.listCart {
    overflow: auto;
}

.listCart::-webkit-scrollbar {
    width: 0;
}

/* Ensure the cart tab is displayed on top of other content */
.cartTab.show {
    display: block;
    z-index: 999;
}


.listCart  {
    display: grid;
    grid-template-columns: 70px 150px 50px 1fr 30px; /* Added extra column for the remove item icon */
    gap: 10px;
    text-align: center;
    align-items: center;
    margin-right: 20px;
}


.listCart .uil-times-circle {
    cursor: pointer;
    font-size: 10px;
}

.listCart  .uil-times-circle:hover {
    color: green; /* Change color on hover */
}
.alert {
  padding: 20px;
  background-color: green;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
    </style>
</head>
<body>
<?php
try {
	echo $_SESSION["error"];
} catch (Exception $ex) {
	
}

?>
<div class="navbar">
    <div class="icon">
        <a href="index.php" class="logo" style="text-decoration: none;">MCIS</a>
    </div>

        <div class="menu">
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

        

        <a class="btn" style="margin-bottom: 110px; color: orange;" id="sidebarToggle" role="button" aria-controls="offcanvasExample" onclick="toggleCart()">
    <i class="fa fa-shopping-cart" id="cartIcon"></i>
        
</a> 


    <div class="search">
        <input class="srch" type="search" name="" placeholder="Search" id="medicineSearch">
        <button class="btnsearch" style="margin-right: 10px;" onclick="searchMedicine()">Search</button>
    </div>
    
    <div class="cartTab" id="cartTab">
    <h1>Shopping Cart</h1>
    <div class="listCart">
        
    <?php
            $sql =  "SELECT * FROM addtocart WHERE Checkout = ''";
            $result = mysqli_query($conn, $sql);
            $datas = array();
            if(mysqli_num_rows($result) > 0 ){
              while($row =mysqli_fetch_assoc($result)){
                  $datas[] = $row;
              }
            }
            
            foreach($datas as $data){
              
              
            echo '

            <img src="'.$data['Image'].'" alt="'.$data['Name'].'">
            <div>'.$data['Name'].'</div> 
            <div class="price">'.$data['Price'].'</div>
            <div class="quantity">
                <span onclick="changeQuantity(this, -1)">-</span>
                <span>'.$data['Quantity'].'</span>
                <span onclick="changeQuantity(this, 1)">+</span>
            </div>
            <span class="uil uil-times-circle" onclick="removeItem(this)"></span>
                
                ';
            }

          ?>
    </div>
    <div class="btn">
        <button class="close" style="font-size: 14px;">CLOSE</button>
        <button class="checkOut" onclick="goToContactPage()">Check Out</button>
    </div>
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
            <h3>In Stock</h3>
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
// Add a Medicine in shopping cart
function addToCart(button) {
    const card = button.closest('.card');
    const title = card.querySelector('.card-title').innerText;
    const price = card.querySelector('h3').innerText.replace('Price: ', '');
    const imgSrc = card.querySelector('.card-img-top').src;

    const cartTab = document.querySelector('.listCart');

    // Create a new item element
    const newItem = document.createElement('div');
    newItem.classList.add('item');
    newItem.setAttribute('data-title', title);
    newItem.innerHTML = `

        <img src="${imgSrc}" alt="${title}">
        <div>${title}</div> 
        <div class="price">${price}</div>
        <div class="quantity">
            <span onclick="changeQuantity(this, -1)">-</span>
            <span>1</span>
            <span onclick="changeQuantity(this, 1)">+</span>
        </div>
        <span class="uil uil-times-circle" onclick="removeItem(this)"></span>
    `;
    const data = imgSrc;
    
    console.log(data);

    // Append the new item to the cartTab
    cartTab.appendChild(newItem);

    // Show the cartTab
    document.body.classList.add('showCart');
}
<?php 

?>
function toggleCart() {
    document.body.classList.toggle('showCart');
}

function removeItem(button) {
    const item = button.closest('.item');
    item.remove();
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

    </script>



</body>
</html>
        <?php
        // Start the session
        $_SESSION["error"] = "";
        ?>