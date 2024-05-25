<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch medicine name, price, and stock data from the database
$sql = "SELECT medicine_name, price, stock FROM medicine";
$result = $conn->query($sql);

$medicineData = array();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reduceStock"])) {
    $response = array(); // Initialize an empty array to hold the response

    $medicineName = sanitizeInput($_POST["medicineName"]);
    $quantity = sanitizeInput($_POST["quantity"]);

    // Check if the quantity to reduce is valid
    $sql_check_quantity = "SELECT stock FROM medicine WHERE medicine_name = '$medicineName'";
    $result_check_quantity = $conn->query($sql_check_quantity);
    if ($result_check_quantity->num_rows > 0) {
        $row = $result_check_quantity->fetch_assoc();
        $currentStock = $row["stock"];
        if ($quantity <= $currentStock) {
            // Update stock in database
            $sql_reduce_stock = "UPDATE medicine SET stock = stock - $quantity WHERE medicine_name = '$medicineName'";
            if ($conn->query($sql_reduce_stock) === TRUE) {
                $response["success"] = true;
                $response["message"] = "Stock reduced successfully";
            } else {
                $response["success"] = false;
                $response["message"] = "Error reducing stock: " . $conn->error;
            }
        } else {
            $response["success"] = false;
            $response["message"] = "Error: Quantity to reduce exceeds current stock";
        }
    } else {
        $response["success"] = false;
        $response["message"] = "Error: Medicine not found";
    }

    


}




if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $medicineData[] = $row;
    }
}

// Close the database connection
$conn->close();

// Pass medicineData to JavaScript
echo "<script>var medicineData = " . json_encode($medicineData) . ";</script>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Dashboard</title>
    <link rel="shortcut icon" href="images/mlog.jpg">
    <style>
        .boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        .card {
            flex: 0 1 calc(25% - 20px);
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 500px;
        }
        .card img {
            width: 290px;
            height: 290px;
            margin-left: 27px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .card-info {
            padding: 10px;
        }
        .card-info h2 {
            margin-top: 0;
            font-size: 18px;
        }
        .card-info p {
            margin: 5px 0;
            font-size: 18px;
        }
        .card-info p:last-child {
            color: green;
        }
        .title {
            margin-bottom: 20px;
        }
        /* Centering the modal */
        .modal-dialog {
            margin: 10% auto;
        }
        .modal-content {
            margin: 0 auto;
        }
    </style>
</head>
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

    <?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    // Perform necessary sanitization
    return $data;
}

// Handle form submission for adding medicine
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addStock"])) {
    $medicineName = sanitizeInput($_POST["medicineName"]);
    $quantity = sanitizeInput($_POST["quantity"]);

    // Update stock in database
    $sql = "UPDATE medicine SET stock = stock + $quantity WHERE medicine_name = '$medicineName'";

    if ($conn->query($sql) === TRUE) {
        echo "Stock added successfully";
    } else {
        echo "Error updating stock: " . $conn->error;
    }
}

// Handle form submission for changing price
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["changePrice"])) {
    $medicineName = sanitizeInput($_POST["medicineName"]);
    $newPrice = sanitizeInput($_POST["newPrice"]);

    // Update price in database
    $sql = "UPDATE medicine SET price = '$newPrice' WHERE medicine_name = '$medicineName'";

    if ($conn->query($sql) === TRUE) {
        echo "Price changed successfully";
    } else {
        echo "Error changing price: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <img src="images/storm.jfif" alt="stormtropper">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                    <button id="openAddStockModalBtn" class="btn btn-success" style="position: absolute; top: 130px; right: 410px; transform: translateY(-50%); padding: 6px 12px; font-size: 12px;">Add Stock</button>
<button id="openReduceModalBtn" class="btn btn-danger" style="position: absolute; top: 130px; right: 285px; transform: translateY(-50%); padding: 6px 12px; font-size: 12px;">Reduce Stock</button>
<button id="openRemoveModalBtn" class="btn btn-danger" style="position: absolute; top: 130px; right: 20px; transform: translateY(-50%); padding: 6px 12px; font-size: 12px;">Remove Medicine</button>
<button id="openAddModalBtn" class="btn btn-success" style="position: absolute; top: 130px; right: 164px; transform: translateY(-50%); padding: 6px 12px; font-size: 12px;  ">Add Medicine</button>


                </div>
                <div class="modal fade" id="addMedicineModal" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addMedicineModalLabel">Add Medicine</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="medicineNameInput">Medicine Name:</label>
                                    <input type="text" class="form-control" id="medicineNameInput" placeholder="Medicine Name">
                                </div>
                                <div class="form-group">
                                    <label for="medicinePriceInput">Price:</label>
                                    <input type="text" class="form-control" id="medicinePriceInput" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label for="medicineStockInput">Stock:</label>
                                    <input type="text" class="form-control" id="medicineStockInput" placeholder="Stock">
                                </div>
                                <div class="form-group">
                                    <label for="medicineImageInput">Image:</label>
                                    <input type="file" class="form-control" id="medicineImageInput" accept="image/*">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveMedicineBtn">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="removeMedicineModal" tabindex="-1" aria-labelledby="removeMedicineModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="removeMedicineModalLabel">Remove Medicine</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="removeMedicineNameInput">Medicine Name:</label>
                                    <input type="text" class="form-control" id="removeMedicineNameInput" placeholder="Medicine Name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="confirmRemoveBtn">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addStockModalLabel">Add Stock</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group">
                                        <label for="addStockMedicineNameInput">Medicine Name:</label>
                                        <input type="text" class="form-control" id="addStockMedicineNameInput" name="medicineName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addStockQuantityInput">Quantity to Add:</label>
                                        <input type="number" class="form-control" id="addStockQuantityInput" name="quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addStockPriceInput">Price:</label>
                                        <input type="number" step="0.01" class="form-control" id="addStockPriceInput" name="newPrice" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="addStock">Add Stock</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="reduceStockModal" tabindex="-1" aria-labelledby="reduceStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reduceStockModalLabel">Reduce Stock</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="reduceStockForm">
    <div class="form-group">
        <label for="reduceMedicineNameInput">Medicine Name:</label>
        <input type="text" class="form-control" id="reduceMedicineNameInput" placeholder="Medicine Name" required>
    </div>
    <div class="form-group">
        <label for="reduceQuantityInput">Quantity to Reduce:</label>
        <input type="number" class="form-control" id="reduceQuantityInput" placeholder="Quantity" required>
    </div>
</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="reduceStockButton">Save</button>
            </div>
        </div>
    </div>
</div>
            </div>
    <div class="boxes" id="medicineCardsContainer">
    <div class="card" id="somlux">
            <div class="card-body">
                <img src="images/solmux.jfif" alt="solmux">
                <div class="card-info">
                    <h2 id="somlux">Carbocisteine Solmux Forte 500mgX 60mL</h2>
                    <p>Price: PHP 129.00</p>
                    <p>In Stock: 3</p>
                </div>
            </div>
        </div>
        <div class="card" id="paracetamol">
            <div class="card-body">
                <img src="images/para.jpg" alt="Paracetamol">
                <div class="card-info">
                <h2  data-location="Shelf A">Biogesic Paracetamol 500mg 10 Tablet</h2>
                    <p>Price: PHP 105.00</p>
                    <p>In Stock:4</p>
                </div>
            </div>
        </div>      
        <div class="card" id="neozep">
            <div class="card-body">
                <img src="images/neo.jpg" alt="Neozep">
                <div class="card-info">
                    <h2 >Neozep Forte</h2>
                    <p>Price: PHP 7.00</p>
                    <p>In Stock: 6</p>
                </div>
            </div>
        </div>
        <div class="card" id="Robitussin">
            <div class="card-body">
                <img src="images/rob.jpg" alt="Robitussin">
                <div class="card-info">
                    <h2>Guaifenesin Robitussin 100mg/5mL Syrup</h2>
                    <p>Price: PHP 150.75</p>
                    <p>In Stock: 7</p>
                </div>
            </div>
        </div>
    </div>
<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="alaxzan">
            <div class="card-body">
                <img src="images/alax.jpg" alt="Alaxan">
                <div class="card-info">
                    <h2 >Alaxan Ibuprofen Paracetamol 200mg/325mg tablet</h2>
                    <p>Price: PHP 20.50</p>
                    <p>In Stock: 3</p>
                </div>
            </div>
        </div>
        <div class="card" id="GAVISCON">
            <div class="card-body">
                <img src="images/gavi.jpg" alt="GAVISCON">
                <div class="card-info">
                <h2 data-location="Shelf A">GAVISCON Double Action Liquid Sachet 10ml</h2>
                    <p>Price: PHP 33.50</p>
                    <p>In Stock: 23</p>
                </div>
            </div>
        </div>      
        <div class="card" id="Nafarin">
            <div class="card-body">
                <img src="images/neo.jpg" alt="Nafarin">
                <div class="card-info">
                    <h2 >Nafarin Tablet 1s (Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol)</h2>
                    <p>Price: PHP 8.50</p>
                    <p>In Stock: 16</p>
                </div>
            </div>
        </div>
        <div class="card" id="Decolgen">
            <div class="card-body">
                <img src="images/decol.jfif" alt="Decolgen">
                <div class="card-info">
                    <h2 id="Robitussin">Decolgen Phenylephrine HCl 10mg Paracetamol 500mg Chlorphenamine maleate</h2>
                    <p>Price: PHP 8.00</p>
                    <p>In Stock: 14</p>
                </div>
            </div>
        </div>
    </div>
<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="Medicol">
            <div class="card-body">
                <img src="images/medadv.jpg" alt="Medicol">
                <div class="card-info">
                    <h2 >Medicol Ibuprofen Advance 400mg 1 Softgel Capsule</h2>
                    <p>Price: PHP 12.25</p>
                    <p>In Stock: 13</p>
                </div>
            </div>
        </div>
        <div class="card" id="MEDICOLADVANCE">
            <div class="card-body">
                <img src="images/medadv.jpg" alt="MEDICOLADVANCE">
                <div class="card-info">
                <h2>MEDICOL ADVANCE Ibuprofen 200mg Softgel Capsule 1's</h2>
                    <p>Price: PHP 9.00</p>
                    <p>In Stock: 23</p>
                </div>
            </div>
        </div>      
        <div class="card" id="Bioflu">
            <div class="card-body">
                <img src="images/bio.jfif" alt="Bioflu">
                <div class="card-info">
                    <h2 >Bioflu Tablet 1s (Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol)</h2>
                    <p>Price: PHP 9.00</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>
        <div class="card" id="SALONPAS10">
            <div class="card-body">
                <img src="images/salon10.jpg" alt="SALONPAS">
                <div class="card-info">
                    <h2 >SALONPAS Methyl Salicylate / L-Menthol / Tocopherol Acetate / Dl-Camphor 36mg / 33mg / 12mg / 7.1mg Medicated Patch 10's</h2>
                    <p>Price: PHP 62.50</p>
                    <p>In Stock: 14</p>
                </div>
            </div>
        </div>
    </div>
<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="Salonpas20">
            <div class="card-body">
                <img src="images/salonpas.jpg" alt="Salonpas">
                <div class="card-info">
                    <h2 >Salonpas Methylsalicylate 105mg Menthol 31.5mg Medicated Patch 20s</h2>
                    <p>Price: PHP 108.75</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
        <div class="card" id="Tempra">
            <div class="card-body">
                <img src="images/tempra.jpg" alt="Tempra">
                <div class="card-info">
                <h2>Tempra Forte Orange Syrup 250mg 60ml</h2>
                    <p>Price: PHP 154.00</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>      
        <div class="card" id="VICKS">
            <div class="card-body">
                <img src="images/vapodrops.jpg" alt="VICKS">
                <div class="card-info">
                    <h2>VICKS VapoDrops Lozenges Honey & Lemon 8's</h2>
                    <p>Price: PHP 78.00</p>
                    <p>In Stock: 8</p>
                </div>
            </div>
        </div>
        <div class="card" id="salonpasorange">
            <div class="card-body">
                <img src="images/strepsils.jpg" alt="SALONPAS">
                <div class="card-info">
                    <h2 >Strepsils Orange with Vitamin C Blister Pack 8s</h2>
                    <p>Price: PHP 74.00</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>
    </div>
<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="strepsilscool">
            <div class="card-body">
                <img src="images/strepsilscool.jpg" alt="strepsilsc">
                <div class="card-info">
                    <h2 >STREPSILS Cool Sensation 8s</h2>
                    <p>Price: PHP 74.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
        <div class="card" id="strepsilssugarfree">
            <div class="card-body">
                <img src="images/strepsilssf.jpg" alt="strepsilssf">
                <div class="card-info">
                <h2>STREPSILS Lozenges Sugarfree Lemon 6s</h2>
                    <p>Price: PHP 74.00</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>      
        <div class="card" id="strepsilsoriginal">
            <div class="card-body">
                <img src="images/strepsilsori.jpg" alt="strepsilso">
                <div class="card-info">
                    <h2 >STREPSILS Original 8s</h2>
                    <p>Price: PHP 74.00</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>
        <div class="card" id="strepsilshoneylemon">
            <div class="card-body">
                <img src="images/strepsilshl.jpg" alt="strepsilshl">
                <div class="card-info">
                    <h2 >STREPSILS Honey Lemon 8s</h2>
                    <p>Price: PHP 74.00</p>
                    <p>In Stock: 10</p>
                </div>
            </div>
        </div>
    </div>
<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="strepsilswarm">
            <div class="card-body">
                <img src="images/salonpas.jpg" alt="strepsilsw">
                <div class="card-info">
                    <h2 >STREPSILS Warm 8s</h2>
                    <p>Price: PHP 74.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
        <div class="card" id="stresstabs">
            <div class="card-body">
                <img src="images/tempra.jpg" alt="Tempra">
                <div class="card-info">
                <h2>Stresstabs Multivitamins + Iron 1s</h2>
                    <p>Price: PHP 8.95</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>      
        <div class="card" id="babyflo108">
            <div class="card-body">
                <img src="images/cottonbuds.jpg" alt="babyflo108">
                <div class="card-info">
                    <h2>Babyflo Gentle Cotton Buds Plastic Stems 108 Tips</h2>
                    <p>Price: PHP 20.50</p>
                    <p>In Stock: 3</p>
                </div>
            </div>
        </div>
        <div class="card" id="babyflo72">
            <div class="card-body">
                <img src="images/cottonbuds72.jpg" alt="Babyflo72">
                <div class="card-info">
                    <h2 >BABYFLO Gentle Buds 72's</h2>
                    <p>Price: PHP 14.10</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
    </div>

<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="cottonbuds200">
            <div class="card-body">
                <img src="images/cottonbuds200.jpg" alt="cottonbuds200">
                <div class="card-info">
                    <h2 >BABYFLO Gentle Buds 200's</h2>
                    <p>Price: PHP 40.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
        <div class="card" id="cottonballs">
            <div class="card-body">
                <img src="images/cottonballs.jpg" alt="cottonballs">
                <div class="card-info">
                <h2>Med Guard Cotton Balls 50s Pure Cotton</h2>
                    <p>Price: PHP 18.00</p>
                    <p>In Stock: 3</p>
                </div>
            </div>
        </div>      
        <div class="card" id="cottonballs25">
            <div class="card-body">
                <img src="images/cottonballs25.jpg" alt="cottonballs25">
                <div class="card-info">
                    <h2>Med Guard Cotton Balls 25g Pure Cotton</h2>
                    <p>Price: PHP 14.00</p>
                    <p>In Stock: 2</p>
                </div>
            </div>
        </div>
        <div class="card" id="cottonballs50">
            <div class="card-body">
                <img src="images/cottonballs50g.jpg" alt="cottonballs50">
                <div class="card-info">
                    <h2 >Med Guard Cotton Balls 50g Pure Cotton</h2>
                    <p>Price: PHP 29.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
    </div>
<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="babywipes">
            <div class="card-body">
                <img src="images/babywipes.jpg" alt="babywipes">
                <div class="card-info">
                    <h2 >Giggle Baby Wipes Unscented 80s</h2>
                    <p>Price: PHP 109.00</p>
                    <p>In Stock: Unavailable</p>
                </div>
            </div>
        </div>
        <div class="card" id="babywipes10">
            <div class="card-body">
                <img src="images/babywipes10.jpg" alt="babywipes10">
                <div class="card-info">
                <h2>Giggle Baby Wipes Unscented 10s</h2>
                    <p>Price: PHP 95.00</p>
                    <p>In Stock: 2</p>
                </div>
            </div>
        </div>      
        <div class="card" id="off">
            <div class="card-body">
                <img src="images/off.jpg" alt="off">
                <div class="card-info">
                    <h2>OFF Overtime Insect Repellent Lotion 100ml</h2>
                    <p>Price: PHP 212.75</p>
                    <p>In Stock: 6</p>
                </div>
            </div>
        </div>
        <div class="card" id="offkids">
            <div class="card-body">
                <img src="images/offkids.jpg" alt="offkids">
                <div class="card-info">
                    <h2>OFF Lotion Kids 100ml</h2>
                    <p>Price: PHP 193.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
    </div>

<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="offkids50">
            <div class="card-body">
                <img src="images/offkids.jpg" alt="offkids50">
                <div class="card-info">
                    <h2 >OFF Lotion Kids 50m</h2>
                    <p>Price: PHP 192.75</p>
                    <p>In Stock: 1</p>
                </div>
            </div>
        </div>
        <div class="card" id="off50">
            <div class="card-body">
                <img src="images/off50.jpg" alt="off50">
                <div class="card-info">
                <h2>OFF Over Time Insect Repellant 50ml</h2>
                    <p>Price: PHP 141.75</p>
                    <p>In Stock: 2</p>
                </div>
            </div>
        </div>      
        <div class="card" id="colgate">
            <div class="card-body">
                <img src="images/colgate.png" alt="Colgate">
                <div class="card-info">
                    <h2>Colgate® Maximum Cavity Protection Great Regular Flavor Anti-Cavity Family Toothpaste 214g</h2>
                    <p>Price: PHP 183.00</p>
                    <p>In Stock: 3</p>
                </div>
            </div>
        </div>
        <div class="card" id="sensodyne">
            <div class="card-body">
                <img src="images/offkids.jpg" alt="offkids">
                <div class="card-info">
                    <h2>SENSODYNE Freshmint Toothpaste 100g</h2>
                    <p>Price: PHP 114.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
    </div>

    <div class="boxes" id="medicineCardsContainer">
    <div class="card" id="toothbrush">
            <div class="card-body">
                <img src="images/toothbrush.png" alt="toothbrush">
                <div class="card-info">
                    <h2 >Colgate Classic Toothbrush - 2s</h2>
                    <p>Price: PHP 38.50</p>
                    <p>In Stock: 6</p>
                </div>
            </div>
        </div>
        <div class="card" id="toothbrush1">
            <div class="card-body">
                <img src="images/off50.jpg" alt="toothbrush1">
                <div class="card-info">
                <h2>Dental B Basic Hard Bristles Toothbrush</h2>
                    <p>Price: PHP 52.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>      
        <div class="card" id="safeguard">
            <div class="card-body">
                <img src="images/safeguard.jpg" alt="safeguard">
                <div class="card-info">
                    <h2>Safeguard Pure White Bar Soap 175g</h2>
                    <p>Price: PHP 58.00</p>
                    <p>In Stock: 10</p>
                </div>
            </div>
        </div>
        <div class="card" id="safeguard60">
            <div class="card-body">
                <img src="images/safeguard60.jpg" alt="safegaurd60">
                <div class="card-info">
                    <h2>Safeguard Pure White Bar Soap 60g</h2>
                    <p>Price: PHP 29.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
    </div>

<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="safeguardlemonfresh">
            <div class="card-body">
                <img src="images/safeguardlf.jpg" alt="safeguardlf">
                <div class="card-info">
                    <h2 >SAFEGUARD Lemon Fresh 130g</h2>
                    <p>Price: PHP 58.00</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>
        <div class="card" id="safeguardfreshgreen">
            <div class="card-body">
                <img src="images/safeguardfg.jpg" alt="safeguardfg">
                <div class="card-info">
                <h2>SAFEGUARD Fresh Green 130g</h2>
                    <p>Price: PHP 52.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>      
        <div class="card" id="dove">
            <div class="card-body">
                <img src="images/dove.jpg" alt="dove">
                <div class="card-info">
                    <h2>Dove Bar White 135g</h2>
                    <p>Price: PHP 87.00</p>
                    <p>In Stock: 5</p>
                </div>
            </div>
        </div>
        <div class="card" id="nivea">
            <div class="card-body">
                <img src="images/nivea.jpg" alt="nivea">
                <div class="card-info">
                    <h2>NIVEA Men 48h Cool Kick Anti Perspirant 25ml</h2>
                    <p>Price: PHP 91.00</p>
                    <p>In Stock: 8</p>
                </div>
            </div>
        </div>
    </div>
<div class="boxes" id="medicineCardsContainer">
    <div class="card" id="doverollon">
            <div class="card-body">
                <img src="images/dovero.jpg" alt="dovero">
                <div class="card-info">
                    <h2 >Dove Deodorant Roll-On Original 40ML</h2>
                    <p>Price: PHP 91.00</p>
                    <p>In Stock: 6</p>
                </div>
            </div>
        </div>
        <div class="card" id="pampers">
            <div class="card-body">
                <img src="images/diaper.jpg" alt="pampers">
                <div class="card-info">
                <h2>Pampers Baby Dry Pants Value Small 40s</h2>
                    <p>Price: PHP 517.00</p>
                    <p>In Stock: 1</p>
                </div>
            </div>
        </div>      
        <div class="card" id="thermometer">
            <div class="card-body">
                <img src="images/thermometer.jpg" alt="thermometer">
                <div class="card-info">
                    <h2>Omron Digital Thermometer MC-246</h2>
                    <p>Price: PHP 298.00</p>
                    <p>In Stock: 4</p>
                </div>
            </div>
        </div>
        <div class="card" id="3dmask">
            <div class="card-body">
                <img src="images/3dmask.jpg" alt="3dmask">
                <div class="card-info">
                    <h2>3M 9513 KN95 Adult Facemask</h2>
                    <p>Price: PHP 55.00</p>
                    <p>In Stock: 3</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card" id="bloodpressure">
            <div class="card-body">
                <img src="images/dovero.jpg" alt="bloodpressure">
                <div class="card-info">
                    <h2 >Omron HEM 7120 Automatic Blood Pressure Monitor</h2>
                    <p>Price: PHP 2780.00</p>
                    <p>In Stock: 1</p>
                </div>
            </div>
        </div>
        <div class="card" id="pregnancytest">
            <div class="card-body">
                <img src="images/diaper.jpg" alt="pregnancytest">
                <div class="card-info">
                <h2>Partners Pregnancy Test</h2>
                    <p>Price: PHP 72.00</p>
                    <p>In Stock: 11</p>
                </div>
            </div>
        </div>      
        <div class="card" id="nebulizer">
            <div class="card-body">
                <img src="images/nebulizer.jpg" alt="nebulizer">
                <div class="card-info">
                    <h2>Omron NE C801VVV Compressor Nebulizer</h2>
                    <p>Price: PHP 2980.00</p>
                    <p>In Stock: 2</p>
                </div>
            </div>
        </div>

        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<script>
$(document).ready(function() {
    $('#openAddModalBtn').click(function() {
        $('#addMedicineModal').modal('show');
    });

    $('#openRemoveModalBtn').click(function() {
        $('#removeMedicineModal').modal('show');
    });

    $('#openAddStockModalBtn').click(function() {
        $('#addStockModal').modal('show');
    });

    function updateCardInfo() {
        // Iterate through each medicine card
        $('.card').each(function(index) {
            // Get medicine name from the card
            var cardMedicineName = $(this).find('h2').text();
            // Find corresponding data in medicineData array
            var medicine = medicineData.find(med => med.medicine_name === cardMedicineName);
            // If medicine data found, update card info
            if (medicine) {
                $(this).find('.card-info p:nth-child(2)').text('Price: PHP ' + medicine.price);
                $(this).find('.card-info p:nth-child(3)').text('In Stock: ' + medicine.stock);
            }
        });
    }

    $('#saveMedicineBtn').click(function() {
        var medicineName = $('#medicineNameInput').val();
        var medicinePrice = $('#medicinePriceInput').val();
        var medicineStock = $('#medicineStockInput').val();
        var medicineImage = $('#medicineImageInput').prop('files')[0];

        if (medicineName && medicinePrice && medicineStock && medicineImage) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var cardFound = false;
                $('.card').each(function() {
                    var cardName = $(this).find('h2').text();
                    if (cardName === medicineName) {
                        var currentStock = parseInt($(this).find('.card-info p:nth-child(3)').text().split(': ')[1]);
                        var newStock = currentStock + parseInt(medicineStock);
                        $(this).find('.card-info p:nth-child(2)').text('Price: PHP ' + medicinePrice);
                        $(this).find('.card-info p:nth-child(3)').text('In Stock: ' + newStock);
                        cardFound = true;
                        return false; // Exit each loop
                    }
                });

                if (!cardFound) {
                    var newCard = `
                        <div class="card">
                            <div class="card-body">
                                <img src="${e.target.result}" alt="${medicineName}">
                                <div class="card-info">
                                    <h2>${medicineName}</h2>
                                    <p>Price: PHP ${medicinePrice}</p>
                                    <p>In Stock: ${medicineStock}</p>
                                </div>
                            </div>
                        </div>`;
                    $('#medicineCardsContainer').append(newCard);
                }

                alert('Medicine added successfully');
                $('#addMedicineModal').modal('hide');
            };
            reader.readAsDataURL(medicineImage);
        } else {
            alert('Please fill in all the fields');
        }
    });

    $('#openReduceModalBtn').click(function() {
        $('#reduceStockModal').modal('show');
    });

    $('#saveStockBtn').click(function() {
        $('#saveStockBtn').click(function() {
        console.log('Save button clicked');

        var stockMedicineName = $('#addStockMedicineNameInput').val();
        var stockQuantity = $('#addStockQuantityInput').val();
        var stockPrice = $('#addStockPriceInput').val();

        console.log('Stock Medicine Name:', stockMedicineName);
        console.log('Stock Quantity:', stockQuantity);
        console.log('Stock Price:', stockPrice);
    });

        if (stockMedicineName && stockQuantity && stockPrice) {
            var cardFound = false;
            $('.card').each(function() {
                var cardName = $(this).find('h2').text();
                if (cardName === stockMedicineName) {
                    var currentStock = parseInt($(this).find('.card-info p:nth-child(3)').text().split(': ')[1]);
                    var newStock = currentStock + parseInt(stockQuantity);
                    var newPrice = parseFloat(stockPrice);
                    $(this).find('.card-info p:nth-child(2)').text('Price: PHP ' + newPrice.toFixed(2));
                    $(this).find('.card-info p:nth-child(3)').text('In Stock: ' + newStock);
                  
                }
            });

            if (cardFound) {
                alert('Stock updated successfully');
                $('#addStockModal').modal('hide');
            } else {
                alert('Medicine not found');
            }
        } else {
            alert('Please fill in all the fields');
        }
    });

    $('#reduceStockForm').submit(function(event) {
    event.preventDefault(); // Prevent default form submission

    var reduceMedicineName = $('#reduceMedicineNameInput').val();
    var reduceQuantity = $('#reduceQuantityInput').val();

    if (reduceMedicineName && reduceQuantity) {
        $.ajax({
            type: "POST",
            url: "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>",
            data: { reduceStock: true, medicineName: reduceMedicineName, quantity: reduceQuantity },
            dataType: "json", // Expect JSON response
            success: function(response) {
                if (response.success) {
                    // Update card info after successful reduction
                    updateCardInfo();
                    alert('Stock reduced successfully');
                } else {
                    alert('Error reducing stock: ' + response.message);
                }
                $('#reduceStockModal').modal('hide');
            },
            error: function(xhr, status, error) {
                alert('Error reducing stock: ' + error);
            }
        });
    } else {
        alert('Please fill in all the fields');
    }
});


    $('#reduceStockButton').click(function() {
    $('#reduceStockForm').submit();
});


    $('#confirmRemoveBtn').click(function() {
        var removeMedicineName = $('#removeMedicineNameInput').val().trim().toLowerCase();
        console.log("Medicine name to remove:", removeMedicineName); // Debugging

        if (removeMedicineName) {
            // Convert the medicine name to a valid ID (assuming IDs are formatted in a predictable way)
            var cardId = removeMedicineName.replace(/\s+/g, '').toLowerCase(); // Remove spaces and convert to lowercase
            var card = $('#' + cardId);

            if (card.length > 0) {
                console.log("Removing card with ID:", cardId); // Debugging
                card.remove();
                alert('Medicine removed successfully from the website');
            } else {
                alert('Medicine not found on the website');
            }
            $('#removeMedicineModal').modal('hide');
        } else {
            alert('Please enter the name of the medicine to remove');
        }
    });
    $('#openAddStockModalBtn').click(function() {
        $('#addStockModal').modal('show');
    });

    // Handle form submission for adding stock
    $('#addStockModal form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get form data
        var stockMedicineName = $('#addStockMedicineNameInput').val();
        var stockQuantity = $('#addStockQuantityInput').val();
        var stockPrice = $('#addStockPriceInput').val();

        // Validate form data
        if (stockMedicineName && stockQuantity && stockPrice) {
            // Send data to server using AJAX
            $.ajax({
                type: "POST",
                url: "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>",
                data: { addStock: true, medicineName: stockMedicineName, quantity: stockQuantity, newPrice: stockPrice },
                dataType: "json", // Expect JSON response
                success: function(response) {
                    if (response.success) {
                        // Update card info after successful addition
                        updateCardInfo();
                        alert('Stock added successfully');
                        $('#addStockModal').modal('hide');
                    } else {
                        alert('Error adding stock: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error adding stock: ' + error);
                }
            });
        } else {
            alert('Please fill in all the fields');
        }
    });

    $.ajax({
    type: "POST",
    url: "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>",
    data: { addStock: true, medicineName: stockMedicineName, quantity: stockQuantity, newPrice: stockPrice },
    dataType: "json", // Expect JSON response
    success: function(response) {
        // Handle successful response
        console.log(response); // Debugging
        if (response.success) {
            // Update card info after successful addition
            updateCardInfo();
            alert('Stock added successfully');
            $('#addStockModal').modal('hide');
        } else {
            alert('Error adding stock: ' + response.message);
        }
    },
    error: function(xhr, status, error) {
        // Handle errors
        console.log(xhr.responseText); // Log the response for debugging
        alert('Error adding stock: ' + error);
    }
});

});
</script>

</body>
</html>
