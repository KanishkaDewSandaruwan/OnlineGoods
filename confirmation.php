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
                              <h2 class="text-white">Confirmation</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================ confirmation part start =================-->
      <section class="confirmation_part section_padding">
        <div class="container">
        <?php   
            $getID = $_SESSION['customer_id'];
            $order_id = $_REQUEST['order_id'];
            $count = 0;

            $viewquerys = " SELECT * FROM customer where customer_id = '".$getID."'";
            $viewresults = mysqli_query($con,$viewquerys);
            $row3 = mysqli_fetch_assoc($viewresults);
            
            $viewquery = " SELECT * FROM getorder where order_id='".$order_id."'";
            $viewresult = mysqli_query($con,$viewquery);

            if($row1 = mysqli_fetch_assoc($viewresult)) { ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="confirmation_tittle">
                <span>Thank you. Your order has been received.</span>
              </div>
            </div>

            <div class="col-lg-8 col-lx-4">
              <div class="single_confirmation_details">
                <h4>order info</h4>
                <ul>
                  <li>
                    <p>order number</p><span>: #<?php echo $row1['order_id']; ?></span>
                  </li>
                  <li>
                    <p>date</p><span>: <?php echo $row1['trn_date']; ?></span>
                  </li>
                  <li>
                    <p>total</p><span>: LKR <?php echo $row1['total']; ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-8 col-lx-4">
              <div class="single_confirmation_details">
                <h4>shipping Address</h4>
                <ul>
                  <li>
                    <p>Name</p><span>: <?php echo $row3['name']; ?></span>
                  </li>
                  <li>
                    <p>Address</p><span>: <?php echo $row3['address']; ?></span>
                  </li>
                  <li>
                    <p>Phone Number</p><span>: +94 <?php echo $row3['phone']; ?></span>
                  </li>
                  <li>
                    <p>Email</p><span>:<?php echo $row3['email']; ?></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="order_details_iner">
                <h3>Order Details</h3>
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col" colspan="2">Product</th>
                    </tr>
                  </thead>
                  <tbody>
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
                    <tr>
                      <th colspan="2"><span><?php echo $row4['product_name']; ?></span></th>
                    </tr>
                    <?php }  $count++; }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th scope="col" colspan="3">TOTAL</th>
                      <th scope="col">LKR <?php echo $row1['total']; ?></th>
                    </tr>
                  </tfoot>
                </table>
                <button type="button" onclick="window.location.href = 'myorders.php' " class="btn btn-primary">MY ORDERS LIST</button>
              </div>
            </div>
          </div>
      <?php } ?>
        </div>
      </section>
      <!--================ confirmation part end =================-->
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
  <script src="./assets/js/jquery.magnific-popup.js"></script>

  <!-- Scroll up, nice-select, sticky -->
  <script src="./assets/js/jquery.scrollUp.min.js"></script>
  <script src="./assets/js/jquery.nice-select.min.js"></script>
  <script src="./assets/js/jquery.sticky.js"></script>
  
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