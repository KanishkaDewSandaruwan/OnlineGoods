<?php require_once 'connection.php';  
session_start();
?>
<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ceylon Marine Distributors</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.jpeg">

    <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <main>
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>Alrady have an Account?</h2>
                                <p></p>
                                <a href="login.php" class="btn_3">Login To Our Shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome! <br>
                                    Please Sign Up now</h3>
                                <form class="row contact_form" method="POST" >
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                            placeholder="Your Name">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="phone" value=""
                                            placeholder="Your Phone Number">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="address" value=""
                                            placeholder="Your Address">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="nic" value=""
                                            placeholder="Your NIC Number">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="name" name="email" value=""
                                            placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="pass" value=""
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="confpass" value=""
                                            placeholder="Confirm-Password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" name="submit" value="submit" class="btn_3">Register
                                        </button>
                                    </div>
                                </form>
                                <?php 

                                            if (isset($_POST['submit'])) {

                                                $name = $_REQUEST['name'];
                                                $email = $_REQUEST['email'];
                                                $address = $_REQUEST['address'];
                                                $phone = $_REQUEST['phone'];
                                                $nic = $_REQUEST['nic'];
                                                $psaaword = $_REQUEST['pass'];
                                                $conpw = $_REQUEST['confpass'];

                                                $query2="SELECT * FROM customer WHERE email='$email'";
                                                $sql2=mysqli_query($con,$query2);

                                                $query3="SELECT * FROM customer WHERE phone='$phone'";
                                                $sql3=mysqli_query($con,$query3);

                                                $query4="SELECT * FROM customer WHERE nic='$nic'";
                                                $sql4=mysqli_query($con,$query4);

                                                if (empty($name)) {

                                                    echo "<script>alert(\"Plese Enter Your Name.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($email)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your Email.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($address)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your address.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($phone)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your Phone Number.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($nic)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your NIC Number.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($psaaword)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter New Password.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($conpw)) {
                                                    
                                                    echo "<script>alert(\"Plese confirm Your Password.\");window.location.href=\"register.php\";</script>";
                                                
                                                }
                                                elseif (!preg_match("/^([0]([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)) {

                                                    echo "<script>alert(\"Plese Enter Valid Phone Number.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif ($psaaword!=$conpw) {
                                                    
                                                    echo "<script>alert(\"Password is Not Match.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (mysqli_num_rows($sql2)>0) {
                                                
                                                    echo "<script>alert(\"Email already Exsisted.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (mysqli_num_rows($sql3)>0) {
                                                    
                                                    echo "<script>alert(\"Phone Number already Exsisted.\");window.location.href=\"register.php\";</script>";
                                                }
                                                elseif (mysqli_num_rows($sql4)>0) {
                                                
                                                    echo "<script>alert(\"NIC Number already Exsisted.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                else {

                                                    $q1="INSERT INTO customer(name,phone,email,address,password,nic) values('$name','$phone','$email','$address','".md5($psaaword)."','$nic')";
                                                    $res1=mysqli_query($con,$q1);

                                                    if ( $res1){
                                                        echo "<script>alert(\"congratulations! your registration was successful.\");window.location.href=\"login.php\";</script>";
                                                    }
                                                    else{
                                                        echo "<script>alert(\"Ohh Snap! your registration Fail. Plese Try Again!.\");window.location.href=\"register.php\";</script>";
                                                    }
                                                }
                                            }

                                             ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.Ceylon Marine Distributors( Hardware & PVC) | Created By : SILVA L.W.N SEU/IS/16/MIT/105</p>               
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
    
    <!-- Scroll up, nice-select, sticky -->
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