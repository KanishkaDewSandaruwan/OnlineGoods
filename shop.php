<?php require_once "head.php";  ?>

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
                                <h2 class="text-white">Our Shop</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container-fluid p-4">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>                                                      
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Hadware Item</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> PVC Item</a>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">

                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php 
                      $prodcat1="SELECT * FROM category where type = 'Hardware' ";
                      $query3 = mysqli_query($con,$prodcat1); 
                      $counts = 0;
                      while ($row3 = mysqli_fetch_assoc($query3)) { 
                        $id = $row3['cat_id'];

                        $products="SELECT * FROM product where cat_id='".$id."'";
                        $query = mysqli_query($con,$products); 
                        if (mysqli_fetch_assoc($query)) {
                        ?>

                            <div class="container-fluid mt-5">
                                <!-- Section tittle -->
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="section-tittle mb-70">
                                                <h2><?php echo $row3['cat_name']; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php 
                                        $hadware_product="SELECT * FROM product where cat_id = '$id' ORDER BY trndate DESC ";
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
                                </div>
                        <?php } $counts++; } ?>
                    </div>
                    <!-- Card two -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <?php 
                      $prodcat4="SELECT * FROM category where type = 'PVC' ";
                      $query4 = mysqli_query($con,$prodcat4); 
                      $counts = 0;
                      while ($row4 = mysqli_fetch_assoc($query4)) { 
                        $id = $row4['cat_id'];
                        $products4="SELECT * FROM product where cat_id='".$id."'";
                        $query34 = mysqli_query($con,$products4); 
                        if (mysqli_fetch_assoc($query34)) {
                        ?>

                            <div class="container-fluid mt-5">
                                <!-- Section tittle -->
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="section-tittle mb-70">
                                                <h2><?php echo $row4['cat_name']; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php 
                                        $hadware_product="SELECT * FROM product where cat_id = '$id' ORDER BY trndate DESC ";
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
                                </div>
                        <?php } $counts++; } ?>
                    </div>

                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
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
    <!-- All JS Custom Plugins Link Here here -->
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