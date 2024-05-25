<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>
        User
    </title>
    <link rel="shortcut icon" href="images/mlog.jpg">
</head>
<style>
.dashboard {
    display: flex;
    justify-content: space-around; 
}

.dash-content {
    display: inline-flex; 
    gap: 20px; 
    margin-left: 25px;
    
}

.card-wrapper {
    margin-right: 25px;
    width: 18rem; 
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
 
.card-move{
    margin-left: 5px;
}



.card {
    border-radius: 10px; 
    margin: 0; 
    overflow: hidden; 
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card img {
    width: 100%; 
    height: auto; 
}

.btn-success {
    background-color: #007bff; 
    border-color: #007bff; 
    color: #fff; 
    padding: 10px 20px; 
    font-size: 16px; 
    border-radius: 5px; 
    cursor: pointer; 
    margin-left: 8px;
    margin-bottom: 10px;
    text-decoration: none;
}


</style>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/mlog.jpg" alt="MCISLogo">
            </div>

            <span class="logo_name">MCIS</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="user.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="usermeds.php">
                    <i class="uil uil-capsule"></i>
                    <span class="link-name">Medicine</span>
                </a></li>
                <li><a href="userpharmacy.php">
                <i class='uil uil-building'></i>
                    <span class="link-name">Pharmacy</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="index.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>


            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/storm.jfif" alt="stormtropper">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-capsule"></i>
                    <span class="text">Medicine</span>
                </div>

<div class="dash-content">
<div class="card-wrapper">
        <div class="card" style="width: 18rem;">
            <img src="images/alax.jpg" alt="Alaxzan">
            <div class="card-body">
                <h2 class="card-move">ALAXZAN</h2>
                <p class="card-move">Paracetamol Ibuprofen 325mg/200mg Capsule 1 Capsule</p><br><br><br>
                <h3 class="card-move">Stocks: 32</h3><br>
                <h3 class="card-move"> PHP 8.75</h3><br>
                <a href="alaxzan.php" class="btn btn-success" style="margin-top: 30px;">View</a>
            </div>
        </div>
 </div>
<div class="card-wrapper">
    <div class="card" style="width: 18rem;">
        <img src="images/neo.jpg" alt="Neozep">
            <div class="card-body">
                <h2 class="card-move">NEOZEP</h2>
                <p class="card-move">Paracetamol +Phenylephrine Hydrochloride 1 Tablet 10mg/500mg Tablet</p><br><br>
                <h3 class="card-move">Stocks: 42</h3><br>
                <h3 class="card-move">Price: PHP 8.75</h3><br>
                <button href="" class="btn btn-success " style="margin-top: 25px;">View</button>
            </div>
        </div>
</div>
<div class="card-wrapper">
     <div class="card" style="width: 18rem;">
         <img src="images/decol.jfif" alt="Decolgen">
            <div class="card-body">
                <h2 class="card-move">DECOLGEN</h2>
                <p class="card-move">Phenylephrine HCl 10mg Paracetamol 500mg Chlorphenamine maleate 2mg Tablet 1 Tablet</p><br>
                <h3 class="card-move">Stocks: 55</h3><br>
                <h3 class="card-move">Price: PHP 8.00</h3><br>
                <button href="" class="btn btn-success " style="margin-top: 25px; margin-bottom: 3px;">View</button>
            </div>
        </div>
</div>
<div class="card-wrapper">
     <div class="card" style="width: 18rem;">
         <img src="images/bio.jfif" alt="Bioflu">
            <div class="card-body">
                <h2 class="card-move">BIOFLU</h2>
                <p class="card-move">Bioflu Tablet Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol</p><br><br>
                <h3 class="card-move">Stocks: 79</h3><br>
                <h3 class="card-move">Price: PHP 9.00</h3><br>
                <button href="" class="btn btn-success " style="margin-top: 35px;">View</button>
            </div>
        </div>
</div>
</div>
<div class="dash-content">
<div class="card-wrapper">
     <div class="card" style="width: 18rem;">
         <img src="images/bio.jfif" alt="Bio">
            <div class="card-body">
                <h2 class="card-move">BIOFLU</h2>
                <p class="card-move">Bioflu Tablet Phenylephrine HCI + Chlorphenamine Maleate + Paracetamol</p><br>
                <h3 class="card-move">Stocks: 22</h3><br>
                <h3 class="card-move">Price: PHP 9.00</h3><br>
                <button href="" class="btn btn-success " style="margin-top: 23px;">View</button>
            </div>
        </div>
    </div>
<div class="card-wrapper">
     <div class="card" style="width: 18rem;">
         <img src="images/gavi.jpg" alt="Gaviscon">
            <div class="card-body">
                <h2 class="card-move">GAVISCON</h2>
                <p class="card-move">GAVISCON Double Action Liquid Sachet 10ml </p><br>
                <h3 class="card-move">Stocks: 7</h3><br>
                <h3 class="card-move">Price: PHP 40.00</h3><br>
                <button href="" class="btn btn-success " style="margin-top: 23px;">View</button>
            </div>
        </div>
    </div>
<div class="card-wrapper">
     <div class="card" style="width: 18rem;">
         <img src="images/mefe.jfif" alt="Mefenamic">
            <div class="card-body">
                <h2 class="card-move">Mefenamic Acid</h2>
                <p class="card-move">Ritemed® Mefenamic Acid 500mg Tablets </p><br>
                <h3 class="card-move">Stocks: 85</h3><br>
                <h3 class="card-move">Price: PHP 475.00</h3><br>
                <button href="" class="btn btn-success " style="margin-top: 34px;">View</button>
            </div>
        </div>
    </div>
    <div class="card-wrapper">
     <div class="card" style="width: 18rem;">
         <img src="images/robi.jfif" alt="ROBITUSSIN">
            <div class="card-body">
                <h2 class="card-move">ROBITUSSIN</h2>
                <p class="card-move">Dextromethrophan Guaifenesin 120mL </p><br>
                <h3 class="card-move">Stocks: 30</h3><br>
                <h3 class="card-move">Price: PHP 198.50</h3><br>
                <button href="" class="btn btn-success " style="margin-top: 23px;">View</button>
            </div>
        </div>
    </div>
</div>




     
    </section>

    <script src="script.js"></script>
</body>
</html>