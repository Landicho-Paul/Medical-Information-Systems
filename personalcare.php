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
    <style>

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
.search {
    display: flex;
    align-items: center;
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

.listCart .item img {
    width: 100%;
}

.listCart .item {
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

.listCart .item:nth-child(even) {
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


.listCart .item {
    display: grid;
    grid-template-columns: 70px 150px 50px 1fr 30px; /* Added extra column for the remove item icon */
    gap: 10px;
    text-align: center;
    align-items: center;
    margin-right: 20px;
}


.listCart .item .uil-times-circle {
    cursor: pointer;
    font-size: 30px;
}

.listCart .item .uil-times-circle:hover {
    color: red; /* Change color on hover */
}




    </style>
</head>
<body>

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


    <div class="search">
        <input class="srch" type="search" name="" placeholder="Search" id="medicineSearch">
        <button class="btnsearch" style="margin-right: 10px;" onclick="searchMedicine()">Search</button>
    </div>

</div>


<!--Cards-->
<div class="container" id="medicineContainer">

<div class="card">
    <img src="images/cottonbuds.jpg" class="card-img-top" alt="Cotton Buds">
    <div class="card-body">
        <h5 class="card-title">Babyflo Gentle Cotton Buds Plastic Stems 108 Tips</h5>
        <h3>Price: PHP 20.50</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cottonBudsModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="cottonBudsModal" tabindex="-1" aria-labelledby="cottonBudsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cottonBudsModalLabel">Babyflo Gentle Cotton Buds Plastic Stems 108 Tips</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>Babyflo Gentle Buds is a trusted heritage brand that offers a range of high-quality cotton buds products at affordable prices.
                    <br>With smaller tips and stems versus regular cottom buds.
                    <br>With serrated stems for better grip.</p>
                    <p>Tips are made from 100% cotton and available in biodegradable paper stem.</p>
                    <p><b>Warning</b><br> Keep out of reach of children <br>For External Use Only</p>
                    <ul>
                        <li>Used to clean the ear canal by removing earwax.</li>
                        <li>With serrated plastic stems for better grip.</li>
                        <li>It comes in a resealable plastic pouch.</li>
                        <li>This can also be used for applying and removing makeup.</li>
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/cottonbuds72.jpg" class="card-img-top" alt="Cotton Buds">
    <div class="card-body">
        <h5 class="card-title">BABYFLO Gentle Buds 72's</h5>
        <h3>Price: PHP 20.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cottonBudsModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="cottonBudsModal" tabindex="-1" aria-labelledby="cottonBudsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cottonBudsModalLabel">BABYFLO Gentle Buds 72's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>Babyflo Gentle Buds is a trusted heritage brand that offers a range of high-quality cotton buds products at affordable prices.
                    <br>With smaller tips and stems versus regular cottom buds.
                    <br>With serrated stems for better grip.</p>
                    <p>Tips are made from 100% cotton and available in biodegradable paper stem.</p>
                    <p><b>Warning</b><br> Keep out of reach of children <br>For External Use Only</p>
                    <ul>
                        <li>Used to clean the ear canal by removing earwax.</li>
                        <li>With serrated plastic stems for better grip.</li>
                        <li>It comes in a resealable plastic pouch.</li>
                        <li>This can also be used for applying and removing makeup.</li>
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/cottonbuds200.jpg" class="card-img-top" alt="Cotton Buds">
    <div class="card-body">
        <h5 class="card-title">BABYFLO Gentle Buds 200's</h5>
        <h3>Price: PHP 40.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cottonBudsModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="cottonBudsModal" tabindex="-1" aria-labelledby="cottonBudsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cottonBudsModalLabel">BABYFLO Gentle Buds 200's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>Babyflo Gentle Buds is a trusted heritage brand that offers a range of high-quality cotton buds products at affordable prices.
                    <br>With smaller tips and stems versus regular cottom buds.
                    <br>With serrated stems for better grip.</p>
                    <p>Tips are made from 100% cotton and available in biodegradable paper stem.</p>
                    <p><b>Warning</b><br> Keep out of reach of children <br>For External Use Only</p>
                    <ul>
                        <li>Used to clean the ear canal by removing earwax.</li>
                        <li>With serrated plastic stems for better grip.</li>
                        <li>It comes in a resealable plastic pouch.</li>
                        <li>This can also be used for applying and removing makeup.</li>
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <div class="card">
        <img src="images/cottonballs.jpg" class="card-img-top" alt="Cotton Balls">
        <div class="card-body">
            <h5 class="card-title">Med Guard Cotton Balls 50s Pure Cotton</h5>
            <h3>Price: PHP 18.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Medguard50Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="Medguard50Modal" tabindex="-1" aria-labelledby="Medguard50ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Medguard50ModalLabel">Med Guard Cotton Balls 50s Pure Cotton</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b><br>Medguard pure cotton 50 balls for baby, medical, home and makeup use. <br>  50 Cotton Balls</p>
                    <p><b>Product Usage</b><br> Pull out cotton for cleaning and hygienic purposes.
                        <br>Great for Baby, Beauty and Home Use</p>
                        <p><b>Warning</b><br> Keep out of reach of children <br>For External Use Only</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/cottonballs25.jpg" class="card-img-top" alt="Cotton Balls">
        <div class="card-body">
            <h5 class="card-title">Med Guard Cotton Balls 25g Pure Cotton</h5>
            <h3>Price: PHP 14.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Medguard25Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="Medguard25Modal" tabindex="-1" aria-labelledby="Medguard25ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Medguard25ModalLabel">Med Guard Cotton Balls 25g Pure Cotton</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b>Medguard pure cotton 25g for baby, medical, home and makeup use.</p>
                    <p><b>Product Usage</b><br> Pull out cotton for cleaning and hygienic purposes.
                        <br>Great for Baby, Beauty and Home Use</p>
                        <p><b>Warning</b><br> Keep out of reach of children <br>For External Use Only</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/cottonballs50g.jpg" class="card-img-top" alt="Cotton Balls">
        <div class="card-body">
            <h5 class="card-title">Med Guard Cotton Balls 50g Pure Cotton</h5>
            <h3>Price: PHP 29.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Medguard50gModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="Medguard50gModal" tabindex="-1" aria-labelledby="Medguard50gModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Medguard50gModalLabel">Med Guard Cotton Balls 50g Pure Cotton</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b>Medguard pure cotton 50g for baby, medical, home and makeup use.</p>
                    <p><b>Product Usage</b><br> Pull out cotton for cleaning and hygienic purposes.
                        <br>Great for Baby, Beauty and Home Use</p>
                        <p><b>Warning</b><br> Keep out of reach of children <br>For External Use Only</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    

    <div class="card">
        <img src="images/babywipes.jpg" class="card-img-top" alt="BabyWipes">
        <div class="card-body">
            <h5 class="card-title">Giggle Baby Wipes Unscented 80s </h5>
            <h3>Price: PHP 109.00</h3>
            <h3>Unavailable</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#babywipes80Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="babywipes80Modal" tabindex="-1" aria-labelledby="babywipes80ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="babywipes80ModalLabel">Giggle Baby Wipes Unscented 80s</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                p><b>Description</b><br>-Silky soft and extra thick like a soft wash cloth.
                        <br>-alcohol-free
                        <br>-Gently formulated to clean and moisturize baby',s delicate skin
                        <br>-Gentle enough to clean baby',s face and hands
                        <br>-No irritating for skin and eyes
                        <br>-Passed with oral urgent toxic testing</p>
                    <p><b>Product Usage</b><br> Conveniently and compactly packaged for travel and home use
                            <br>Ideal for baby's daily skin care.</p>
                        <p><b>Warning</b><br>For External Use Only</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/babywipes10.jpg" class="card-img-top" alt="BabyWipes">
        <div class="card-body">
            <h5 class="card-title">Giggle Baby Wipes Unscented 10s </h5>
            <h3>Price: PHP 109.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#babywipes10Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="babywipes10Modal" tabindex="-1" aria-labelledby="babywipes10ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="babywipes10ModalLabel">Giggle Baby Wipes Unscented 10s</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>-Silky soft and extra thick like a soft wash cloth.
                        <br>-alcohol-free
                        <br>-Gently formulated to clean and moisturize baby',s delicate skin
                        <br>-Gentle enough to clean baby',s face and hands
                        <br>-No irritating for skin and eyes
                        <br>-Passed with oral urgent toxic testing</p>
                    <p><b>Product Usage</b><br> Conveniently and compactly packaged for travel and home use
                            <br>Ideal for baby's daily skin care.</p>
                        <p><b>Warning</b><br>For External Use Only</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/off.jpg" class="card-img-top" alt="OFF Lotion">
        <div class="card-body">
            <h5 class="card-title">OFF Overtime Insect Repellent Lotion 100ml </h5>
            <h3>Price: PHP 212.75</h3>
            <h3>In Stock </h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#offModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="offModal" tabindex="-1" aria-labelledby="offModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="offModalLabel">OFF Overtime Insect Repellent Lotion 100ml</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b><br>Provides up to 8-hours of continuous protection from dengue-carrying mosquitoes.
                        <br>DermCool formula feels cool and light on your skin; perfect for daily use.
                        <br>The refreshing scent will leave you rejuvenated all day.
                        <br>Dermatologically tested to be easy on the skin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/offkids.jpg" class="card-img-top" alt="OFF Lotion Kids">
        <div class="card-body">
            <h5 class="card-title">OFF Lotion Kids 100ml </h5>
            <h3>Price: PHP 193.00</h3>
            <h3>In Stock </h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#offkidsModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="offkidsModal" tabindex="-1" aria-labelledby="offkidsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="offkidsModalLabel">OFF Lotion Kids 100ml</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b><br>Provides up to 8-hours of continuous protection from dengue-carrying mosquitoes.
                        <br>DermCool formula feels cool and light on your skin; perfect for daily use.
                        <br>The refreshing scent will leave you rejuvenated all day.
                        <br>Dermatologically tested to be easy on the skin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/offkids.jpg" class="card-img-top" alt="OFF Lotion Kids 50">
        <div class="card-body">
            <h5 class="card-title">OFF Lotion Kids 50ml </h5>
            <h3>Price: PHP 127.75</h3>
            <h3>In Stock </h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#offkids50Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="offkids50Modal" tabindex="-1" aria-labelledby="offkids50ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="offkids50ModalLabel">OFF Lotion Kids 50ml</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b><br>Provides up to 8-hours of continuous protection from dengue-carrying mosquitoes.
                        <br>DermCool formula feels cool and light on your skin; perfect for daily use.
                        <br>The refreshing scent will leave you rejuvenated all day.
                        <br>Dermatologically tested to be easy on the skin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <img src="images/off50.jpg" class="card-img-top" alt="OFF 50">
        <div class="card-body">
            <h5 class="card-title">OFF Over Time Insect Repellant 50ml </h5>
            <h3>Price: PHP 141.75</h3>
            <h3>In Stock </h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#off50Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="off50Modal" tabindex="-1" aria-labelledby="off50ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="off50ModalLabel">OFF Over Time Insect Repellant 50ml</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b><br>Provides up to 8-hours of continuous protection from dengue-carrying mosquitoes.
                        <br>DermCool formula feels cool and light on your skin; perfect for daily use.
                        <br>The refreshing scent will leave you rejuvenated all day.
                        <br>Dermatologically tested to be easy on the skin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/colgate.png" class="card-img-top" alt="Colgate">
        <div class="card-body">
            <h5 class="card-title">Colgate® Maximum Cavity Protection Great Regular Flavor Anti-Cavity Family Toothpaste 214g </h5>
            <h3>Price: PHP 183.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#colgateModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="colgateModal" tabindex="-1" aria-labelledby="colgateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="colgateModalLabel">Colgate® Maximum Cavity Protection Great Regular Flavor Anti-Cavity Family Toothpaste 214g</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b> <br>With calcium and active fluoride formula clinically proven to strengthen teeth and repair weak spots in the enamel. Great Mint taste that freshens breath Comes in white paste Great Regular Flavor Toothpaste Brand Most Recommended by Dentists <br>
                Colgate Maximum Cavity Protection Toothpaste, adds natural calcium^ to your family’s teeth, keeping their smiles strong from within.
                        <br>- Strengthens teeth from within
                        <br>- Helps add natural calcium^ 
                        <br>- Complete all around cavity protection
                        <br>- Germ protection~
                        <br>- Cleaner, whiter teeth~
                        <br>- Fresher breath~
                        <br>- Plaque removal~
                        <br>- Healthy gums~</p>
                <p><b>Product Usage</b><br> How to Use Brush your teeth with Colgate after every meal at least two times a day or as directed by a dentist or doctor. Brush thoroughly. Do not swallow. Spit out and rinse after use. Children 26 years old Use a peasized amount under supervised brushing to minimize swallowing. Use by children under 2 years should be upon the advice of a dentist or doctor. In case of intake of fluoride form other sources consult a dentist or doctor.</p>
                    <p><b>Ingredients</b><br> Dicalcium Phosphate Dihydrate, Water, Sorbitol, Sodium Lauryl Sulfate, Cellulose Gum, Flavor, Sodium Monofluorophosphate, Sodium Saccharin, Tetrasodium Pyrophosphate, Sodium Fluoride</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
    <img src="images/sensodyne.jpg" class="card-img-top" alt="Sensodyne Freshmint Toothpaste 100g">
    <div class="card-body">
        <h5 class="card-title">SENSODYNE Freshmint Toothpaste 100g</h5>
        <h3>Price: PHP 114.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sensodyneModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="sensodyneModal" tabindex="-1" aria-labelledby="sensodyneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sensodyneModalLabel">SENSODYNE Freshmint Toothpaste 100g</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>
                Clinically proven relief and daily protection for sensitive teeth. Its advanced formula builds 24/7 protection against tooth sensitivity. It removes plaque with regular brushing and contains fluoride to prevent tooth decay. Its minty taste keeps the mouth feeling clean and fresh.</p>
                <p><b>Product Usage</b><br>
                Brush twice a day and not more than three times. Minimize swallowing and spit out. Sensitive teeth may indicate an underlying problem that needs prompt care by a dentist. If symptoms persist, see your dentist. If irritation occurs, discontinue use.</p>
                <p><b>Ingredients</b><br>
                Potassium Nitrate</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





    <div class="card">
        <img src="images/toothbrush.png" class="card-img-top" alt="toothbrush">
        <div class="card-body">
            <h5 class="card-title">Colgate Classic Toothbrush - 2s</h5>
            <h3>Price: PHP 38.50</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#toothbrushModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="toothbrushModal" tabindex="-1" aria-labelledby="toothbrushModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="toothbrushModalLabel">Colgate Classic Toothbrush - 2st</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>
                The Colgate Classic Adult 2's + Classic Kids 2's pack is the perfect duo for families. Made with soft bristles that are gentle on kids' delicate teeth and gums as well as for adults. Contains 2 pieces of toothbrush for Adults</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/toothbrush1.jpg" class="card-img-top" alt="toothbrush">
        <div class="card-body">
            <h5 class="card-title">Dental B Basic Hard Bristles Toothbrush</h5>
            <h3>Price: PHP 52.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#toothbrush1Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="toothbrush1Modal" tabindex="-1" aria-labelledby="toothbrush1ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="toothbrush1ModalLabel">Dental B Basic Hard Bristles Toothbrush</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>
                    <br>For heavy-duty brushing.
                    <br>Adult hard for heavy-duty brushing.
                    <br>With a cover to protect the bristles from dirt, insects, and bathroom germs.
                    <br>Dentists recommend replacing your brush every 3 months or sooner if bristles are worn.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/safeguard.jpg" class="card-img-top" alt="safeguard">
        <div class="card-body">
            <h5 class="card-title" style="margin-top: 90px;">Safeguard Pure White Bar Soap 175g</h5>
            <h3>Price: PHP 58.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#safeguardModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="safeguardModal" tabindex="-1" aria-labelledby="safeguardModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="safeguardModalLabel">Safeguard Pure White Bar Soap 175g</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>Wash frequently with Safeguard for germ protection for the whole family. Safeguard removes 99.9 of germs and reduces the regrowth of 3 types of germs in between baths 1. Skin infection and body odorcausing bacteria 2. Common diseasecausing bacteria 3. Fungi Based on lab test among representative germs Malassezia and Trichophyton</p>
                <p><b>Product Usage</b><br>Wet face and body. Work up a lather with hands or washcloth and spread evenly over the face and body. <br>Rinse thoroughly. Gently pat dry with a clean towel.</p>
                <p><b>Warning</b><br>Avoid contact with eyes. In case of contact with the eyes</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    

    <div class="card">
        <img src="images/safeguard60.jpg" class="card-img-top" alt="safeguard60">
        <div class="card-body">
            <h5 class="card-title" style="margin-top: 90px;">Safeguard Pure White Bar Soap 60g</h5>
            <h3>Price: PHP 29.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#safeguard60Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="safeguard60Modal" tabindex="-1" aria-labelledby="safeguard60ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="safeguard60ModalLabel">Safeguard Pure White Bar Soap 60g</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>Wash frequently with Safeguard for germ protection for the whole family. Safeguard removes 99.9 of germs and reduces the regrowth of 3 types of germs in between baths 1. Skin infection and body odorcausing bacteria 2. Common diseasecausing bacteria 3. Fungi Based on lab test among representative germs Malassezia and Trichophyton</p>
                <p><b>Product Usage</b><br>Wet face and body. Work up a lather with hands or washcloth and spread evenly over the face and body. <br>Rinse thoroughly. Gently pat dry with a clean towel.</p>
                <p><b>Warning</b><br>Avoid contact with eyes. In case of contact with the eyes</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/safeguardlf.jpg" class="card-img-top" alt="safeguardlf">
        <div class="card-body">
            <h5 class="card-title" style="margin-top: 90px;">SAFEGUARD Lemon Fresh 130g</h5>
            <h3>Price: PHP 58.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#safeguardlfModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="safeguardlfModal" tabindex="-1" aria-labelledby="safeguardlfModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="safeguardlfModalLabel">SAFEGUARD Lemon Fresh 130g</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>Safeguard Lemon Fresh is germ protection for the whole family. It removes 99.9% of germs and reduces the re-growth of 3 types of germs* in between baths: 1. Skin infection and body odor-causing bacteria 2. Common disease-causing bacteria 3. Fungi.</p>
                <p><b>Product Usage</b><br>Wet face and body. Work up a lather with hands or washcloth and spread evenly over the face and body. <br>Rinse thoroughly. Gently pat dry with a clean towel.</p>
                <p><b>Ingredients</b><br>Sodium Palmate, Tapioca Starch, Water, Sodium Palm Kernelate, Glycerin, Fragrance, Talc, Palm Kernel Acid, Sodium Chloride, Zinc Pyrithione, Titanium Dioxide, Tetrasodium Etidronate, Zinc Sulfate, Pentaerythrityl Tetra-Di-T-Butyl Hydroxyhydrocinnamate, Citric Acid, CI 47005 CI 15510</p>
                <p><b>Warning</b><br>Avoid contact with eyes. In case of contact with the eyes</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/safeguardfg.jpg" class="card-img-top" alt="safeguardlf">
        <div class="card-body">
            <h5 class="card-title" style="margin-top: 90px;">SAFEGUARD Lemon Fresh 130g</h5>
            <h3>Price: PHP 58.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#safeguardfgModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="safeguardfgModal" tabindex="-1" aria-labelledby="safeguardfgModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="safeguardfgModalLabel">SAFEGUARD Lemon Fresh 130g</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>Wash frequently with Safeguard for germ protection for the whole family.<br>
                    Safeguard removes 99.9% of germs and reduces the re-growth of 3 types of germs^ in between baths.
                    <ul>
                    <li>Skin infection and body odor-causing bacteria</li>
                    <li>Common disease-causing bacteria</li>
                    <li>Fungi^^</li>
                    </ul>
                    Excellent skin germ protection to help promote your familys health<br>
                    Safeguard has been proven effective in removing skin germs that may cause skin infection, pimple infection and perspiration odor. Safeguard is the only soap recommended by the Philippine Association of Medical Technologists (PAMET).</p>
                <p><b>Product Usage</b><br>Wet face and body. Work up a lather with hands or washcloth and spread evenly over the face and body. <br>Rinse thoroughly. Gently pat dry with a clean towel.</p>
                <p><b>Ingredients</b><br>Sodium Palmate, Tapioca Starch, Water, Sodium Palm Kernelate, Glycerin, Fragrance, Palm Kernel Acid, Sodium Chloride, Talc, Titanium Dioxide, Zinc Pyrithione, Tetrasodium Etidronate, Zinc Sulfate, Pentaerythrityl Tetra-Di-T-Butyl Hydroxyhydrocinnamate, Citric Acid, Eucalyptus Globulus Leaf Extract, CI 47005, CI 42053</p>
                <p><b>Warning</b><br>Avoid contact with eyes. In case of contact with the eyes</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="images/dove.jpg" class="card-img-top" alt="dove">
        <div class="card-body">
            <h5 class="card-title" style="margin-top: 90px;">Dove Bar White 135g</h5>
            <h3>Price: PHP 87.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doveModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="doveModal" tabindex="-1" aria-labelledby="doveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="doveModalLabel">Dove Bar White 135g</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><b>Description</b><br>Dove White Beauty Bar This gentle cleansing formula contains ¬ moisturizing cream to give you softer, smoother, and more glowing skin.
                <b>Benefits:</b>
                    <br>-Classic moisturizing formula that cleanses and moisturizes at the same time
                    <br>-Dove doesn?t dry skin as ordinary soaps can
                    <br>-Has moisturizing cream and mild cleansers help retain skin?s moisture
                    <br>-Leaves skin softer, smoother and healthier-looking
                    <br>-Suitable for daily use on face, body, and hands
                    <br>-It?s not a soap ? it?s a beauty bar
                    <br>-Help your skin to retain its natural moisture rather than stripping it away.
                    <br>-Helps to replenish nutrients that are lost during the cleansing process</p>
                <p><b>Product Usage</b><br> <b>Directions</b>
                    <br>-Wet your hands and then rub the Dove White Beauty Bar gently between them until the bar lathers up.
                    <br>-Massage the lather over your face or body before rinsing with warm water.</p>
                <p><b>Ingredients</b><br>Sodium Lauroyl Isethionate, Stearic Acid, Lauric Acid, Sodium Palmitate, Water, Sodium Isethionate, Sodium Stearate, Cocamidopropyl Betaine, Sodium Palm Kernelate, Glycerin, Perfume, Sodium Chloride, Zinc Oxide, Tetrasodium EDTA, Tetrasodium Etidronate, Alpha-Isomethyl Ionone, Citronellol, Coumarin, Hexyl Cinnamal, Limonene, Linalool, CI 77891</p>
                <p><b>Warning</b><br>Avoid contact with eyes. In case of contact with the eyes</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="images/nivea.jpg" class="card-img-top" alt="nivea">
        <div class="card-body">
            <h5 class="card-title">NIVEA Men 48h Cool Kick Anti Perspirant 25ml</h5>
            <h3>Price: PHP 91.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#niveaModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="niveaModal" tabindex="-1" aria-labelledby="niveaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="niveaModalLabel">NIVEA Men 48h Cool Kick Anti Perspirant 25ml</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Description</b><br>NIVEA MEN Deodorant Cool Kick Roll On instantly gives you -10°C icy cool feeling and 48-hour sweat and odor protection. Together with its Cool Active Fresh scent, using this will leave you smelling fresh and feeling icy cool all day. This anti-perspirant cares for your skin - skin tolerance dermatologically-proven.</p>
                    <p><b>Ingredients</b><br>Aqua, Alcohol Denat., Aluminum Chlorohydrate, PEG-8, PEG-40 Hydrogenated Castor Oil, Parfum, Hydroxyethylcellulose, Octyldodecanol, Citric Acid</p>
                    <p><b>Warning</b><br>Do not apply to irritated and damaged skin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<div class="card">
    <img src="images/dovero.jpg" class="card-img-top" alt="Dove Roll On">
    <div class="card-body">
        <h5 class="card-title">Dove Deodorant Roll-On Original 40ML</h5>
        <h3>Price: PHP 91.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doveroModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="doveroModal" tabindex="-1" aria-labelledby="doveroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="doveroModalLabel">Dove Deodorant Roll-On Original 40ML</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>Dove Deodorant Roll-On Original provides 48-hour protection against sweat and odor while caring for your skin. The alcohol-free formula is gentle on your skin, leaving it soft and smooth.</p>
                <p><b>Ingredients</b><br>Aqua, Aluminum Chlorohydrate, Helianthus Annuus Seed Oil, Steareth-2, Steareth-20, Parfum, Disodium EDTA, Pentaerythrityl Tetra-di-t-butyl Hydroxyhydrocinnamate.</p>
                <p><b>Warning</b><br>Do not apply to irritated or damaged skin. If rash or irritation occurs, discontinue use.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/diaper.jpg" class="card-img-top" alt="Diaper">
    <div class="card-body">
        <h5 class="card-title">Pampers Baby Dry Pants Value Small 40s</h5>
        <h3>Price: PHP 517.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DiaperModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart(this)">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="DiaperModal" tabindex="-1" aria-labelledby="DiaperModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DiaperModalLabel">Pampers Baby Dry Pants Value Small 40s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Description</b><br>Pampers Baby Dry Pants offer up to 12 hours of dryness and comfort. The pants are designed with a flexible waistband that adapts to the baby's movements, providing a snug and comfortable fit. The extra absorb channels distribute wetness evenly, keeping your baby dry throughout the night.</p>
                <p><b>Features</b><br>Ultra Absorb Core, Breathable Materials, All-around stretchy waistband, Easy to pull on and take off.</p>
                <p><b>Size</b><br>Small (For babies 4-8 kg)</p>
            </div>
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

    // Append the new item to the cartTab
    cartTab.appendChild(newItem);

    // Show the cartTab
    document.body.classList.add('showCart');
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