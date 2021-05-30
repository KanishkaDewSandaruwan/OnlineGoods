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
                              <h2 class="text-white">Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              $cid = $_SESSION['customer_id'];
              $carts="SELECT * FROM cart where customer_id='".$cid."'";
              $carts1 = mysqli_query($con,$carts); 
              $total = 0;

              while ($row = mysqli_fetch_assoc($carts1)) { 
              $id = $row['product_id'];

                $product="SELECT * FROM product where product_id ='".$id."'";
                $query1 = mysqli_query($con,$product); 
                if($row1 = mysqli_fetch_assoc($query1)){

                $total = $total + $row['price'];

                  $productimage = $row1['image'];
                  $productimage_src = "upload/product/".$productimage; ?>

                  <tr>
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img src="<?php echo $productimage_src; ?>" alt="" />
                        </div>
                        <div class="media-body">
                          <p><?php echo $row1['product_name']; ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5>LKR <?php echo $row['price']; ?></h5>
                    </td>
                    <td>
                      <h5><?php echo $row['qty']; ?></h5>
                    </td>
                    <td>
                      <h5>LKR <?php echo $total;  ?></h5>
                    </td>
                    <td>
                      <a href="removecart.php?cart_id=<?php echo $row['cart_id']; ?>"><h4><i style="font-size: 30px" class="fas fa-times"></i></h4></a>
                    </td>
                  </tr>
                   <?php } }?>
                  <tr class="bottom_button">
                    <td>
                      <a class="btn_1" href="cart.php">Update Cart</a>
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Subtotal</h5>
                    </td>
                    <td>
                      <h5>LKR <?php echo $total;  ?></h5>
                    </td>
                  </tr>

                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
                <a class="btn_1" href="shop.php">Continue Shopping</a>
                <a class="btn_1 checkout_btn_1" href="make_order.php?total=<?php echo $total; ?>">Make Order</a>
              </div>
            </div>
          </div>
      </section>
      <!--================End Cart Area =================-->
  </main>>
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