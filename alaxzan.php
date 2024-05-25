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
        Alaxzan
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



.btn-success {
    background-color: #007bff; 
    border-color: #007bff; 
    color: #fff; 
    padding: 10px 20px; 
    font-size: 16px; 
    border-radius: 5px; 
    cursor: pointer; 
    margin-left: 1px;
    margin-bottom: 10px;
    text-decoration: none;
}

body {
  margin-top: 20px;
}


.card {
  border: none;
 margin-top: 200px;
 border-radius: 10px;
 box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
 
}
.card-img {
  border-radius: 0;
}

.vgr-cards {
  .card {
    display: flex;
    flex-flow: wrap;
    flex: 100%;
    margin-bottom: 40px;

    &:nth-child(even) .card-img-body {
      order: 2;
    }

    &:nth-child(even) .card-body {
      padding-left: 0;
      padding-right: 1.25rem; 
    }
    
    @media (max-width: 576px) {
      display: block;
    }
    
  }

  .card-img-body {
    flex: 1;
    overflow: hidden;
    position: relative;
    
    @media (max-width: 576px) {
      width: 100%;
      height: 200px;
          margin-bottom: 20px;
    }
    
  }
  
  .card-img {
    width: 100%;
    height: auto;
    position: absolute;
    margin-left: 50%;
    transform: translateX(-50%);
    
    @media (max-width: 1140px) {
          margin: 0;
    transform: none;
    width: 100%;
    height: auto;
    }
    
  }

  .card-body {
    flex: 2;
    padding: 0 0 0 1.25rem;
    
    @media (max-width: 576px) {
      padding: 0;
    }
    
  }
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


        <div class="container">
  <div class="card-group vgr-cards">
    <div class="card">
      <img class="card-img-top" src="images/alax.jpg" alt="Alaxzan">
      <div class="card-body">
        <h4 class="card-title" style="margin-top: 50px;">Alaxzan</h4>
        <p class="card-text">Ibuprofen + Paracetamol (Alaxan® Tablet and Alaxan® FR) 
                is used for the relief of mild to moderately<br>severe pain of muscoskeletal 
                origin such as muscle pain (myalgia), arthritis, rheumatism, sprain, strain,<br>bursitis
                (inflammation of the fluid-filled sac or bursa that lies between a tendon and skin), tendonitis
          </p>
          <button href="" class="btn btn-success " style="margin-top: 25px;" >Primary</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>