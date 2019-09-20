<?php
require '../../config/classes/Session.php';
require '../../config/classes/DB.php';
require '../../config/classes/User.php';
require '../../config/classes/Farm.php';
require '../../config/classes/Transaction.php';
Session::init();
if (Session::get('isLoggedIn') == false) {
    header('Location: ../../login.php');
};
if (!isset($_GET['id'])) {
    header('Location: farms.php');
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
    Payment - Farmonie
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
         
          <li class="active">
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
          <li >
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
                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <div class="px-4 col-lg-12">
                <div class="card">
                  <div class="p-0 card-body">
                    <div class="row">
                      <div class="p-5 col-md-5">
                        <div class="mb-4 row">
                          <div class="col">
                            <img src="../assets/img/download.png">
                          </div>
                        </div>
                        <div class="mb-4 row">
                          <div class="col">
                            <span class="text-muted medium">Account Name:</span>
                            <br><span class="font-weight-boldish">SmartAgro Technologies Limited</span>
                          </div>
                        </div>
                        <div class="mb-4 row">
                          <div class="col">
                               <span class="text-muted medium">Account Number:</span>
                            <br><span class="font-weight-boldish">1021936084</span>
                          </div>
                        </div>
                      </div>
                      <div class="bg-primary-lite p-5 col-md-7">
                        <div class="mb-3">
                          <span>PAYMENT CONFIRMATION</span>
                        </div>
                        <form action="sendstories.php" method="post">
                          <div class="mb-3">
                            <div class="row">
                              <div class="form-group">
                                
                              </div>
                            </div>
                             <div class="form-group">
                              <input type="text" class="form-control" name="fullname" value="<?php echo User::data()['fullname']; ?>" placeholder="Full Name">
                               </div>
                               <div class="form-group">
                                <input type="date" required  name="date_paid"  class="form-control">
                              </div>
                               <div class="form-group">
                                <input type="text" class="form-control" required name="amount_paid" value="<?php echo $_GET[0]; ?>" placeholder="Amount Paid">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="ref_num" placeholder="Teller/Reference Number">
                              </div>
                              <div class="">
                                <label>Upload Teller or Screenshot of Transfer</label>
                                <input type="file" class="form-control" name="image" id="fileToUpload">
                            </div>
                          </div>
                          <hr>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col">
                                <span class="font-weight-boldish"></span>
                              </div>
                              <div class="col">
                               
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col">
                              <a class="btn" href="fund.">
                                Go Back
                              </a>
                            </div>
                            <input type="hidden" name="farm_id" value="<?php echo $_GET['id']?>">
                          <input type="hidden" name="amount" value="<?php echo $_GET['j']?>">
                          <input type="hidden" name="unit" value="<?php echo $_GET['u']?>">
                          <input type="hidden" name="total_amount" value="<?php echo $_GET[0]?>" >
                          <input type="hidden" name="total_roi" value="<?php echo $_GET['x']?>" >
                          <input type="hidden" name="payout" value="<?php echo $_GET['y']?>">
                            <div class="text-right col">
                              <input type="submit" class="btn-round font-weight-bold  btn btn-primary" value="Submit Payment Information" />
                            </div>
                          </div>
                           
                        </form>
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