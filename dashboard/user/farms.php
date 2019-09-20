<?php
require '../../config/classes/Session.php';
require '../../config/classes/DB.php';
require '../../config/classes/User.php';
require '../../config/classes/Farm.php';
Session::init();
if (Session::get('isLoggedIn') == false) {
    header('Location: ../../login.php');
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Farms - Farmmonie
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
       <div class="logo">
          <img src="../assets/img/logo-small.png">
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
           <li>
            <a href="user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="notifications.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
         
          <li  class="active">
            <a href="farms.php">
              <i class="nc-icon nc-bag-16"></i>
              <p>Farms</p>
            </a>
          </li>
          <li>
            <a href="fundhistory.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Funding History</p>
            </a>
          </li>
          <li>
            <a href="transactions.php">
              <i class="nc-icon nc-credit-card"></i>
              <p>Transactions</p>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="nc-icon nc-minimal-left"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <p>Account</p>
                  <i class="nc-icon nc-settings-gear-65"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="user.php">Profile</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
  
  <canvas id="bigDashboardChart"></canvas>
  
  
</div> -->
      <div class="content">
        <div class="row">

          <?php 
            $value= Farm::farms();
          foreach ($value as $info) {?>

          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="..." style="height: 200px; width: 500px;">
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-7 col-md-8">
                    <div>
                      <p style="color: #106b31;"><strong><?php echo $info['name'] ?></strong></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <p><strong>Duration: </strong><?php echo $info['duration'] ?> months</p>
                <p><strong>Returns: </strong><?php echo $info['roi'] ?> %</p>
                <p><strong>Price: </strong>₦ <?php echo $info['amount']/$info['unit'] ?></p>
                <hr>
                <div class="stats">
                  <div class="update ml-auto mr-auto">
                    <?php
                    if (Farm::status($info['id'])) {
                      echo '<button disabled class="btn btn-primary btn-round">Sold Out</button>';
                    }else{
                     ?>
                      <a href="fund.php?id=<?php echo $info['id'] ?>" class="btn btn-primary btn-round">Fund Farm</a>
                    <?php } ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ;?>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="..." style="height: 200px; width: 500px;">
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-7 col-md-8">
                    <div>
                      <p style="color: #106b31;"><strong>Poultry Farm in Tembogoa, Benin City</strong></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <p><strong>Duration: </strong>6 Months</p>
                <p><strong>Returns: </strong>15%</p>
                <p><strong>Price: </strong>₦50, 000</p>
                <hr>
                <div class="stats">
                  <div class="update ml-auto mr-auto">
                      <a href="fund.html" class="btn btn-primary btn-round">Fund Farm</a>
                    </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
               
              </ul>
            </nav>
            <div class="credits ml-auto">
              
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>