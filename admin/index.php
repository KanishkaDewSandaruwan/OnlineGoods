<?php require_once "head.php"; ?>

    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="Chameleon admin logo" src="../img/logo.jpeg"/>
              <h3 class="brand-text">Ceylon Marine</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item"><a href="customer.php"><i class="fas fa-home"></i><span class="menu-title" data-i18n="">Customer</span></a>
          </li>
          <li class=" nav-item"><a href="cat.php"><i class="fas fa-th-list"></i><span class="menu-title" data-i18n="">Category</span></a>
          </li>
          <li class=" nav-item"><a href="product.php"><i class="fas fa-box"></i><span class="menu-title" data-i18n="">Products</span></a>
          </li>
          <li class=" nav-item"><a href="order.php"><i class="fas fa-calendar-week"></i><span class="menu-title" data-i18n="">Orders</span></a>
          </li>
          <li class=" nav-item"><a href="message.php"><i class="fas fa-envelope"></i><span class="menu-title" data-i18n="">Message</span></a>
          </li>
          <li class=" nav-item"><a href="settings.php"><i class="fas fa-cogs"></i><span class="menu-title" data-i18n="">Settings</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Chart -->
<div class="row match-height">
</div>
<!-- Chart -->
<!-- eCommerce statistic -->
<div class="row">

   <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i style="font-size: 50px" class="fab fa-product-hunt"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <?php $count = 0;
                      $sales = 0;
                      $viewquery = " SELECT * FROM product";
                      $viewresult = mysqli_query($con,$viewquery); 
                      $reject = mysqli_num_rows($viewresult);
                      ?>
                      <p class="card-category">Total Products</p>
                      <p class="card-title"><?php echo $reject; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  See Products
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i style="font-size: 50px" class="fas fa-users"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <?php $count = 0;
                    $sales = 0;
                    $viewquery = " SELECT * FROM customer";
                    $viewresult = mysqli_query($con,$viewquery); 
                    $customers = mysqli_num_rows($viewresult);
                    ?>
                      <p class="card-category">Customer Base</p>
                      <p class="card-title"><?php echo $customers; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fas fa-users"></i>
                  Total Customers
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i style="font-size: 50px" class="fas fa-calendar-week"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <?php $count = 0;
                    $sales = 0;
                    $viewquery = " SELECT * FROM getorder where status = 'Paid'";
                    $viewresult = mysqli_query($con,$viewquery); 
                    $sales = mysqli_num_rows($viewresult);
                    ?>
                      <p class="card-category">Completed Orders</p>
                      <p class="card-title"><?php echo $sales; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                 <i class="fas fa-shopping-cart"></i>
                  Total Complete
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i style="font-size: 50px" class="fas fa-coins"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <?php $count = 0;
                    $full_total = 0;
                    $viewquery = " SELECT * FROM getorder";
                    $viewresult = mysqli_query($con,$viewquery); 
                      
                      while($row1 = mysqli_fetch_assoc($viewresult)) { 

                            if ($row1['status'] == 'Paid') { 
                                $full_total = $full_total + $row1['total'];
                            }
                            $count++; 
                        }?>
                      <p class="card-category">Total Orders Earning</p>
                      <p class="card-title">Rs. <?php echo $full_total; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fas fa-coins"></i>
                  Earning
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
<!--/ eCommerce statistic -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.Ceylon Marine Distributors( Hardware & PVC) | Created By : SILVA L.W.N SEU/IS/16/MIT/105</a></span>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>