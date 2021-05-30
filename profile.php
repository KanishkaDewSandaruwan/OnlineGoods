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
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2 class="text-white">Profile</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--? Hero Area End-->
        <!-- ================ contact section start ================= -->
        <section class="contact-section" style="margin-top: -12%;">
            <div class="container">

                <div class="row">
                    <?php 
                    $customer_id = $_SESSION['customer_id'];
                    $viewquery = "SELECT * FROM customer where customer_id = '$customer_id' ";
                    $viewresult = mysqli_query($con,$viewquery);
                    $row0 = mysqli_fetch_assoc($viewresult);?>
                    
                    <div class="col-lg-3 offset-lg-1">
                        <h2 class="text-danger">My Details</h2>
                        <div class="media contact-info mt-5">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Name</h3>
                                <p><?php echo $row0['name']; ?></p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>NIC Number</h3>
                                <p><?php echo $row0['nic']; ?></p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Address</h3>
                                <p><?php echo $row0['address']; ?></p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>Phone Number</h3>
                                <p><?php echo $row0['phone']; ?></p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>Email</h3>
                                <p><?php echo $row0['email']; ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="row">
                                <p class="ml-1">Edit Profile <a class="text-primary" data-toggle="modal" data-target="#editprofile">Click Here...</a></p>
                                <br><br>
                                <p class="ml-1">Change UserName <a class="text-primary" data-toggle="modal" data-target="#exampleModalusernameChange">Click Here...</a></p>
                                <p class="ml-1">Change Password <a class="text-primary" data-toggle="modal" data-target="#exampleModal">Click Here...</a></p>
                                <p class="ml-1"> Delete Account <a class="text-primary" href="delete_customer.php?customer_id=<?php echo $row0['customer_id']; ?>">Click Here...</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->
    </main>

   <!-- Modal -->
      <div class="modal fade" id="changeHolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Change Holder Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="col-md-12 mt-3" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input type="text" name="pf" id="pf" class="form-control input-sm chat-input" placeholder="PF Number"/>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="address" id="address" class="form-control input-sm chat-input" placeholder="Station Address"/>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="bank_account" id="bank_account" class="form-control input-sm chat-input" placeholder="Bank Account Number"/>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="bank_branch" id="bank_branch" class="form-control input-sm chat-input" placeholder="Bank Branch"/>
                                </div>
                              </div>

                         Select Bank image to upload:<br>
                        <input type="file" name="file" /><br><br>
                            
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="holder" class="btn btn-primary">Save changes</button>
              </div>
                </form>
                            <?php
                                   if(isset($_POST['holder'])){

                                     $address = $_REQUEST['address'];
                                      $pf = $_REQUEST['pf'];
                                      $bank_account = $_REQUEST['bank_account'];
                                      $bank_branch = $_REQUEST['bank_branch'];
                 
                                      $name = $_FILES['file']['name'];


                                      // $target_dir = "upload/";
                                      $target_dir = "upload/member/";
                                      $target_file = $target_dir . basename($_FILES["file"]["name"]);

                                      $member_id = $_REQUEST['member_id'];

                                      // Select file type
                                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                      // Valid file extensions
                                      $extensions_arr = array("jpg","jpeg","png","gif");

                                      // Check extension
                                      if( in_array($imageFileType,$extensions_arr) ){
                                          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                                          $query="UPDATE holder SET bank_image='$name' where member_id = '$member_id'  ";
                                          mysqli_query($con,$query);
                                          echo '<script>alert("Header Details Change Success"); window.location.href="myaccount.php";</script>';
                                      }
                                      if(!empty($pf))
                                      {
                                        $query3="UPDATE holder SET pf_no='$pf' where member_id = '$member_id'  ";
                                        $sql3=mysqli_query($con,$query3);
                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                                      }

                                      if(!empty($address))
                                      {
                                        $query3="UPDATE holder SET station_address='$address' where member_id = '$member_id'  ";
                                        $sql3=mysqli_query($con,$query3);
                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                                      }

                                      if(!empty($bank_account))
                                      {
                                        $query3="UPDATE holder SET bank_account='$bank_account' where member_id = '$member_id'  ";
                                        $sql3=mysqli_query($con,$query3);
                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                                      }
                                      if(!empty($bank_branch))
                                      {
                                        $query3="UPDATE holder SET bank_branch='$bank_branch' where member_id = '$member_id'  ";
                                        $sql3=mysqli_query($con,$query3);
                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                                      }


                                    }
                                    
                                  ?>
                    
            </div>
          </div>
        </div>

            <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form action="" method="POST"> 
                          <div class="modal-body">

                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input type="password" name="cpass" id="userPassword" class="form-control input-sm chat-input" placeholder="Current Password"/>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="password" name="npass" id="userPassword" class="form-control input-sm chat-input" placeholder="New Password"/>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="password" name="conpass" id="userPassword" class="form-control input-sm chat-input" placeholder="Confirm Password"/>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="pass_change"  class="btn btn-primary">Save changes</button>
                          </div>
                           <?php
                            if(isset($_POST['pass_change']))
                            {


                            $currentpass=stripslashes($_REQUEST['cpass']);
                            $newpass=stripslashes($_REQUEST['npass']);
                            $confpass=stripslashes($_REQUEST['conpass']);
                            $g = $_SESSION['customer_id'];

                            if(!empty($currentpass)){
                              if(!empty($newpass)){
                                if(!empty($confpass)){

                                  $loginsql="SELECT * FROM customer WHERE password='".md5($currentpass)."'";
                                  $result=mysqli_query($con,$loginsql) or mysqli_errno();
                                  $rows=mysqli_fetch_assoc($result);

                                  $query5="SELECT password FROM customer WHERE customer_id='".$g."'";
                                  $sql5=mysqli_query($con,$query5);
                                  $row=mysqli_fetch_assoc($sql5);

                                  if(isset($rows['password'])==isset($row['password']))
                                  {
                                    if($newpass==$confpass){
                                      $query3="SELECT * FROM customer WHERE password='$newpass'";
                                      $sql3=mysqli_query($con,$query3);

                                      if(mysqli_num_rows($sql3)>0)
                                      {
                                        echo "password already Exsisted";
                                      }
                                      else
                                      {
                                          $query2="UPDATE customer SET password='".md5($newpass)."' WHERE customer_id='".$g."'";
                                          $sql2=mysqli_query($con,$query2);
                                          echo "<script type=\"text/javascript\"> alert(\"Password Update Successfull\"); window.location.href='logout.php'; </script>"; 
                                      }

                                    }else{ echo "<script>alert(\"Password is Not Match\");</script>";} 
                                  }else{ echo "<script>alert(\"Current Password is Wrong\");</script>";} 
                                }else{ echo "<script>alert(\"Enter Confirm Password\");</script>";} 
                              }else{ echo "<script>alert(\"Enter New Password\");</script>";} 
                            }else{ echo "<script>alert(\"Enter Current Password\");</script>";} 

                            }
                        ?>
                        </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Edit Profile-->
                    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Profile Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form action="" method="POST"> 
                          <div class="modal-body">

                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input type="text" name="name" id="name" class="form-control input-sm chat-input" placeholder="Your Name"/>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="phone" id="phone" class="form-control input-sm chat-input" placeholder="Phone Number"/>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="address" id="address" class="form-control input-sm chat-input" placeholder="Your Address"/>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="nic" id="nic" class="form-control input-sm chat-input" placeholder="Your NIC Number"/>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="pass_detail"  class="btn btn-primary">Save changes</button>
                          </div>
                            <?php
                                if(isset($_POST['pass_detail']))
                                {


                                    $name = $_REQUEST['name'];
                                    $phone = $_REQUEST['phone'];
                                    $address = $_REQUEST['address'];
                                    $nic = $_REQUEST['nic'];
                                    $geID = $_SESSION['customer_id'];
                                    $cdate = date("Y/m/d m:H:s");


                                      
                                                if(!empty($name))
                                                  {
                                                    $query3="UPDATE customer SET name='$name' WHERE customer_id='".$geID."'";
                                                    $sql3=mysqli_query($con,$query3);
                                                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"profile.php\";</script>";
                                                  }

                                                  if(!empty($address))
                                                  {
                                                    $query3="UPDATE customer SET address='$address' WHERE customer_id='".$geID."'";
                                                    $sql3=mysqli_query($con,$query3);
                                                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"profile.php\";</script>";
                                                  }

                                                  if(!empty($phone))
                                                  {
                                                    if(preg_match("/^([0]([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                                        $query3="UPDATE customer SET phone='$phone' WHERE customer_id='".$geID."'";
                                                        $sql3=mysqli_query($con,$query3);
                                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"profile.php\";</script>";

                                                      }else{echo "Enter Valid Phone Number";}
                                                  }

                                                  if(!empty($nic))
                                                  {
                                                    $query3="UPDATE customer SET nic='$nic' WHERE customer_id='".$geID."'";
                                                    $sql3=mysqli_query($con,$query3);
                                                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"profile.php\";</script>";
                                                  }


                                }
                            ?>
                        </form>
                        </div>
                      </div>
                    </div>
                         <!-- Modal -->
                    <div class="modal fade" id="exampleModalusernameChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Username</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form action="" method="POST"> 
                                <div class="modal-body">

                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input type="text" name="cemail" id="userPassword" class="form-control input-sm chat-input" placeholder="Current Email"/>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="nemail" id="userPassword" class="form-control input-sm chat-input" placeholder="New Email"/>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit"  class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                          <?php
                              if(isset($_POST['submit']))
                              {

                              $currenteuname=stripslashes($_REQUEST['cemail']);
                              $newuname=stripslashes($_REQUEST['nemail']);
                              $g = $_SESSION['customer_id'];

                              if(!empty($currenteuname)){
                                if(!empty($newuname)){

                                    $loginsql="SELECT * FROM customer WHERE email='".$currenteuname."'";
                                    $result=mysqli_query($con,$loginsql) or mysqli_errno();
                                    $rows=mysqli_fetch_assoc($result);

                                    $query5="SELECT email FROM customer WHERE customer_id='".$g."'";
                                    $sql5=mysqli_query($con,$query5);
                                    $row=mysqli_fetch_assoc($sql5);

                                    if(isset($rows['email'])==isset($row['email']))
                                    {
                                        $query3="SELECT * FROM customer WHERE email='$newuname'";
                                        $sql3=mysqli_query($con,$query3);

                                        if(mysqli_num_rows($sql3)>0)
                                        {
                                          echo "<script>alert(\"email already Exsisted\");</script>";
                                        }
                                        else
                                        {
                                            $query2="UPDATE customer SET email='".$newuname."' WHERE email='".$currenteuname."'";
                                            $sql2=mysqli_query($con,$query2);
                                            echo "<script type=\"text/javascript\"> alert(\"Email Update Successfull\"); window.location.href='logout.php'; </script>"; 
                                        }
                                    }else{ echo "<script>alert(\"Current Email is Wrong\");</script>";} 
                                
                                }else{ echo "<script>alert(\"Enter New Email\");</script>";} 
                              }else{ echo "<script>alert(\"Enter Current Email\");</script>";} 

                              }
                          ?>
                        </div>
                      </div>
                    </div>
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