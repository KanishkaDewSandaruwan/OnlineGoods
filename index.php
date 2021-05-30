<?php require_once "head.php";  ?>
    <main>
        <!--? slider Area Start -->

          <?php 
            $home_query = "SELECT * FROM details";
            $home_query_result = mysqli_query($con, $home_query);
            $row = mysqli_fetch_assoc($home_query_result);
            $bottom_banner_01 = $row['header_image'];
            $image_src1 = "upload/home/".$bottom_banner_01; ?>

        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms"><?php echo $row['header_title']; ?></h1>
                                    <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms"><?php echo $row['header_desc']; ?></p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                        <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img width="100%" src="<?php echo $image_src1; ?>" alt="" class=" heartbeat">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- ? New Product Start -->
        <section class="new-product-area p-5">
            <div class="container-fluid">
                <!-- Section tittle -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle mb-70">
                            <h2>New Arrivals</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    $product="SELECT * FROM product ORDER BY trndate DESC";
                    $query1 = mysqli_query($con,$product); 
                    $count = 0;
                    while ($row3 = mysqli_fetch_assoc($query1)) { 
                    $productimage = $row3['image'];
                    $productimage_src = "upload/product/".$productimage; 


                    if ($row3['available'] == "Yes") {
                    if ($count < 3) { 
                      ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img style="height: 300px" src="<?php echo $productimage_src; ?>" alt="">
                            </div>
                            <div class="product-caption">
                                <h3><a href="product_details.php?product_id=<?php echo $row3['product_id']; ?>"><?php echo $row3['product_name']; ?></a></h3>
                                <span>LKR <?php echo $row3['price']; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php }  $count++; } } ?>
                </div>
            </div>
        </section>
        <!--  New Product End -->
        <!--? Hardware Items Start -->
        <div class="popular-items p-5">
            <div class="container-fluid">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>Hardware Items</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    $hadware_product="SELECT * FROM product join category on  product.cat_id = category.cat_id where category.type = 'Hardware'";
                    $query2 = mysqli_query($con,$hadware_product); 
                    $count = 0;
                    while ($row6 = mysqli_fetch_assoc($query2)) { 
                    $productimage = $row6['image'];
                    $productimage_src = "upload/product/".$productimage; 


                    if ($row6['available'] == "Yes") {
                    if ($count < 6) { 
                      ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img style="height: 300px" src="<?php echo $productimage_src; ?>" alt="">
                                <div class="img-cap">
                                    <span><button onclick="window.location.href = 'addtocart.php?product_id=<?php echo $row6['product_id']; ?>'" class="btn btn-primary">Add to cart</button></span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.php?product_id=<?php echo $row6['product_id']; ?>"><?php echo $row6['product_name']; ?></a></h3>
                                <span>LKR <?php echo $row6['price']; ?></span>
                            </div>
                        </div>
                    </div>
                   <?php }  $count++; } } ?>
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="shop.php" class="btn view-btn1">View More Products</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hardware Items End -->

        <!--? PVC Items Start -->
        <div class="popular-items p-5">
            <div class="container-fluid">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>PVC Items</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    $hadware_product="SELECT * FROM product join category on  product.cat_id = category.cat_id where category.type = 'PVC'";
                    $query2 = mysqli_query($con,$hadware_product); 
                    $count = 0;
                    while ($row4 = mysqli_fetch_assoc($query2)) { 
                    $productimage = $row4['image'];
                    $productimage_src = "upload/product/".$productimage; 


                    if ($row4['available'] == "Yes") {
                    if ($count < 6) { 
                      ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img style="height: 300px" src="<?php echo $productimage_src; ?>" alt="">
                                <div class="img-cap">
                                    <span><button onclick="window.location.href = 'addtocart.php?product_id=<?php echo $row4['product_id']; ?>'" class="btn btn-primary">Add to cart</button></span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.php?product_id=<?php echo $row4['product_id']; ?>"><?php echo $row4['product_name']; ?></a></h3>
                                <span>LKR <?php echo $row4['price']; ?></span>
                            </div>
                        </div>
                    </div>
                   <?php }  $count++; } } ?>
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="shop.php" class="btn view-btn1">View More Products</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PVC Items End -->

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

    <!-- Scrollup, nice-select, sticky -->
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