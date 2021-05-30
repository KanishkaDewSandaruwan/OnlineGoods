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
          <li class=""><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item "><a href="customer.php"><i class="fas fa-home"></i><span class="menu-title" data-i18n="">Customer</span></a>
          </li>
          <li class=" nav-item"><a href="cat.php"><i class="fas fa-th-list"></i><span class="menu-title" data-i18n="">Category</span></a>
          </li>
          <li class=" nav-item"><a href="product.php"><i class="fas fa-box"></i><span class="menu-title" data-i18n="">Products</span></a>
          </li>
          <li class=" nav-item active"><a href="order.php"><i class="fas fa-calendar-week"></i><span class="menu-title" data-i18n="">Orders</span></a>
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
        <div class="content-body">
          <h1 class="p-5 text-dark text-uppercase " style="font-weight: bold;">Order List</h1>
                                    <div class="row mt-1  ">
                                 <?php   
                                        
                                        $viewquery = " SELECT * FROM getorder";
                                        $viewresult = mysqli_query($con,$viewquery);

                                        

                                 ?>
                              
                                  <?php 
                                        while($row1 = mysqli_fetch_assoc($viewresult)) { ?>

                                        <div class="row" style="padding: 2%;  margin: 1%; color: #00394e; background-color: #f9f6f7">

                                          <div class="dropdown-divider"></div>
                                          <div class="col-sm-6 justify-content-left mt-5">
                                            <?php   
                                              $dlist = $row1['products'];

                                               $stri = explode(',', $dlist);
                                               $count = 0;
                                               // $arrlength=strlen($stri);


                                            foreach ($stri as $s){

                                                $getDetail_Query = "SELECT * FROM product where product_id ='".$s."' ";
                                                $getResult = mysqli_query($con,$getDetail_Query);

                                                if($row4 = mysqli_fetch_assoc($getResult)){ 
                                                $image = $row4['image'];
                                                $image_src = "../upload/product/".$image;

                                                ?>
                                                <div class="row">
                                                  <div class="col-md-6 mt-3">
                                                    <img width="100%" src="<?php echo $image_src; ?>" >
                                                  </div>
                                                  <div class="col-md-6">
                                                    <p><?php echo $row4['product_name']; ?></p>
                                                  </div>
                                                </div>
                                                 
                                            <?php }  $count++; }?>
                                          </div>
                                          <div class="col-sm-4 mt-5">
                                            <p>Rs. <?php echo $row1['total']; ?></p>
                                            <p><?php echo $row1['address']; ?></p>  
                                            <p><?php echo $row1['trn_date']; ?></p>
                                            <p>Progress : <?php echo $row1['status']; ?></p>
                                          </div>
                                          <div class="col-sm-1 mt-5">
                                           <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  
                                                  <a class="dropdown-item" href="orderchange.php?accept=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Accept</a>
                                                  <a class="dropdown-item" href="orderchange.php?shiped=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Shipped</a>
                                                  <a class="dropdown-item" href="orderchange.php?diliverd=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Diliverd</a>
                                                  <a class="dropdown-item" href="orderchange.php?paided=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Paid</a>
                                                  <a class="dropdown-item" href="orderchange.php?reject=<?php echo $row1['order_id']; ?>"><i class="fas fa-trash-alt"></i> Reject</a>
                                                  <a class="dropdown-item" href="orderchange.php?deletecomplete=<?php echo $row1['order_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                </div>
                                              </div>

                                        </div>
                                        </div>
                                        
                                        <?php  $count++;
                                          
                                        
                                      }
                                   ?>
                                        
                      </div>
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