<?php require_once "head.php"; 
require_once "user.php";  ?>
    <main>
        <!--? Hero Area Start-->
        <?php 
            $home_query = "SELECT * FROM details";
            $home_query_result = mysqli_query($con, $home_query);
            $row = mysqli_fetch_assoc($home_query_result);
            $bottom_banner_01 = $row['subpage_image'];
            $image_src1 = "upload/home/".$bottom_banner_01; ?>
        <!-- Hero Area Start-->

        <style type="text/css">
            .slider-height2{
                background-image:url(<?php echo $image_src1; ?>);
                min-height:500px;
                background-repeat:no-repeat;
                background-position:center center}
        </style>
  <main>
      <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2 class="text-white">My Order List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <section class="cart_area section_padding">
        <div class="container-fluid">
                      <div class="row  ml-3 ">
                            <div class="col-md-12 border border-round">
                              <?php   
                                            $getID = $_SESSION['customer_id'];
                                            $count = 0;

                                            $viewquerys = " SELECT * FROM customer where customer_id = '".$getID."'";
                                            $viewresults = mysqli_query($con,$viewquerys);
                                            $row3 = mysqli_fetch_assoc($viewresults);
                                            $pid = $row3['customer_id'];
                                            
                                            $viewquery = " SELECT * FROM getorder where customer_id='".$pid."'";
                                            $viewresult = mysqli_query($con,$viewquery);

                                            

                                     ?>
                                  
                                      <?php 
                                            while($row1 = mysqli_fetch_assoc($viewresult)) { ?>
                                            <div class="row mt-5" style="padding: 2%;  margin: 1%; color: #00394e; background-color: #f9f6f7">
                                            <h4>Order ID #<?php echo $row1['order_id']; ?></h4>

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
                                                    $image_src = "upload/product/".$image;

                                                    ?>
                                                    <div class="row mt-5">
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
                                                <p>Status : <?php echo $row1['status']; ?></p>
                                              </div>
                                              <div class="col-sm-1 mt-5">
                                                <?php if ($row1['status'] != 'Cancel' || $row1['status'] != 'Reject'){ ?>
                                                  <button type="submit" class="btn btn-primary" onclick="window.location.href='cancelOrder.php?order_id=<?php echo $row1['order_id']; ?>'">Cancel</button>
                                                <?php }?>

                                              </div>
                                            
                            </div>
                                            <?php  $count++;
                                              
                                            
                                          }
                                       ?>

                          </div>`
                </div>
          </div>
      </section>
      <!--================End Cart Area =================-->
  </main>
 <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.Ceylon Marine Distributors( Hardware & PVC) | Created By : SILVA L.W.N SEU/IS/16/MIT/105</p>                  
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            
                            <div class="footer-social">
                                <a href="<?php echo $row5['twiter']; ?>"><i class="fab fa-twitter"></i></a>
                                <a href="<?php echo $row5['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                                <a href="<?php echo $row5['instragram']; ?>"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <!-- Footer End-->
    </footer>
 

  <!-- JS here -->

  <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
  <!-- Jquery, Popper, Bootstrap -->
  <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <!-- Jquery Mobile Menu -->
  <script src="./assets/js/jquery.slicknav.min.js"></script>

  <!-- Jquery Slick , Owl-Carousel Plugins -->
  <script src="./assets/js/owl.carousel.min.js"></script>
  <script src="./assets/js/slick.min.js"></script>

  <!-- One Page, Animated-HeadLin -->
  <script src="./assets/js/wow.min.js"></script>
  <script src="./assets/js/animated.headline.js"></script>
  
  <!-- Scrollup, nice-select, sticky -->
  <script src="./assets/js/jquery.scrollUp.min.js"></script>
  <script src="./assets/js/jquery.nice-select.min.js"></script>
  <script src="./assets/js/jquery.sticky.js"></script>
  <script src="./assets/js/jquery.magnific-popup.js"></script>

  <!-- contact js -->
  <script src="./assets/js/contact.js"></script>
  <script src="./assets/js/jquery.form.js"></script>
  <script src="./assets/js/jquery.validate.min.js"></script>
  <script src="./assets/js/mail-script.js"></script>
  <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
  
  <!-- Jquery Plugins, main Jquery -->	
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/main.js"></script>

</body>
</html>