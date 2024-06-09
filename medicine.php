<?php
include("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array to store stock for each medicine separately
$stocks = array();

// Array of medicines to query
$medicines = array("Solmux", "biogesic", "neozep", "robitussin", "alaxzan", "gaviscon", "nafarin",
"decolgen", "medicol4", "medicol", "bioflu", "salonpas10", "salonpas20", "tempra", "vicks", "strepsilsO",
"strepsilsCS", "strepsilsSF", "strepsilsOri", "strepsilsHL", "strepsilsW", "stresstabs", "cottonbuds108",
"cottonbuds72", "cottonbuds200", "cottonballs50s", "cottonballs25g", "cottonballs50g", "babywipes80s",
"babywipes10s", "offO100", "offK100", "offK50", "offO50", "colgate", "sensodyne", "Ctoothbrush", "Dtoothbrush",
"safeguard175g", "safeguard60g", "safeguardLF", "safeguardFG", "dovebar", "nivea", "doveRO", "pampers",
"thermometer", "surgicalmask", "kn95", "bloodpressure", "pregnancytest", "nebulizer");

// Loop through each medicine
foreach ($medicines as $medicine) {
    // Initialize an array to store the stock for the current medicine
    $stocks[$medicine] = array();

    // Query to get the stock of each medicine
    $sql = "SELECT stock FROM medicine WHERE medicine_name = '$medicine'";
    $result = $conn->query($sql);

    if ($result) { // Check if query was successful
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Store the stock of the medicine in its individual array
                $stocks[$medicine][] = $row["stock"];
            }
        } else {
            // If no results found, set stock to 0
            $stocks[$medicine][] = 0;
        }
    } else {
        // If there was an error with the query
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Check if there's a new stock value for the current medicine
    if (isset($newStocks[$medicine])) {
        // Update the stock for the current medicine
        $newStock = $newStocks[$medicine];
        $updateSql = "UPDATE medicine SET stock = '$newStock' WHERE medicine_name = '$medicine'";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully for $medicine<br>";
        } else {
            echo "Error updating record for $medicine: " . $conn->error . "<br>";
        }
    }
}

// Output the stock for each medicine separately
foreach ($stocks as $medicine => $stockArray) {
    // Output or process the stocks as needed
}

$conn->close();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">


</head>
<body>


<script>
   document.addEventListener("DOMContentLoaded", function() {
    // Select the shopping cart icon
    let iconCart = document.querySelector('#cartIcon');
    // Select the body element
    let body = document.querySelector('body');
    // Select the close button
    let closeButton = document.querySelector('.close');

    // Add click event listener to the shopping cart icon
    iconCart.addEventListener('click', () => {
        // Toggle the 'showCart' class on the body element
        body.classList.toggle('showCart');
    });

    // Add click event listener to the close button
    closeButton.addEventListener('click', () => {
        // Remove the 'showCart' class from the body element
        body.classList.remove('showCart');
    });


        // Function to search for medicine
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

        // Function to handle search on Enter key press
        function searchMedicineEnter(event) {
            if (event.keyCode === 13) {
                searchMedicine();
            }
        }

        // Event listener for input change
        document.getElementById("medicineSearch").addEventListener("input", function() {
            searchMedicine();
        });

        // Event listener for Enter key press
        document.getElementById("medicineSearch").addEventListener("keydown", function(event) {
            searchMedicineEnter(event);
        });
    });



function changeQuantity(button, delta) {
    const quantityElement = button.parentElement.querySelector('span:nth-child(2)');
    let quantity = parseInt(quantityElement.innerText) + delta;
    if (quantity < 1) quantity = 1;
    quantityElement.innerText = quantity;

    // Update total price after changing quantity
    updateTotalPrice();
}


</script>



<div class="navbar">
        <div class="icon">
            <a href="index.php" class="logo">MCIS</a>
        </div>
        <div class="menu">
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropbtn" onclick="toggleDropdown(event)">PRODUCTS</a>
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
        <a class="btn-shopping-cart" id="sidebarToggle" role="button" aria-controls="offcanvasExample">
            <i class="fa fa-shopping-cart" id="cartIcon"></i>
        </a>
        <div class="search">
            <input class="srch" type="search" name="" placeholder="Search" id="medicineSearch">
            <button class="btnsearch" onclick="searchMedicine()">Search</button>
        </div>
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
    <button id='checkOutButton' onclick="updateStock; goToContactPage();">Check Out</button>
   
    </div>
</div>



    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function updateStock(medicine) {
            $.ajax({
                type: "POST",
                url: "updatestock.php",
                data: { medicine_name: medicine },
                success: function(response) {
                    alert(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }

    function goToContactPage() {
            window.location.href = 'updateCart.php'; 
            console.log("goToContactPage function called");
        }
  
</script>

<!--cards-->
<div class="container" id="medicineContainer" >

    <div class="card">
        <img src="images/solmux.jfif" class="card-img-top" alt="Solmux">
        <div class="card-body"><br><br><br>

        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/solmux.jfif" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Carbocisteine Solmux Forte  500mgX 60mL" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="129" >
            </div>
            
            <h5 class="card-title">Carbocisteine Solmux Forte  500mgX 60mL</h5>
            <h3>Price: PHP 129.00</h3>
      
               
            <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["Solmux"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#solmuxModal">
                More Info
            </button>
            
            <input type="submit"  formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn" >
        </form>
         
        </div>
    </div>
 

    <div class="modal fade" id="solmuxModal" tabindex="-1" aria-labelledby="solmuxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="solmuxModalLabel">Carbocisteine Solmux Forte  500mgX 60mL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Indications</b> Solmux® contains 500mg of Carbocisteine which is used to treat cough with phlegm. It is scientifically proven to remove phlegm and bacteria that causes cough. It works by helping: a) melt sticky phlegm, b) expel phlegm with bacteria, c) stop excess production of phlegm.</p>
                    <p><b>Overdosage</b><br><b>Symptoms:</b> Carbocisteine overdose is usually associated with stomach or intestinal discomfort. Management: If the patient has taken more than the recommended dosage, consult a doctor or contact a poison control center right away.</p>
                    <p><b>Administration</b><br>Should be taken with food.</p>
                    <p><b>Contraindications</b><br>If patients are allergic to any ingredient in the products. Avoid carbocisteine in patients with active stomach or intestinal ulcer.</p>
                    <p><b>Special Precautions</b><br>These medicines should be given with care in patients with a history of stomach or intestinal ulcer and gastrointestinal bleeding. Do not take more than the recommended dose.<br>Stop taking the medicine and consult the doctor immediately if the patient develop any of the following: Skin rashes; stomach or intestinal bleeding; if symptoms do not improve or new symptoms appear. Use in Pregnancy & Lactation: If patient is pregnant or breastfeeding, consult her doctor before using this product.</p>
                    <p><b>Use In Pregnancy & Lactation</b><br>If patient is pregnant or breastfeeding, consult her doctor before using this product.</p>
                    <p><b>Adverse Reactions</b><br>Carbocisteine is generally safe. Nausea, stomach discomfort, diarrhea, and skin rashes are the most common undesirable effects.<br>Carbocisteine rarely causes dizziness, insomnia, headache, palpitations, mild lowering of blood glucose, dryness of mouth, abnormal heart rhythm (atrial fibrillation), and "gassiness".</p>
                    <p><b>Storage</b><br>Store at temperatures not exceeding 30°C.</p>
                    <p><b>Dosage</b><br>Dose of Phenylephrine HCl + Chlorphenamine Maleate + Paracetamol every 6 hours: Adults and Children 12 years and older: 1 tablet.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
    <img src="images/para.jpg" class="card-img-top" alt="biogesic">
    <div class="card-body">
        <form class="card-body" method="post" action="insertIntoCart.php">
            <div class="row">
                <input type="hidden" name="image" value="images/para.jpg">
            </div>
            <div class="row">
                <input type="hidden" name="title" value="Biogesic Paracetamol 500mg 10 Tablet">
            </div>
            <div class="row">
                <input type="hidden" name="price" value="105">
            </div>
            <h5 class="card-title">Biogesic Paracetamol 500mg 10 Tablet</h5>
            <h3>Price: PHP 105.00</h3>

            <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["biogesic"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paracetamolModal">
                More Info
            </button>
            <input type="submit"  formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
        </form>
    </div>
</div>

    <div class="modal fade" id="paracetamolModal" tabindex="-1" aria-labelledby="paracetamolModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paracetamolModalLabel">Biogesic Paracetamol 500mg 10 Tablet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Indications</b> Relief of minor aches and pains such as headache, backache, menstrual cramps, muscular aches, minor arthritis pain, toothache and pain associated with common cold and flu. Adults and Children >12 years: 1-2 tabs every 4-6 hrs, or as needed. Do not take >8 tabs in 24 hrs.</p>
                    <p><b>Administration</b><br>Should be taken with food.</p>
                    <p><b>Contraindications</b><br>Hypersensitivity to paracetamol. Repeated administration in patients with anemia, cardiac, pulmonary, renal and hepatic damage.</p>
                    <p><b>Special Precautions</b><br>These medicines should be given with care in patients with a history of stomach or intestinal ulcer and gastrointestinal bleeding. Do not take more than the recommended dose.<br>Stop taking the medicine and consult the doctor immediately if the patient develop any of the following: Skin rashes; stomach or intestinal bleeding; if symptoms do not improve or new symptoms appear. Use in Pregnancy & Lactation: If patient is pregnant or breastfeeding, consult her doctor before using this product.</p>
                    <p><b>Use In Pregnancy & Lactation</b><br>Paracetamol crosses the placenta but the drug has been widely used as an analgesic in pregnancy and no adverse fetal effects have been recorded. However, as with any drug, a doctor is to be consulted before using Biogesic if pregnant or breastfeeding.</p>
                    <p><b>Adverse Reactions</b><br>Paracetamol when taken within therapeutic levels have low incidence of side effects. Skin rashes or minor gastrointestinal disturbances have been reported. Paracetamol very rarely aggravates bronchospasm in patients who are sensitive to aspirin and other nonsteroidal anti-inflammatory drugs. Although paracetamol does not normally produce methemoglobinemia or hemolysis even after overdosage or in patients with glucose-6-phosphate dehydrogenase deficiency, there have been isolated reports of these complications.</p>
                    <p><b>Storage</b><br>Store at temperatures not exceeding 30°C. Protect from light.</p>
                    <p><b>Dosage</b><br>Adults and Children >12 years: 1-2 tabs every 4-6 hrs, or as needed. Do not take >8 tabs in 24 hrs.</p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <img src="images/neo.jpg" class="card-img-top" alt="Neozep">
        <div class="card-body">
            
        <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/neo.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Neozep Forte" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="7" > 
                
            </div>
     
          <h5 class="card-title">Neozep Forte</h5>
            <h3>Price: PHP 7.00</h3>
            <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["neozep"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#neozepModal">
                More Info
            </button>
            
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>

        </div>
    </div>

    <div class="modal fade" id="neozepModal" tabindex="-1" aria-labelledby="neozepModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="neozepModalLabel">Neozep Forte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <div class="modal-body">
                <p><b>Indications</b> What is Neozep® for? Neozep® Forte for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections.</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> Thenylephrine HCl: Increased blood pressure; Palpitation; Vomiting; Headache; Paresthesia (sensation of tingling, pricking or numbness of the skin); Cerebral hemorrhage (bleeding from a ruptured blood vessel in the brain); Seizures.Paracetamol: Overdosage of Paracetamol usually involves 4 phases with the following signs and symptoms: I. Eating disorder, nausea, vomiting, malaise, and excessive sweating.</p>
                <p><b>Administration</b><br>Should be taken with food.</p>
                <p><b>Contraindications</b></p>
                    <ul>
                        <li>If the patient is allergic to any ingredient in the product.</li>
                        <li>If the patient has high blood pressure or severe heart disease unless recommended by a doctor.</li>
                        <li>If the patient has anemia, kidney or liver disease unless recommended by a doctor.</li>
                        <li>If the patient is pregnant or breastfeeding.</li>
                    </ul>
                <p><b>Special Precautions</b></p>
                    <ul>
                        <li>Liver Warning: These products contain Paracetamol. Severe liver damage may occur if:</li>
                        <ul>
                            <li>A child takes more than 5 doses in 24 hours, which is the maximum daily amount of Paracetamol.</li>
                            <li>An adult takes more than 4 g of Paracetamol in 24 hours, which is the maximum daily amount.</li>
                            <li>Taken with other medicines containing Paracetamol (or Acetaminophen).</li>
                            <li>An adult has 3 or more alcoholic drinks everyday while using these products.</li>
                        </ul>
                        <li>Do not use with any other medicine containing Paracetamol (prescription or nonprescription). If the patient is not sure whether a medicine contains Paracetamol, ask a doctor.</li>
                        <li>Ask a doctor before use if the patient has liver disease or kidney disease.</li>
                    </ul>
                <p><b>Use In Pregnancy & Lactation</b><br>Contraindicated if the patient is pregnant or breastfeeding.</p>
                <p><b>Adverse Reactions</b><br>Phenylephrine HCl may cause tremor (muscle shaking), restlessness, anxiety (feeling of uneasiness), insomnia/sleeplessness, nervousness, dizziness, increased blood pressure, palpitation, arrhythmia (irregular heart beat), weakness, respiratory distress (noisy, congested breathing), and pallor. Paracetamol, when taken within the recommended dose and duration of treatment, has low incidence of side effects. Skin rashes, hypersensitivity reactions, changes in the number of white blood cells and platelets, and minor stomach and intestinal disturbances have been reported.</p>
                <p><b>Storage</b><br>Store at temperatures not exceeding 30°C.</p>
                <p><b>Dosage</b><br>Dose of Phenylephrine HCl + Chlorphenamine Maleate + Paracetamol every 6 hours: Adults and Children 12 years and older: 1 tablet.</p>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <img src="images/rob.jpg" class="card-img-top" alt="Robitussin" style="margin-top: 36px;">
    <div class="card-body">

    <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/rob.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Guaifenesin Robitussin 100mg/5mL Syrup" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="150.75" > 
                
            </div>
     
      
        <h5 class="card-title">Guaifenesin Robitussin 100mg/5mL Syrup</h5>
        <h3>Price: PHP 150.75</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["robitussin"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn-more-info btn-primary" data-toggle="modal" data-target="#robitussinModal">
            More Info
        </button>

            
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>


    </div>
</div>

<div class="modal fade" id="robitussinModal" tabindex="-1" aria-labelledby="robitussinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="robitussinModalLabel">Neozep Forte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications</b> This combination medication is used to temporarily treat cough, chest congestion, and stuffy nose symptoms caused by the common cold, flu, allergies, hay fever, or other breathing illnesses (such as sinusitis, bronchitis).</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> Nausea and vomiting.In case of accidental overdose, discontinue use and seek professional assistance immediately.</p>           
                <p><b>Administration:</b><br> May be taken with or without food.</p>
                <p><b>Contraindications:</b> Robitussin is contraindicated in patients who are allergic (hypersensitive) to its active ingredient or other components of the product. Do not use in children under 2 years of age</p>
                <p><b>Special Precautions:</b> This product contains sorbitol, 25.56 mg/capsule, which may have a laxative effect or cause diarrhea in some people. This is more likely if several products containing sorbitol or related substances are consumed simultaneously.</p>
                <p><b>Use In Pregnancy & Lactation</b><br> As with any medication, women who are pregnant or breast-feeding should seek the advice of a doctor before using the product.</p>
                <p><b>Adverse Reactions</b><br> Individuals may experience undesirable effects such as nausea and vomiting. Hypersensitivity may also occur. NOTE: Guaifenesin has been shown to produce a color interference with certain laboratory determinations of 5-hydroxyindoleacetic acid (5-HIAA) and vanillylmandelic acid (VMA).</p>
                <p><b>Storage</b><br> Syrup: Store at temperatures not exceeding 25°C away from direct sunlight.</p>
                <p><b>Dosage</b></p>
                    <ul>
                        <li><b>ADULT DOSE (and children 12 years and over):</b> 2 - 4 teaspoonfuls every 4 hours.</li>
                        <li><b>CHILD DOSE</b></li>
                        <ul>
                           <p> 6 yrs. to under 12 yrs.: 1 - 2 teaspoonfuls every 4 hours.</p>
                            <p>Children under 6 yrs.: Do not use.</p>
                        </ul>
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/alax.jpg" class="card-img-top" alt="Alaxzan" style="margin-top: 28px;">
    <div class="card-body">


    <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/alax.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Alaxan Ibuprofen Paracetamol 200mg/325mg tablet" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="20.50" > 
                
            </div>
                        
                <h5 class="card-title">Alaxan Ibuprofen Paracetamol 200mg/325mg tablet</h5>
                <h3>Price: PHP 20.50</h3>
            <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["alaxzan"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        More Info
                    </button>
 
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>

        
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alaxan Ibuprofen Paracetamol 200mg/325mg tablet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications</b> Used for the relief of mild to moderately severe pain of muscuskeletal origin such as muscle pain (myalgia), arthritis, rheumatism, sprain, strain, bursitis (inflammation of the fluid-filled sac or bursa that lies between a tendon and skin), tendonitis, backache and stiff neck.<br>
                    Used for the relief of tension headache, dysmenorrhea, toothache, pain after tooth extraction and minor surgical operations.</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> Nausea, vomiting, diaphoresis and general malaise. Clinical and laboratory evidence of hepatotoxicity may not be apparent until 48-72 hrs after ingestion.</p>           
                <p><b>Administration:</b><br> May be taken with or without food.</p>
                <p><b>Contraindications:</b> Hypersensitivity to ibuprofen, paracetamol or other NSAIDs. Active or history of peptic ulceration or haemorrhage (including history of gastrointestinal bleeding related to previous NSAID therapy); severe heart failure (NYHA Class IV), cerebrovascular or other active bleeding, coagulation disorders, history of ulcerative colitis or Crohn’s disease, bronchial asthma, urticaria or allergic-type reactions to aspirin or other NSAIDs, active alcoholism</p>
                <p><b>Special Precautions:</b> Patient with existing or history of bronchial asthma or allergic disease, history of hypertension, mild to moderate CHF, mixed connective tissue disorder, SLE, non-cirrhotic alcoholic liver disease.</p>
                <p><b>Use In Pregnancy & Lactation:</b><br> Do not use ibuprofen-paracetamol during the last 3 months of pregnancy unless specifically directed by a doctor. because it may cause problems in the unborn child (ie, premature closure of the ductus arteriosus) or complications during delivery.</p>
                <p><b>Adverse Reactions:</b><br> Individuals may experience undesirable effects such as nausea and vomiting. Hypersensitivity may also occur. NOTE: Guaifenesin has been shown to produce a color interference with certain laboratory determinations of 5-hydroxyindoleacetic acid (5-HIAA) and vanillylmandelic acid (VMA).</p>
                <p><b>Storage:</b><br> Store below 30°C. Protect from light.</p>
                <p><b>Dosage:</b> Ibuprofen 200 mg and Paracetamol 325 mg tab or cap
                     1 tab or cap 6 hourly as needed. Max duration: 10 days.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/gav.jfif" class="card-img-top" alt="Gaviscon" style="width: 250px; height: 290px;">
    <div class="card-body">

    <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/gav.jfif" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="GAVISCON Double Action Liquid Sachet 10ml" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="33.50" > 
                
            </div>
                        
              <h5 class="card-title" style="margin-bottom: 10px;">GAVISCON Double Action Liquid Sachet 10ml</h5>
        <h3>Price: PHP 33.50</h3>
            <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["gaviscon"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gavisconModal">
            More Info
        </button>
      
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>


        
    </div>
</div>

<div class="modal fade" id="gavisconModal" tabindex="-1" aria-labelledby="gavisconModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gavisconModalLabel">GAVISCON Double Action Liquid Sachet 10ml</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br> Gaviscon can be used to treat heartburn (acid reflux) and indigestion. The medicine works by forming a protective layer that floats on top of the contents of your stomach. This stops stomach acid escaping up into your food pipe.</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> Symptoms are likely to be minor; some abdominal distension may be noticed. Management: In the event of overdose, symptomatic treatment should be given.</p>           
                <p><b>Administration:</b><br> Should be taken with food: Take after meals & at bedtime. Chew tab thoroughly before swallowing.</p>
                <p><b>Contraindications:</b><br> Hypersensitivity to sodium alginate, sodium bicarbonate, calcium carbonate or to any of the excipients listed in the product. This product should not be used in patients with moderate or severe renal insufficiency.</p>
                <p><b>Special Precautions:</b><br> Liquid: Each 10 mL dose has a sodium content of 127.25 mg (5.53 mmol). This should be taken into account when a highly restricted salt diet is recommended, e.g. in some cases of congestive cardiac failure and renal impairment.Each 10 mL dose contains 130 mg (3.25 mmol) of calcium. Care needs to be taken in treating patients with hypercalcaemia, nephrocalcinosis and recurrent calcium containing renal calculi.<br>Treatment of children younger than 12 years of age is not generally recommended, except on medical advice.If symptoms do not improve after seven days, the clinical situation should be reviewed. Prolonged use should be avoided.As with other antacid products, taking this product can mask the symptoms of other more serious, underlying medical conditions.Contains methyl parahydroxybenzoate (E218) and propyl parahydroxybenzoate (E216) which may cause allergic reactions (possibly delayed).</p>
                <p><b>Use In Pregnancy & Lactation:</b><br> Use in Pregnancy: Clinical studies in more than 500 pregnant women as well as a large amount of data from post-marketing experience indicate no malformative or feto/neonatal toxicity of the active substances.This product can be used during pregnancy, if clinically needed.Taking into account the presence of calcium carbonate, it is recommended to limit the treatment duration as much as possible.<br>Use in Lactation: No effects of the active substances have been shown in breastfed newborns/infants of treated mothers. This product can be used during breast-feeding.Fertility: Clinical data do not suggest that this product has an effect on human fertility.</p>
                <p><b>Adverse Reactions:</b><br> Hypersensitivity reactions (including anaphylaxis and urticaria) and respiratory effects (including bronchospasm) have been reported very rarely.</p>
                <p><b>Storage:</b><br> Store below 30°C.</p>
                <p><b>Dosage:</b><br> If symptoms do not improve after seven days, the clinical situation should be reviewed. Prolonged use should be avoided.<br>
                    <b>Liquid:</b> Adults and Children 12 Years and Over: One to two sachets or doses (10-20 mL) after meals and at bedtime, up to four times per day.<br>
                    <b>Children under 12 Years:</b> Should be given only on medical advice.<br>
                    <b> Elderly: </b>No dose modifications are necessary for this age group.<br>
                    <b>Tablet: </b>Adults and Children 12 Years and Over: Two to four tablets after meals and at bedtime, up to four times per day.<br>
                    <b>Children under 12 Years: </b>Should be given only on medical advice.<br>
                    <b>Elderly:</b> No dose modifications necessary for this age group.<br>
                    <b>Administration:</b> Liquid: For oral administration.</p>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
    <img src="images/nafarin.jpg" class="card-img-top" alt="Nafarin">
    <div class="card-body">

    <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/nafarin.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Nafarin Tablet 1s (Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol)" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="8.50" > 
                
            </div>
                        
         <h5 class="card-title">Nafarin Tablet 1s (Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol)</h5>
        <h3>Price: PHP 8.50</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["nafarin"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nafarinModal">
            More Info
        </button>
        
      
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>
        
    </div>
</div>

<div class="modal fade" id="nafarinModal" tabindex="-1" aria-labelledby="nafarinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nafarinModalLabel">Nafarin Tablet 1s (Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br> This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections. It also helps decongest sinus openings and passages.</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> Phenylpropanolamine HCl overdose can lead to symptoms like irregular heartbeat, high blood pressure, and seizures, with severe cases resulting in heart attack or death. Chlorphenamine maleate overdose may cause extreme drowsiness, hallucinations, convulsions, and coma. Overdosing on paracetamol typically progresses through phases, manifesting initially as nausea and vomiting, then potentially leading to liver failure and other organ complications. In any case of overdose, seeking immediate medical assistance, even if no symptoms are apparent, is crucial due to the risk of serious complications.</p>           
                <p><b>Administration:</b><br> May be taken with or without food.</p>
                <p><b>Contraindications:</b><br> If the patient is allergic to any ingredient in the product.
                    <br>If the patient has high blood pressure or severe heart disease unless recommended by a doctor.
                    <br>If the patient has anemia, kidney or liver disease unless recommended by a doctor.
                    <br>If the patient is pregnant or breastfeeding.</p>
                <p><b>Special Precautions:</b><br> This product contains paracetamol, which can cause severe liver damage if more than 4g is taken in 24 hours, if combined with other paracetamol-containing medicines, or if consumed with excessive alcohol. It may also trigger severe skin reactions. Patients should cease use and seek medical help if a skin reaction occurs. Caution is advised when driving or performing tasks requiring alertness due to possible drowsiness. Individuals with liver or kidney disease, or those taking blood-thinning medication like warfarin, should consult a doctor before use. Additionally, patients should consult a doctor before use if they have high blood pressure, heart issues, glaucoma, thyroid problems, diabetes, enlarged prostate, bladder issues, or difficulty urinating. If fever worsens or persists for more than 3 days, or if new symptoms arise, patients should stop use and consult a doctor.</p>
                <p><b>Use In Pregnancy & Lactation:</b><br> Do not take this medicine if the patient is pregnant or breastfeeding.</p>
                <p><b>Adverse Reactions:</b><br> Phenylpropanolamine HCl can cause psychiatric disorders such as aggressiveness and anxiety, nervous system disorders including agitation and tremors, eye disorders like blurred vision, cardiac disorders such as chest tightness, and gastrointestinal disorders like nausea. Chlorphenamine maleate may induce sleepiness, nervousness, headache, blurred vision, gastrointestinal discomfort, and muscle weakness. Paracetamol, within recommended doses, generally has low side effects but may lead to blood and immune system disorders, allergic reactions, minor gastrointestinal disturbances, and rare serious skin reactions.</p>
                <p><b>Storage:</b><br> Store below 30°C.</p>
                <p><b>Dosage:</b><br> <b>Adults and Children 12 years and older:</b> Orally, 1 tablet every 6 hours, or, as recommended by a doctor.
                <b>Missed Dose: </b>If the patient misses a dose, just take the next dose if still needed for the condition being treated, and the subsequent doses at the recommended time or schedule (i.e., every 6 hours).
                   Do not double the dose.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <img src="images/decol.jfif" class="card-img-top" alt="Decolgen">
    <div class="card-body">

    <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/decol.jfif" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Decolgen Phenylephrine HCl 10mg Paracetamol 500mg Chlorphenamine maleate" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="8.00" > 
                
            </div>

        <h5 class="card-title">Decolgen Phenylephrine HCl 10mg Paracetamol 500mg Chlorphenamine maleate</h5>
        <h3>Price: PHP 8.00</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["decolgen"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#decolgenModal">
            More Info
        </button>
           
   
      
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>

        
    </div>
</div>

<div class="modal fade" id="decolgenModal" tabindex="-1" aria-labelledby="decolgenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="decolgenModalLabel">Decolgen Phenylephrine HCl 10mg Paracetamol 500mg Chlorphenamine maleate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  

            <div class="modal-body">
                <p><b>Indications</b> This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections. It also helps decongest sinus openings and passages.</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> Paracetamol overdose typically progresses through four phases, involving symptoms like nausea, vomiting, abdominal pain, liver enlargement, and potential organ failure. Phenylpropanolamine HCl overdose may lead to tachycardia, irregular heartbeat, high blood pressure, seizures, and even fatal outcomes like heart attack or stroke. Chlorphenamine maleate overdose can cause extreme drowsiness, weakness, hallucinations, convulsions, and coma. It's crucial to seek immediate medical assistance in cases of overdose, even if no symptoms are evident, due to the risk of delayed liver damage.</p>           
                <p><b>Administration:</b><br> May be taken with or without food.</p>
                <p><b>Contraindications:</b><br> If the patient is allergic to any ingredient in the product.
                    <br>If the patient has high blood pressure or severe heart disease unless recommended by a doctor.
                    <br>If the patient has anemia, kidney or liver disease unless recommended by a doctor.
                    <br>If the patient is pregnant or breastfeeding.</p>
                <p><b>Special Precautions:</b> Use of this medication should be approached cautiously in patients with certain conditions such as high blood pressure, toxic goiter, benign prostatic hypertrophy, irregular heart rate, glaucoma, and those taking antidepressants. Patients with heart disease and uncontrolled or untreated high blood pressure should seek medical advice before using Phenylpropanolamine. Liver warning: Severe liver damage may result if an adult or child aged 12 years and older takes more than 4g of paracetamol in 24 hours, uses other medicines containing paracetamol, or consumes three or more alcoholic drinks daily while using this product. Avoid using with any other medication containing paracetamol without consulting a doctor. Patients with liver or kidney disease should consult a doctor before use. Additionally, patients taking warfarin, a blood-thinning medicine, should seek medical advice before use. This medication may cause drowsiness, so caution is advised when driving or performing tasks requiring alertness. Do not exceed the recommended dose and avoid use after the expiry date. Prior to taking this medication, patients should inform their doctor if they have high blood pressure, heart problems, glaucoma, thyroid problems, diabetes, liver or kidney disease, enlarged prostate, bladder problems, or difficulty urinating. Stop use and consult a doctor if fever worsens or persists for more than 3 days, or if new symptoms develop.</p>
                <p><b>Use In Pregnancy & Lactation:</b><br>These medicines are contraindicated if the patient is pregnant or breastfeeding.</p>
                <p><b>Adverse Reactions:</b><br> Paracetamol, when taken within the recommended dose and duration of treatment, has low incidence of side effects. Skin rashes and minor stomach and intestinal disturbances have been reported.
                <b>Decolgen Forte:</b> Phenylpropanolamine may cause sudden, persistent, severe headache, nervousness, restlessness, insomnia/sleeplessness, dizziness, anxiety, confusion, high blood pressure, palpitation, chest tightness, tremor, agitation, irritability, aggressiveness (particularly in young children), nausea, and blurred vision.
                   Chlorphenamine Maleate may cause sleepiness and drowsiness. Other undesirable effects include muscle weakness, gastrointestinal discomfort nausea, vomiting, diarrhea or constipation, dryness of the mouth, nose, and throat, difficulty urinating, ringing in the ears, visual disturbance, blurred vision, insomnia/sleeplessness, tremor, nervousness, irritability, chest tightness, increased or decreased blood pressure, and headache. Paracetamol, when taken within the recommended dose and duration of treatment. has low incidence of side effects. Skin rashes and minor stomach and intestinal disturbances have been reported.</p>
                <p><b>Storage:</b><br> Store below 30°C. </p>
                <p><b>Dosage:</b> Adults and children 12 years and older: Orally, 1 tablet every 6 hours, or, as recommended by a doctor.<br>
                <b>Missed Dose:</b> If the patient missed a dose, just take the next dose if still needed for the condition being treated, and the subsequent doses at the recommended time or schedule (i.e., every 6 hours).
               <br> Do not double the dose.</p>
            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
    <img src="images/medicol.jpg" class="card-img-top" alt="Medicol">
    <div class="card-body">


    <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/medicol.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="Medicol Ibuprofen Advance 400mg 1 Softgel Capsule" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="12.25" > 
                
            </div>

         <h5 class="card-title">Medicol Ibuprofen Advance 400mg 1 Softgel Capsule</h5>
        <h3>Price: PHP 12.25</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["medicol4"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#medicolModal">
            More Info
        </button>
        
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>
    
    </div>
</div>

<div class="modal fade" id="medicolModal" tabindex="-1" aria-labelledby="medicolModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medicolModalLabel">Medicol Ibuprofen Advance 400mg 1 Softgel Capsule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                <p><b>Indications</b> <b>Medicol Advance 400:</b>For the relief of headache including migraine, neuralgia (painful disorder of the nerves).
                        For the relief of muscular aches including sprains and strains, backache including low back pain, minor aches and pains associated with the common cold, menstrual cramps (dysmenorrhea), dental pain and pain after surgery.
                        For the relief of inflammation from arthritis and non-serious arthritic conditions.
                        Also for fever reduction.</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> The most frequently reported symptoms of ibuprofen overdose include abdominal pain, nausea, vomiting, fatigue (lethargy) and drowsiness. Other symptoms include headache, ringing in the ears (tinnitus), central nervous system depression, and convulsions. Excessive acidity of the blood (metabolic acidosis), coma, acute kidney failure and absence of spontaneous breathing (apnea) may rarely occur.
                    <br>If the patient has taken more than the recommended dosage, consult a doctor or contact a Poison Control Center right away.</p>           
                <p><b>Administration:</b><br> Should be taken with food: May be taken w/ food/milk if GI upset occurs.</p>
                <p><b>Contraindications:</b><br> Medicol Advance: If the patient has ever had an allergic reaction to ibuprofen, aspirin or other NSAIDs or to any ingredient in the medicine.
                    <br>If the patient has bronchospasm (constriction of air passages of the lungs), angioedema (rapid swelling that occurs in the tissue just below the surface of the skin), nasal polyps or allergic-type reactions after taking aspirin or other NSAIDs.
                    <br>If the patient is taking aspirin or other NSAIDs, lithium or methotrexate.
                    <br>If the patient has had or is suffering from stomach ulcers, bleeding or other stomach problems.
                    <br>Right before or after heart surgery.
                    <br>If the patient has a history of stroke, heart attack, uncontrolled high blood pressure, or congestive heart failure.
                    <br>If the patient has or has ever had kidney disease.
                    <br>If the patient develop signs and symptoms of liver abnormality (e.g., jaundice), stop taking this medicine and consult a doctor.
                    <br>If the patient is pregnant or breastfeeding.
                    <br><b>Medicol Advance 400:</b> If the patient has ever had an allergic reaction to Ibuprofen or to any ingredient in the medicine.
                    <br>If the patient is taking Aspirin or other NSAIDs, Lithium or Methotrexate.
                    <br>If the patient has bronchospasm (constriction of air passages of the lungs), angioedema (rapid swelling that occurs in the tissue just below the surface of the skin), nasal polyps or allergic-type reactions after taking Aspirin or other NSAIDs.
                    <br>If the patient has had or is suffering from stomach ulcers, bleeding or other stomach problems.
                    <br>If the patient has a history of stroke, heart attack, uncontrolled high blood pressure or congestive heart failure.
                    <br>If the patient has or has ever had kidney disease.
                    <br>If the patient develop signs and symptoms of liver abnormality (e.g., jaundice), stop taking this medicine and consult a doctor.
                    <br>Right before or after surgery.
                    <br>If the patient is pregnant or breastfeeding.</p>
                <p><b>Special Precautions:</b> Ibuprofen may cause severe allergic reactions, particularly in those allergic to aspirin, with symptoms like hives, facial swelling, asthma, and skin rash. Stomach bleeding may occur, especially in individuals aged 60 or older, with a history of ulcers, taking blood-thinning medication, or consuming excessive alcohol. Heart attack or stroke risk may increase if used more than directed. Consult a doctor before use if experiencing serious side effects, taking other medications, or having certain health conditions like liver or kidney problems. Stop use and seek medical help if signs of stomach bleeding or allergic reaction occur, if new symptoms arise, or if pain or fever worsens.</p>
                <p><b>Use In Pregnancy & Lactation:</b><br>If the patient is pregnant or breastfeeding, as a doctor before use. It is especially important not to use ibuprofen during the last three months of pregnancy unless definitely directed to do so by a doctor because it may cause problems in the unborn child or complications during delivery.</p>
                <p><b>Adverse Reactions:</b><br>Undesirable effects from ibuprofen are rare but can occur. These may include symptoms affecting the central nervous system such as dizziness, drowsiness, headache, and hallucinations. Gastrointestinal issues like stomach ulceration, indigestion, and abdominal pain may also arise. Kidney and liver damage, abnormal blood clotting, and cardiovascular complications like fluid retention and stroke are potential risks. Special senses may be impacted with symptoms like ringing in the ears and decreased hearing. Skin reactions such as rashes and severe allergies like Stevens-Johnson Syndrome are also possible. Allergic reactions may manifest as abdominal pain, fever, and nausea. It's important to inform a doctor of any undesirable effects experienced.</p>
                <p><b>Storage:</b><br> Store at temperatures not exceeding 25°C. </p>
                <p><b>Dosage:</b> Medicol Advance contains ibuprofen and is recommended for short-term use at the lowest effective dose. For adults and children 12 years and older, the dosage is 1 softgel capsule every 4 to 6 hours, not exceeding 6 capsules in 24 hours or 10 days, unless directed by a doctor. Children under 12 should consult a doctor before use. If a dose is missed, the next dose should be taken when needed, without doubling. Medicol Advance 400 is also ibuprofen-based, with a maximum dosage of 3 softgel capsules (1,200 mg) in 24 hours. It can be taken up to 3 times a day, with at least 4 hours between doses or every 8 hours, as needed. Continuous use should not exceed 10 days unless directed by a doctor. If a dose is missed, the next dose should be taken, not exceeding 3 capsules in 24 hours.
                        summarize</p>
            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
    <img src="images/medadv.jpg" class="card-img-top" alt="Medicol Advance" style="margin-bottom: 15px;">
    <div class="card-body">


    <form class="card-body" method="post">
            <div class="row">
                
                <input type="hidden" name="image" value="images/medadv.jpg" >
            </div>
            <div class="row">
                
                <input type="hidden" name="title" value="MEDICOL ADVANCE Ibuprofen 200mg Softgel Capsule 1's" >
            </div>

            <div class="row">
                
                <input type="hidden" name="price"  value="9.00" > 
                
            </div>
                <h5 class="card-title">MEDICOL ADVANCE Ibuprofen 200mg Softgel Capsule 1's</h5>
                        <h3>Price: PHP 9.00</h3>
                        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["medicol"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#medicolAdvanceModal">
                            More Info
                        </button>
    
            <input type="submit" formaction="insertIntoCart.php" name="submit" value="Add to Cart" class="add-to-cart-btn">
           
        </form>
    </div>
</div>

<div class="modal fade" id="medicolAdvanceModal" tabindex="-1" aria-labelledby="medicolAdvanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medicolAdvanceModalLabel">MEDICOL ADVANCE Ibuprofen 200mg Softgel Capsule 1's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>Medicol Advance: For the relief of headache.For the relief of toothache, muscular aches, minor arthritis pain, backache, minor aches and pains associated with the common cold, and pain of menstrual cramps (dysmenorrhea).For fever reduction.</p>
                <p><b>Overdosage</b><br><b>Symptoms:</b> The most frequently reported symptoms of ibuprofen overdose include abdominal pain, nausea, vomiting, fatigue (lethargy) and drowsiness. Other symptoms include headache, ringing in the ears (tinnitus), central nervous system depression, and convulsions. Excessive acidity of the blood (metabolic acidosis), coma, acute kidney failure and absence of spontaneous breathing (apnea) may rarely occur.
                    <br>If the patient has taken more than the recommended dosage, consult a doctor or contact a Poison Control Center right away.</p>           
                <p><b>Administration:</b><br>Should be taken with food: May be taken w/ food/milk if GI upset occurs.</p>
                <p><b>Contraindications:</b><br>Medicol Advance: If the patient has ever had an allergic reaction to ibuprofen, aspirin or other NSAIDs or to any ingredient in the medicine.
                    <br>If the patient has bronchospasm (constriction of air passages of the lungs), angioedema (rapid swelling that occurs in the tissue just below the surface of the skin), nasal polyps or allergic-type reactions after taking aspirin or other NSAIDs.
                    <br>If the patient is taking aspirin or other NSAIDs, lithium or methotrexate.
                    <br>If the patient has had or is suffering from stomach ulcers, bleeding or other stomach problems.
                    <br>Right before or after heart surgery.
                    <br>If the patient has a history of stroke, heart attack, uncontrolled high blood pressure, or congestive heart failure.
                    <br>If the patient has or has ever had kidney disease.
                    <br>If the patient develop signs and symptoms of liver abnormality (e.g., jaundice), stop taking this medicine and consult a doctor.
                    <br>If the patient is pregnant or breastfeeding.</p>
                <p><b>Special Precautions:</b><br>Ibuprofen carries allergy alerts and warnings for severe allergic reactions and stomach bleeding. Symptoms of allergic reaction include hives, facial swelling, and difficulty breathing. Stomach bleeding risk is higher for those aged 60 or older, with a history of ulcers, taking blood thinners, or consuming excessive alcohol. Heart attack or stroke risk may increase if ibuprofen is used excessively. Patients should consult a doctor before use if experiencing serious side effects, have certain health conditions, or are over 60 years old. Stop use and seek medical help if signs of stomach bleeding or allergic reaction occur, if new symptoms arise, or if pain or fever worsens.</p>
                <p><b>Use In Pregnancy & Lactation:</b></br>If the patient is pregnant or breastfeeding, as a doctor before use. It is especially important not to use ibuprofen during the last three months of pregnancy unless definitely directed to do so by a doctor because it may cause problems in the unborn child or complications during delivery.</p>
                <p><b>Adverse Reactions:</b><br>Ibuprofen can cause rare but potentially serious undesirable effects across various body systems. Central nervous system effects may include dizziness, drowsiness, headache, and hallucinations. Gastrointestinal issues can range from stomach ulceration to abdominal pain and diarrhea. Kidney and liver damage, abnormal blood clotting, and cardiovascular complications are also possible. Special senses may be affected, including ringing in the ears and inflammation of the optic nerve. Skin reactions such as rashes and severe allergies like Stevens-Johnson Syndrome can occur. Allergic reactions may manifest with symptoms such as abdominal pain, fever, and chills. It's important to inform a doctor of any undesirable effects experienced.</p>
                <p><b>Storage:</b><br>Store at temperatures not exceeding 25°C.</p>
                <p><b>Dosage:</b><br> <b>Medicol Advance:</b> Like other NSAIDs, the lowest effective dose of ibuprofen should be used for the shortest possible time.This medicine is given orally (by mouth).
                    <br><b>Adults and Children 12 years and older:</b><br> 1 softgel capsule with a glassful of water every 4 to 6 hours as needed, or, as directed by a doctor.
                    <br>Children under 12 years old: Consult a doctor before use.
                    <br>Do not take more than directed.
                    <br>Do not exceed 6 softgel capsules in 24 hours, unless directed by a doctor.
                    <br>Do not take longer than 10 days, unless directed by a doctor.
                    <br>Missed Dose: If the patient misses a dose, take the next dose if still needed for pain and/or fever or inflammation and the subsequent dose every 4 to 6 hours thereafter.
                    <br>Do not double the dose.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <img src="images/bio.jfif" class="card-img-top" alt="Bioflu" style="margin-bottom: 15px;">
    <div class="card-body">
        <h5 class="card-title">Bioflu Tablet 1s (Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol)</h5>
        <h3>Price: PHP 9.00</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["bioflu"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#biofluModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="biofluModal" tabindex="-1" aria-labelledby="biofluModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="biofluModalLabel">Bioflu Tablet 1s (Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>Used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, the common cold, allergic rhinitis, sinusitis, and other minor respiratory tract infections. Help decongest sinus openings and passages.</p>
                <p><b>Overdosage:</b><br><b>Symptoms:</b> Phenylephrine HCl can lead to increased blood pressure, headache, seizures, palpitations, tingling or numbness of the skin, vomiting, and cerebral hemorrhage. Chlorphenamine maleate may cause extreme sleepiness, convulsions, weakness, agitation, hallucinations, tachycardia, and coma. Paracetamol overdose typically progresses through phases including nausea, vomiting, abdominal pain, liver enlargement, and potential liver and kidney failure, with the possibility of fatal liver failure.</p>           
                <p><b>Administration:</b><br>May be taken with or without food: May be given w/ food or milk if stomach upset occurs.</p>
                <p><b>Contraindications:</b><br>If the patient is allergic to any ingredient in the product.
                    <br>If the patient has a history or is suffering from stomach ulcers, bleeding or other stomach problems.
                    <br>The patient has high blood pressure or severe heart disease unless recommended by a doctor.
                    <br>If the patient has anemia, kidney or liver disease unless recommended by a doctor.
                    <br>If the patient is pregnant or breastfeeding.</p>
                <p><b>Special Precautions:</b><br>Bioflu contains paracetamol, phenylephrine, and ibuprofen. Severe liver damage may occur if exceeding the recommended dosages, especially in children or individuals consuming alcohol regularly. There's a risk of increased heart attack or stroke if used excessively. Allergy alert: Ibuprofen may trigger severe allergic reactions, including hives, shock, facial swelling, and asthma. In case of an allergic reaction, stop use immediately and seek medical assistance. It's crucial to avoid combining Bioflu with other medications containing paracetamol, phenylephrine, or ibuprofen. Drowsiness may occur, so caution is advised when driving or performing tasks requiring alertness. Always adhere to the recommended dosage.</p>
                <p><b>Use In Pregnancy & Lactation:</b><br>Contraindicated if the patient is pregnant or breastfeeding.</p>
                <p><b>Adverse Reactions:</b><br>Phenylephrine HCl may cause muscle shaking (tremor), restlessness, feeling of uneasiness (anxiety), insomnia/sleeplessness, nervousness, dizziness, increased blood pressure, palpitation, irregular heartbeat (arrhythmia), weakness, noisy and congested breathing (respiratory distress), and pallor.
                    <br>Chlorphenamine Maleate may cause sleepiness and drowsiness. Other undesirable effects include muscle weakness, gastrointestinal discomfort, nausea, vomiting, diarrhea or constipation, dryness of the mouth, nose, and throat, difficulty urinating, ringing in the ears, visual disturbance, blurred vision, insomnia/sleeplessness, tremor, nervousness, irritability, chest tightness, increased or decreased blood pressure, and headache.
                    <br>Paracetamol, when taken within the recommended dose and duration of treatment, has low incidence of side effects. Skin rashes, hypersensitivity reactions, changes in the number of white blood cells and platelets, and minor stomach and intestinal disturbances have been reported.</p>
                <p><b>Storage:</b><br>Store at temperatures not exceeding 30°C.</p>
                <p><b>Dosage:</b><br> <b>Adults and Children 12 years and older:</b> Orally (by mouth), 1 tablet/capsule every 6 hours, or as recommended by a doctor.
                    <br><b>Missed Dose:</b> If the patient missed a dose, just take the next dose if still needed for the condition being treated, and the subsequent doses at the recommended time or schedule (i.e., every 6 hours).
                    <br>Do not double the dose.</p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/salon10.jpg" class="card-img-top" alt="Salonpas 10pcs">
    <div class="card-body">
        <h5 class="card-title">SALONPAS Methyl Salicylate / L-Menthol / Tocopherol Acetate / Dl-Camphor 36mg / 33mg / 12mg / 7.1mg Medicated Patch 10's</h5>   
        <h3>Price: PHP 62.50</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["salonpas10"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salonpasModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="salonpasModal" tabindex="-1" aria-labelledby="salonpasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="salonpasModalLabel">SALONPAS Methyl Salicylate / L-Menthol / Tocopherol Acetate / Dl-Camphor 36mg / 33mg / 12mg / 7.1mg Medicated Patch 10's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p><b>Indications:</b><br>For relief of aches, pains and inflammations associated with: muscle fatigue, muscle pain, stiff shoulder, backache, bruises, sprains, strains, arthritis, bone fracture and minor frost bite.</p>          
                <p><b>Administration:</b><br>Adults and children 12 years of age and over: Clean and dry affected area. Remove from backing film and apply to affected area not more than 3-4 times daily. Remove after 8 hours. Children under 12 years of age: Consult a doctor.</p>
                <p><b>Special Precautions:</b><br>Do not use on wounds or damaged skin. If you are allergic to aspirin or any ingredients of this product</p>
                <p><b>Storage:</b><br>Store at temperature not exceeding 30℃. Avoid direct sunlight</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/salonpas.jpg" class="card-img-top" alt="Salonpas">
    <div class="card-body">
        <h5 class="card-title">Salonpas Methylsalicylate 105mg Menthol 31.5mg Medicated Patch</h5>   
        <h3>Price: PHP 108.75</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["salonpas20"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salonpasModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="salonpasModal" tabindex="-1" aria-labelledby="salonpasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="salonpasModalLabel">Salonpas Methylsalicylate 105mg Menthol 31.5mg Medicated Patch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>For relief of aches, pains and inflammations associated with: muscle fatigue, muscle pain, stiff shoulder, backache, bruises, sprains, strains, arthritis, bone fracture and minor frost bite.</p>          
                <p><b>Administration:</b><br>Adults and children 12 years of age and over: Clean and dry affected area. Remove from backing film and apply to affected area not more than 3-4 times daily. Remove after 8 hours. Children under 12 years of age: Consult a doctor.</p>
                <p><b>Special Precautions:</b><br>Do not use on wounds or damaged skin. If you are allergic to aspirin or any ingredients of this product</p>
                <p><b>Storage:</b><br>Store at temperature not exceeding 30℃. Avoid direct sunlight</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <img src="images/tempra.jpg" class="card-img-top" alt="Tempra">
    <div class="card-body">
        <h5 class="card-title">Tempra Forte Orange Syrup 250mg 60ml</h5>
        <h3>Price: PHP 154.00</h3>
        <?php  
                echo "<h3>Stock: ";
                foreach ($stocks["tempra"] as $stock) {
                    echo $stock;
                }
                echo "</h3>";
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tempraModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="tempraModal" tabindex="-1" aria-labelledby="tempraModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tempraModalLabel">Tempra Forte Orange Syrup 250mg 60ml</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>Paracetamol (Tempra) is useful for reducing fever and for the temporary relief of minor aches, pains, and discomfort associated with the common colds or flu, inoculations or vaccinations. It is also valuable in reducing pain following tonsillectomy and adenoidectomy.</p>
                <p><b>Overdosage:</b><br><b>Symptoms:</b> Paracetamol overdose symptoms typically progress through phases. Initially, patients may show nonspecific abdominal signs like loss of appetite, nausea, and vomiting, along with pallor, sweating, and weakness. Subsequently, right upper abdominal discomfort, liver enlargement, and decreased urine output may occur. Later stages may involve reappearance of abdominal symptoms, jaundice, decreased blood glucose, and signs of liver failure, potentially leading to acute renal failure and disturbances in cardiac rhythm. Prompt medical attention is crucial, even if symptoms are initially absent, to prevent serious complications like liver failure and ensure appropriate treatment.</p>           
                <p><b>Administration:</b><br>May be taken with or without food.</p>
                <p><b>Contraindications:</b><br>This product should not be given to patients with known allergy to paracetamol or any ingredient in the product. Not intended for long-term use in patients with anemia or with heart, lung, kidney, or liver disease.</p>
                <p><b>Warning:</b><br>If fever persists for more than 3 days (72 hours) or if pain continues for more than 5 days, consult the physician. As with any drug, if the patient is pregnant or nursing a baby, seek the advice of a health professional before using this product.</p>
                <p><b>Special Precautions:</b><br>Paracetamol (acetaminophen) carries risks of hepatic toxicity if adults exceed 4 grams in 24 hours, while in children, hepatic toxicity may occur if more than 5 doses are given in the same timeframe. Patients with liver or kidney issues should consult a doctor before taking paracetamol. Caution is advised in administering paracetamol to malnourished individuals or those with eating disorders. It should not be taken concurrently with other medications containing paracetamol. Consulting a doctor is essential before administering paracetamol, especially if the patient is taking other medications like rifampicin, warfarin, or phenobarbital.</p>
                <p><b>Use In Pregnancy & Lactation:</b><br>As with any drug, if the patient is pregnant or nursing a baby, seek the advice of a health professional before using this product. If rashes or any swelling develops, stop the use of acetaminophen (paracetamol) immediately and consult with the doctor. Signs and symptoms do not improve or new signs develop.</p>
                <p><b>Adverse Reactions:</b><br>Skin rashes, other allergic reactions.</p>
                <p><b>Storage:</b><br>Store at temperatures not exceeding 30°C. Protect from light. When stored below 30°C and protected from light, Paracetamol (Tempra) Tablet & Syrup will remain stable until the expiration date indicated on the package.</p>
                <p><b>Dosage:</b><br>Children 13 years old & above: 10-15 mL (2 to 3 teaspoonfuls)<br>6-12 years old: 5-10 mL (1 to 2 teaspoonfuls)<br>1-5 years old: 2.5-5 mL (half to 1 teaspoonful)<br>All doses to be given 3-4 times daily with or without food, or as directed by the doctor.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <div class="card">
    <img src="images/vapodrops.jpg" class="card-img-top" alt="Vapodrops">
    <div class="card-body">
        <h5 class="card-title">VICKS VapoDrops Lozenges Honey & Lemon 8's</h5>
        <h3>Price: PHP 78.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vicksModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="vicksModal" tabindex="-1" aria-labelledby="vicksModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vicksModalLabel">VICKS VapoDrops Lozenges Honey & Lemon 8's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications</b><br>Vicks VapoDrop Lozenges relieves sore throat, cough, & blocked nose <br> Sore throat often arrive with a cough and blocked nose. Vicks lozenges are formulated to help sooth sore throat, relieve cough and clear blockage.</p>
                <p><b>Storage:</b><br>Store at temperatures not exceeding 30°C.</p>
                <p><b>Dosage:</b>Adults and Children over 6 years: Dissolve 1 lozenge in your mouth every 2 hours as needed.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/strepsils.jpg" class="card-img-top" alt="Strepsils">
    <div class="card-body">
        <h5 class="card-title">Strepsils Orange with Vitamin C Blister Pack 8s</h5>
        <h3>Price: PHP 72.25</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#strepsilsModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="strepsilsModal" tabindex="-1" aria-labelledby="strepsilsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="strepsilsModalLabel">Strepsils Orange with Vitamin C Blister Pack 8s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>For the relief of mouth and throat infections.</p>          
                <p><b>Administration:</b><br>May be taken with or without food.</p>
                <p><b>Action:</b><br>Antibacterial</p>
                <p><b>Storage:</b><br>Store at a temperature not exceeding 30°C. Protect from humidity.</p>
                <p><b>Dosage:</b><br>Dissolve 1 lozenge slowly in the mouth every 2-3 hours, or as directed by the physician. Maximum of 12 lozenges in 24 hours.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/strepsilscool.jpg" class="card-img-top" alt="Strepsils Cool">
    <div class="card-body">
        <h5 class="card-title">STREPSILS Cool Sensation 8s</h5>
        <h3>Price: PHP 72.25</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#strepsilscModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="strepsilscModal" tabindex="-1" aria-labelledby="strepsilscModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="strepsilcsModalLabel">STREPSILS Cool Sensation 8s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>For the relief of mouth and throat infections.</p>          
                <p><b>Administration:</b><br>May be taken with or without food.</p>
                <p><b>Action:</b><br>Antibacterial</p>
                <p><b>Storage:</b><br>Store at a temperature not exceeding 30°C. Protect from humidity.</p>
                <p><b>Dosage:</b><br>Dissolve 1 lozenge slowly in the mouth every 2-3 hours, or as directed by the physician. Maximum of 12 lozenges in 24 hours.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/strepsilssf.jpg" class="card-img-top" alt="Strepsils SugarFree">
    <div class="card-body">
        <h5 class="card-title">STREPSILS Lozenges Sugarfree Lemon 6s</h5>
        <h3>Price: PHP 72.25</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#strepsilssfModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="strepsilssfModal" tabindex="-1" aria-labelledby="strepsilssfModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="strepsilssfModalLabel">STREPSILS Lozenges Sugarfree Lemon 6s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>For the relief of mouth and throat infections.</p>          
                <p><b>Administration:</b><br>May be taken with or without food.</p>
                <p><b>Action:</b><br>Antibacterial</p>
                <p><b>Storage:</b><br>Store at a temperature not exceeding 30°C. Protect from humidity.</p>
                <p><b>Dosage:</b><br>Dissolve 1 lozenge slowly in the mouth every 2-3 hours, or as directed by the physician. Maximum of 12 lozenges in 24 hours.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/strepsilsori.jpg" class="card-img-top" alt="Strepsils Original">
    <div class="card-body">
        <h5 class="card-title">STREPSILS Original 8s</h5>
        <h3>Price: PHP 72.25</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#strepsilsoModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="strepsilsoModal" tabindex="-1" aria-labelledby="strepsilsoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="strepsilsoModalLabel">STREPSILS Original 8s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>For the relief of mouth and throat infections.</p>          
                <p><b>Administration:</b><br>May be taken with or without food.</p>
                <p><b>Action:</b><br>Antibacterial</p>
                <p><b>Storage:</b><br>Store at a temperature not exceeding 30°C. Protect from humidity.</p>
                <p><b>Dosage:</b><br>Dissolve 1 lozenge slowly in the mouth every 2-3 hours, or as directed by the physician. Maximum of 12 lozenges in 24 hours.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/strepsilshl.jpg" class="card-img-top" alt="Strepsils Honey Lemon">
    <div class="card-body">
        <h5 class="card-title">STREPSILS Honey Lemon 8s</h5>
        <h3>Price: PHP 72.25</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#strepsilshlModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="strepsilshlModal" tabindex="-1" aria-labelledby="strepsilshlModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="strepsilshlModalLabel">STREPSILS Honey Lemon 8s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>For the relief of mouth and throat infections.</p>          
                <p><b>Administration:</b><br>May be taken with or without food.</p>
                <p><b>Action:</b><br>Antibacterial</p>
                <p><b>Storage:</b><br>Store at a temperature not exceeding 30°C. Protect from humidity.</p>
                <p><b>Dosage:</b><br>Dissolve 1 lozenge slowly in the mouth every 2-3 hours, or as directed by the physician. Maximum of 12 lozenges in 24 hours.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <img src="images/strepsilsw.jpg" class="card-img-top" alt="Strepsils warm">
    <div class="card-body">
        <h5 class="card-title">STREPSILS Warm 8s</h5>
        <h3>Price: PHP 72.25</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#strepsilswModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="strepsilswModal" tabindex="-1" aria-labelledby="strepsilswModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="strepsilswModalLabel">STREPSILS Warm 8s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b><br>For the relief of mouth and throat infections.</p>          
                <p><b>Administration:</b><br>May be taken with or without food.</p>
                <p><b>Action:</b><br>Antibacterial</p>
                <p><b>Storage:</b><br>Store at a temperature not exceeding 30°C. Protect from humidity.</p>
                <p><b>Dosage:</b><br>Dissolve 1 lozenge slowly in the mouth every 2-3 hours, or as directed by the physician. Maximum of 12 lozenges in 24 hours.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <img src="images/stresstabs.jpg" class="card-img-top" alt="Stresstabs">
    <div class="card-body">
        <h5 class="card-title">Stresstabs Multivitamins + Iron 1s</h5>
        <h3>Price: PHP 8.95</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stresstabsModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
    </div>
</div>

<div class="modal fade" id="stresstabsModal" tabindex="-1" aria-labelledby="stresstabsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stresstabsModalLabel">Stresstabs Multivitamins + Iron 1s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Indications:</b> Multivitamins + Iron (Stresstabs) is indicated for the prevention and treatment of Vitamin B-complex, Vitamin C, Vitamin E, and Iron deficiencies during periods of stress.</p>
                <p><b>Overdosage:</b> <br><b>Symptoms:</b> Diarrhea, nausea, constipation, and abdominal discomfort. In case of accidental overdose, discontinue use and seek medical assistance immediately.</p>           
                <p><b>Administration:</b> May be taken with or without food. May be taken with meals for better absorption.</p>
                <p><b>Contraindications:</b> This product is contraindicated in patients who are allergic (hypersensitive) to its active ingredients or other components of the product.</p>
                <p><b>Special Precautions:</b> Do not exceed the recommended daily dose. Women who are pregnant or breastfeeding should seek the advice of a doctor before using this product. If the patient is taking other vitamin supplements, which may also contain Iron, make sure to read the label to ensure that the patient does not exceed the upper tolerable intake levels of 45 mg/day, both for adults and pregnant women.</p>
                <p><b>Adverse Reactions:</b> When taken as directed, multivitamins and minerals are not expected to cause serious side effects. Less serious side effects may include abdominal discomfort, constipation, diarrhea, nausea, stomach discomfort, and hypersensitivity.</p>
                <p><b>Storage:</b> Store at temperatures not exceeding 30°C.</p>
                <p><b>Dosage:</b> Adult: One tablet daily or as prescribed by a physician.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <img src="images/cottonbuds.jpg" class="card-img-top" alt="Cotton Buds">
    <div class="card-body">
        <h5 class="card-title">Babyflo Gentle Cotton Buds Plastic Stems 108 Tips</h5>
        <h3>Price: PHP 20.50</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cottonBudsModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <h3>Price: PHP 14.10</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cottonBudsModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <h3>Price: PHP 95.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#babywipes10Modal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <h5 class="card-title" style="margin-top: 90px;">SAFEGUARD Fresh Green 130g</h5>
            <h3>Price: PHP 58.00</h3>
            <h3>In Stock</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#safeguardfgModal">
                More Info
            </button>
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
        </div>
    </div>

    <div class="modal fade" id="safeguardfgModal" tabindex="-1" aria-labelledby="safeguardfgModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="safeguardfgModalLabel">SAFEGUARD Fresh Green 130g</h5>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
            <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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


<div class="card">
    <img src="images/thermo.jpg" class="card-img-top" alt="Thermometer">
    <div class="card-body">
        <h5 class="card-title">Omron Digital Thermometer MC-246</h5>
        <h3>Price: PHP 298.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thermoModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <h5 class="card-title">Healmed 3 Ply Surgical Face Mask - 10s</h5>
        <h3>Price: PHP 142.90</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#smaskModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <h5 class="card-title">3M 9513 KN95 Adult Facemask</h5>
        <h3>Price: PHP 55.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#3dmaskModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <h5 class="card-title">Omron HEM 7120 Automatic Blood Pressure Monitor</h5>
        <h3>Price: PHP 2780.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bloodpressureModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <h5 class="card-title">Partners Pregnancy Test</h5>
        <h3>Price: PHP 72.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#/pregnancytestModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
        <h5 class="card-title">Omron NE C801VVV Compressor Nebulizer</h5>
        <h3>Price: PHP 72.00</h3>
        <h3>In Stock</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nebulizerModal">
            More Info
        </button>
        <button class="add-to-cart-btn" onclick="addToCart()">Add to Cart</button>
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



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
        // JavaScript to change status
        function setStatus(isAvailable) {
            const statusElement = document.getElementById('stock-status');
            if (isAvailable) {
                statusElement.textContent = 'In Stock';
                statusElement.className = 'in-stock';
            } else {
                statusElement.textContent = 'Unavailable';
                statusElement.className = 'unavailable';
            }
        }

  
    </script>



<script>
        function toggleDropdown(event) {
            event.preventDefault();
            const dropdownContent = event.target.nextElementSibling;
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                const dropdowns = document.getElementsByClassName('dropdown-content');
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
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
            } 

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

function goToContactPage() {
            window.location.href = 'updateCart.php'; 
            console.log("goToContactPage function called");
        }
  
</script>







</body>
</html>