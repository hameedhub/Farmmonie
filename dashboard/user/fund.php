<?php
require '../../config/classes/Session.php';
require '../../config/classes/DB.php';
require '../../config/classes/User.php';
require '../../config/classes/Farm.php';
require '../../config/classes/Transaction.php';
Session::init();
if (Session::get('isLoggedIn') == false) {
    header('Location: ../../login.php');
}

$values = Farm::farmByID($_GET['id'])[0];
if (Farm::status($_GET['id'])) {
  header('Location: farms.php');
}

?>
<!DOCTYPE html>
<html lang="en">
ß
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $values['name'] ?> - Farm
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
          <li>
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
              <div class="px-4 col-lg-12">
                <?php if(Transaction::checkPending()){ echo '<br><div class="alert alert-danger"><center> Please, you have to complete your pending transaction before you can buy any farm unit </center></div>';} ?>
                <div class="card">
                  <div class="p-0 card-body">
                    <div class="row">
                      <div class="p-5 col-md-5">
                        <div class="mb-4 row">
                          <div class="col">
                            <span class="text-muted small">Farm Selected</span>
                            <br>
                            <span class="font-weight-boldish"><?php echo $values['name'] ?></span>
                          </div>
                        </div>
                        <div class="mb-4 row">
                          <div class="col">
                            <span class="text-muted small">Price</span>
                            <br><span class="font-weight-boldish">₦ <?php echo $values['amount']/$values['unit']; ?></span>
                          </div>
                          <div class="col">
                            <span class="text-muted small">Returns</span>
                            <br>
                            <span class="font-weight-boldish"><?php echo $values['roi'] ?>%</span>
                          </div>
                          <div class="col">
                            <span class="text-muted small">Profit</span>
                            <br>
                            <span class="font-weight-boldish">₦ <?php echo $values['amount']/$values['unit'] * $values['roi']/100  ?></span>
                          </div>
                        </div>
                        <div class="mb-4 row">
                          <div class="col">
                            <span class="text-muted small">Poultry Size</span>
                            <br>
                            <span class="font-weight-boldish">30000 Birds</span>
                          </div>
                        </div>
                        <div class="mb-4 row">
                          <div class="col">
                            <span class="text-muted small">Duration</span>
                            <br>
                            <span class="font-weight-boldish">6 months</span>
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
                              <div class="col">
                                <select onchange="calTrans(true)" class="form-control">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                                <br>
                                <span class="text-muted small">Unit Price</span>
                                <br>
                                <span class="font-weight-boldish">₦ <?php echo $values['amount']/$values['unit']; ?></span>
                              </div>
                              <div class="col">
                                <span class="text-muted small">ROI for this Farm</span>
                                <br>
                                <span class="font-weight-boldish"><?php echo $values['roi'] ?>%</span>
                              </div>
                              <div class="col">
                                <span class="text-muted small">Duration</span>
                                <br>
                                <span class="font-weight-boldish"><?php echo $values['duration'] ?> months</span>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col">
                                <?php if(Transaction::checkPending()){
                                  echo "Hi";
                                }else{
                                  echo "No";
                                } ?>
                                <span class="text-muted small">Total Price</span>
                                <br>
                                <span class="font-weight-boldish" id="price">₦ 50, 000</span>
                              </div>
                              <div class="col">
                                <span class="text-muted small">Total Returns</span>
                                <br>
                                <span class="font-weight-boldish" id="return">₦ 9, 000</span>
                              </div>
                              <div class="col">
                                <span class="text-muted small">Total Payout</span>
                                <br>
                                <span class="font-weight-boldish" id="pay">₦ 59, 000</span>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col">
                              <a class="btn" href="farms.php">
                                Go Back
                              </a>
                            </div>
                            <div class="text-right col">
                              <input type="submit" <?php if(Transaction::checkPending()){ echo "disabled";} ?>  class="btn-round font-weight-bold  btn btn-primary" value="Pay Online">
                            </div>
                            <div class="text-right col">
                              <?php if(!Transaction::checkPending()){ ?>
                              <a id="offline" href="#" style="color: #106b31">Pay by Deposit/Transfer</button>
                              <?php }?>
                            </div>
                          </div>
                          <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $_GET['id']?>">
                          <input type="hidden" name="amount" id="amount">
                          <input type="hidden" name="unit" id="unit">
                          <input type="hidden" name="total_amount" id="total_amount" >
                          <input type="hidden" name="total_roi" id="total_roi" >
                          <input type="hidden" name="payout" id="payout">
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
  <script type="text/javascript">
    if (calTrans=true) {
       calTrans=()=>{
      let e = document.querySelector('select');
      selected = e.options[e.selectedIndex].value;
      let unit = document.querySelector('#unit').value=selected;
      const amount = document.querySelector('#amount').value=<?php echo $values['amount']/$values['unit']; ?>;
    
    const total_amount = document.querySelector('#total_amount').value=amount * unit;
    const total_roi = document.querySelector('#total_roi').value=<?php echo $values['amount']/$values['unit'] * $values['roi']/100  ?> * unit;
    const payout =document.querySelector('#payout').value=total_amount+total_roi;

    document.querySelector('#price').textContent=`₦ ${total_amount}`;
    document.querySelector('#return').textContent=`₦ ${total_roi}`;
    document.querySelector('#pay').textContent=`₦ ${payout}`;
    const farm_id = document.querySelector('#farm_id').value;
    const hash = Math.random()*999;

    const url = `fundtransfer.php?id=${farm_id}&${hash}&j=${amount}&0=${total_amount}&${hash}&x=${total_roi}&${hash}&y=${payout}&${hash}&u=${unit}`;
    let offline = document.querySelector('#offline');
    offline.addEventListener('click', (e) => {
     e.preventDefault();
     window.location=url;
    });
    
   }
 }

    const amount = document.querySelector('#amount').value=<?php echo $values['amount']/$values['unit']; ?>;
    const unit = document.querySelector('#unit').value=1;
    const total_amount = document.querySelector('#total_amount').value=amount * unit;
    const total_roi = document.querySelector('#total_roi').value=<?php echo $values['amount']/$values['unit'] * $values['roi']/100  ?> * unit;
    const payout =document.querySelector('#payout').value=total_amount+total_roi;

    ///
    document.querySelector('#price').textContent=`₦ ${total_amount}`;
    document.querySelector('#return').textContent=`₦ ${total_roi}`;
    document.querySelector('#pay').textContent=`₦ ${payout}`;
    const farm_id = document.querySelector('#farm_id').value;
    const hash = Math.random()*999;

    const url = `fundtransfer.php?id=${farm_id}&${hash}&j=${amount}&0=${total_amount}&${hash}&x=${total_roi}&${hash}&y=${payout}&${hash}&u=${unit}`;
    let offline = document.querySelector('#offline');
    offline.addEventListener('click', (e) => {
     e.preventDefault();
     window.location=url;
    });
    
  </script>
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