<?php
 require '../../config/classes/DB.php';
  require '../../config/classes/Farm.php';
  require '../../config/classes/Session.php';
  require '../../config/classes/Transaction.php';
  require '../../config/classes/User.php';
  Session::init();
  if (Session::get('isLoggedIn') == false) {
      header('Location: ../../login.php');
  }

  if ($_POST['addfarm'] == 1) {
    
$image = $_FILES['image']['name'];
//make the file unique.....
$new = uniqid('', true). '.' . $image;

$target = "images/".basename($new);

   DB::query('INSERT INTO `farm`( `name`, `duration`, `roi`, `amount`, `unit`, image, `status`) VALUES (:name,:duration,:roi,:amount,:unit,:image,:status)', array(':name' =>$_POST['name'],':duration' =>$_POST['duration'],':roi' =>$_POST['roi'], ':amount' =>$_POST['amount'], ':unit' =>$_POST['unit'], ':image'=>$new, ':status' =>'ACTIVE' ));
   move_uploaded_file($_FILES['image']['tmp_name'], $target);

  $msg = '<br><div class="alert alert-success"><center>'.$_POST['name'].' has been added! </center></div>';
  };

  if ($_POST['delete']) {
    DB::query('DELETE FROM farm WHERE id=:id', array(':id'=>$_POST['id']));
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
    Add Farm - Farmmonie
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
              <p>Admin Profile</p>
            </a>
          </li>
          <li>
            <a href="notifications.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
         
          <li>
            <a href="orders.php">
              <i class="nc-icon nc-bag-16"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="active">
            <a href="managefarm.php">
              <i class="nc-icon nc-bag-16"></i>
              <p>Manage Farms</p>
            </a>
          </li>
          <li>
            <a href="stories.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>See Stories</p>
            </a>
          </li>
          <li>
            <a href="completedorder.php">
              <i class="nc-icon nc-box"></i>
              <p>Completed Orders</p>
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
            <a class="navbar-brand" href="#">Manage Farms</a>
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
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
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
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-zoom-split text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Total Farms</p>
                      <p class="card-title"><?php echo count(Farm::totalFarm()); ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <div class="update ml-auto mr-auto">
                      <a href="searchresult.html" class="btn btn-primary btn-round">Search Farm</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  
                  <div class="px-6 col-lg-12">
                  <div class="p-0 card-body">
                    
                      <div class="bg-primary-lite p-5 col-md-12">
                        <div class="mb-12">
                          <h2>Add Farm</h2>
                        </div>
                        <form action="managefarm.php" method="post" enctype="multipart/form-data">
                     
                           
                             <div class="form-group">
                              <input type="text" name="name" class="form-control" placeholder="Farm Name" required="">
                                <br>
                               <input type="text" name="duration" class="form-control" placeholder="Duration" required="">
                                <br>
                                <input type="text" name="roi" class="form-control" placeholder="Returns %" required="">
                                <br>
                                <input type="text" name="amount" class="form-control" placeholder="Total Amount" required="">
                                <br>
                                 <input type="text" name="unit" class="form-control" placeholder="Total Units" required="">

                            </div>
                         
                          <hr>
                          <div class="mb-6">
                              <div class="row">
                                <span class="font-weight-boldish">Upload picture of farm</span>
                                <br>
                               <input type="file" class="form-control" name="image" id="fileToUpload">
                              </div>
                               <?php if ($_POST) { echo $msg; } ?>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="text-right col">
                              <input type="hidden" name="addfarm" value="1">
                              <input type="submit" class="btn-round font-weight-bold  btn btn-primary" value="Add Farm" />
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
        </div>

        <!---Tables--->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Recent Farms</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Farm
                      </th>
                      <th>
                        Duration
                      </th>
                      <th>
                        ROI
                      </th>
                      <th>
                        Amount
                      </th>
                      <th>
                        Unit
                      </th>
                      <th>
                        Status
                      </th>
                    </thead>
                    <tbody>
                      <?php $info =Farm::farms();
                      foreach ($info as $value) {?>
                      <tr>
                        <td>
                          <?php echo $value['name']?>
                        </td>
                        <td>
                           <?php echo $value['duration']?>
                        </td>
                        <td>
                           <?php echo $value['roi']?>
                        </td>
                        <td>
                          <?php echo $value['amount']?>
                        </td>
                        <td>
                        <?php echo $value['unit']?>
                        </td>
                        <td>
                         <?php echo $value['status']?>
                        </td>
                        <td>
                          <form action="managefarm.php" method="post">
                          <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                          <input type="submit" name="delete" class="btn btn-danger btn-round" value="Delete"/>
                          </form>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- end of Table-->


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