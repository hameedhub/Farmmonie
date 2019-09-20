<?php
require '../../config/classes/Session.php';
require '../../config/classes/DB.php';
require '../../config/classes/User.php';
Session::init();
if (Session::get('isLoggedIn') == false) {
    header('Location: ../../login.php');
}
if ($_POST) {
    # code...
    DB::query('UPDATE `users` SET `fullname`=:fullname,`phone`=:phone,`address`=:address, account_holder_name=:account_holder_name, `bank_name`=:bank_name,`bank_account`=:bank_account WHERE id = :id', array(':fullname'=>$_POST['fullname'],':phone'=>$_POST['phone'], ':address'=>$_POST['address'], ':account_holder_name'=> $_POST['account_holder_name'], ':bank_name'=>$_POST['bank_name'], ':bank_account'=>$_POST['bank_account'], ':id'=>$_SESSION['user']));
     $msg = '<br><div class="alert alert-success"><center>Changes were saved! </center></div>';
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
    Profile - Farmmonie
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
           <li class="active">
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
         
          <li>
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
            <a class="navbar-brand" href="#">User Profile</a>
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
      <!-- <div class="panel-header panel-header-sm">
  
  
</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="..." style="height: 130px; width: 330px;">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                  </a>
                  <p class="description text-center">
                  Name : <?php echo User::data()['fullname'] ?>
                  </p>
                </div>
                <p class="description text-center">
                  Phone Number : <?php echo User::data()['phone'] ?>
                </p>
                <p class="description text-center">
                  Address : <?php echo User::data()['address'] ?>
                </p>
                 <p class="description text-center">
                  Bank : <?php echo User::data()['bank_name'] ?>
                </p>
                 <p class="description text-center">
                  Account Number : <?php echo User::data()['bank_account'] ?>
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
               
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="user.php" method="post">
                  
                    <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" value="<?php echo User::data()['fullname'] ?>" name="fullname" class="form-control" placeholder="First Name (Same as Account Number)" value="">
                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input name="phone" value="<?php echo User::data()['phone'] ?>" type="phone" class="form-control" placeholder="Phone Number">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" value="<?php echo User::data()['address'] ?>" name="address" class="form-control" placeholder="Home Address" value="House Number, Street, Town">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Account Holder Name</label>
                        <input type="text" value="<?php echo User::data()['account_holder_name']?>" name="account_holder_name" class="form-control" placeholder="Enter Account Holder Name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" value="<?php echo User::data()['bank_name'] ?>" name="bank_name" class="form-control" placeholder="Bank Name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Bank Account Number</label>
                        <input type="number" value="<?php echo User::data()['bank_account'] ?>" name="bank_account" class="form-control" placeholder="Bank Account Number">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <?php if ($_POST) { echo $msg;} ?>
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Update Account Information</button>
                    </div>
                  </div>
                </form>
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
</body>

</html>