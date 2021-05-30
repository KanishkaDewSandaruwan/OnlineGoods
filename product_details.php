<?php require_once "head.php";  ?>
    <main>
        <!-- Hero Area Start-->

        <main>
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
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2 class="text-white">Product</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                    <?php 
                    $product_id = $_REQUEST['product_id'];
                    $hadware_product="SELECT * FROM product where product_id = '$product_id'";
                    $query2 = mysqli_query($con,$hadware_product); 
                    $count = 0;
                    if ($row4 = mysqli_fetch_assoc($query2)) { 
                    $productimage = $row4['image'];
                    $productimage_src = "upload/product/".$productimage; ?>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">
                    <div class="single_product_img">
                        <img src="<?php echo $productimage_src; ?>" alt="#" class="img-fluid">
                    </div>
                    <div class="single_product_img">
                        <img src="assets/img/gallery/gallery01.png" alt="#" class="img-fluid">
                    </div>
                    <div class="single_product_img">
                        <img src="assets/img/gallery/gallery1.png" alt="#" class="img-fluid">
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3><?php echo $row4['product_name']; ?></h3>
                    
                       <?php echo $row4['description']; ?>
                    <form method="POST">
                        
                    <div class="card_area">
                        <div class="product_count_area">
                            <div class="product_count d-inline-block">
                                <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                <input class="product_count_item input-number" name="qty" type="text" value="1" min="0" max="10">
                                <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                            </div>
                        </div>
                    <div class="add_to_cart">
                        <button type="submit" name="submit" class="btn_3">add to cart</button>
                    </div>
                    </form>
                     <?php 

                          if(isset($_POST['submit'])){

                                $qty = $_REQUEST['qty'];

                                echo '<script>window.location.href="addtocart.php?product_id='.$row4['product_id'].'&qty='.$qty.'";</script>';
                            } ?>
                    </div>
                </div>
                </div>
            </div>
        <?php } ?>
            </div>
        </div>
        <!--================End Single Product Area =================-->
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
                            <?php $viewquery = "SELECT * FROM about";
                                        $viewresult = mysqli_query($con,$viewquery);
                                        $row5 = mysqli_fetch_assoc($viewresult); 

                                        $about_image = $row5['image'];
                                        $image_src1 = "../upload/home/".$about_image;
                                        ?>
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
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

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

        <!-- swiper js -->
        <script src="./assets/js/swiper.min.js"></script>
            <!-- swiper js -->
        <script src="./assets/js/mixitup.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>

</body>

</html>