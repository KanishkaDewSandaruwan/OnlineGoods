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
          <li class=" nav-item active"><a href="settings.php"><i class="fas fa-cogs"></i><span class="menu-title" data-i18n="">Settings</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="container-fluid">
                        <h1 class="mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">SETTINGS</h1>
                        <div class="row border-rounded border-primary p-3">
                            <div class="col-md-12 mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">
                                <div class="row">
                                    <h3 style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">Change Header Images </h3> <a class="text-primary" data-toggle="modal" data-target="#changeHeader"> Click Here...</a>
                                </div>
                                <div class="row">
                                    
                                  <?php 
                                        $home_query = "SELECT * FROM details";
                                        $home_query_result = mysqli_query($con, $home_query);
                                        $row = mysqli_fetch_assoc($home_query_result);
                                        $bottom_banner_01 = $row['header_image'];
                                        $bottom_banner_02 = $row['subpage_image'];
                                        $image_src2 = "../upload/home/".$bottom_banner_01;
                                        $image_src3 = "../upload/home/".$bottom_banner_02; ?>

                                        <div class="col-md-6 mt-5">
                                            <h3><?php echo $row['header_title']; ?></h3>
                                            <h6><?php echo $row['header_desc']; ?></h6>
                                           <div class="row mt-5">
                                            <h3>Main Page Header</h3>
                                               <img width="100px" src='<?php echo $image_src2; ?>'> 
                                           </div>
                                           <div class="row mt-5">
                                            <h3>Subpage Header</h3>
                                               <img width="100%" src='<?php echo $image_src3; ?>'> 
                                           </div>
                                        </div>
                                </div>
                            </div>
                       </div>
                       <div class="row border-rounded border-primary p-3 mt-3">
                            <div class="col-md-12 mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">
                                <div class="row">
                                    <h3 style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">Change About Details </h3> <a class="text-primary" data-toggle="modal" data-target="#changeDetails"> Click Here...</a>
                                </div>
                                <div class="row">
                                    
                                  <?php $viewquery = "SELECT * FROM about";
                                        $viewresult = mysqli_query($con,$viewquery);
                                        $row5 = mysqli_fetch_assoc($viewresult); 

                                        $about_image = $row5['image'];
                                        $image_src1 = "../upload/home/".$about_image;
                                        ?>
                                        <div class="col-md-6 mt-5">
                                            <h3><?php echo $row5['title']; ?></h3>
                                            <h6><?php echo $row5['description']; ?></h6>
                                           <div class="row">
                                               <img width="100px" src='<?php echo $image_src1; ?>'> 
                                           </div>
                                        </div>
                                </div>
                            </div>
                       </div>
                       <div class="row border-rounded border-primary p-3 mt-3">
                            <div class="col-md-12 mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">
                                <div class="row">
                                    <h3 style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">Change Contact Details </h3> <a class="text-primary" data-toggle="modal" data-target="#changeContact"> Click Here...</a>
                                </div>
                                  <?php $viewquery = "SELECT * FROM about";
                                        $viewresult = mysqli_query($con,$viewquery);
                                        $row5 = mysqli_fetch_assoc($viewresult); 

                                        $about_image = $row5['image'];
                                        $image_src1 = "../upload/home/".$about_image;
                                        ?>
                                <div class="row">
                                        <div class="col-md-3 mt-5"><h3>Email</h3></div>
                                        <div class="col-md-6 mt-5"><h3><?php echo $row5['email']; ?></h3></div>
                                </div>
                                <div class="row">
                                        <div class="col-md-3 mt-5"><h3>Phone Number</h3></div>
                                        <div class="col-md-6 mt-5"><h3><?php echo $row5['phone']; ?></h3></div>
                                </div>
                                <div class="row">
                                        <div class="col-md-3 mt-5"><h3>Address</h3></div>
                                        <div class="col-md-6 mt-5"><h3><?php echo $row5['address']; ?></h3></div>
                                </div>
                                <div class="row">
                                        <div class="col-md-3 mt-5"><h3>Facebook</h3></div>
                                        <div class="col-md-6 mt-5"><a href="<?php echo $row5['facebook']; ?>">Facebook</a></div>
                                </div>
                                <div class="row">
                                        <div class="col-md-3 mt-5"><h3>Twitter</h3></div>
                                        <div class="col-md-6 mt-5"><a href="<?php echo $row5['twiter']; ?>">Twiter</a></div>
                                </div>
                                <div class="row">
                                        <div class="col-md-3 mt-5"><h3>Instragram</h3></div>
                                        <div class="col-md-6 mt-5"><a href="<?php echo $row5['instragram']; ?>">Instagram</a></div>
                                </div>
                            </div>
                       </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

                    <!-- Modal -->
      <div class="modal fade" id="changeContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Change Contact Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="col-md-12 mt-3" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                        <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Email Address</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Phone Number</b></label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Address</b></label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Facebook</b></label>
                        <input type="text" class="form-control" name="fb" placeholder="Facebook">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Twitter</b></label>
                        <input type="text" class="form-control" name="twit" placeholder="Twitter">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Instragram</b></label>
                        <input type="text" class="form-control" name="insta" placeholder="Instragram">
                      </div>
                    </div>


                                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="about" class="btn btn-primary">Save changes</button>
              </div>
                </form>
                <?php
                   if(isset($_POST['about'])){
 

                      $email = $_REQUEST['email'];
                      $phone = $_REQUEST['phone'];
                      $address = $_REQUEST['address'];

                      $fb = $_REQUEST['fb'];
                      $twit = $_REQUEST['twit'];
                      $insta = $_REQUEST['insta'];


                      if(!empty($email))
                      {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                          $query1="SELECT * FROM employee WHERE email='$email'";
                          $sql1=mysqli_query($con,$query1);


                            if(mysqli_num_rows($sql1)>0)
                            {
                              echo "<script type=\"text/javascript\"> alert(\"Email is already Exsisted\");</script>";
                            }
                            else
                              {
                                $query3="UPDATE about SET email='$email'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='settings.php';</script>";
                              }
                        }
                      }
                      if(!empty($address))
                      {
                        $query3="UPDATE about SET address='$address'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                      if(!empty($phone))
                      {
                        if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                            $query3="UPDATE about SET phone='$phone'";
                            $sql3=mysqli_query($con,$query3);
                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";

                          }else{echo "Enter Valid Phone Number";}
                      }

                      if(!empty($fb))
                      {
                        $query3="UPDATE about SET facebook='$fb'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }

                      if(!empty($twit))
                      {
                        $query3="UPDATE about SET twiter='$twit'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }

                      if(!empty($insta))
                      {
                        $query3="UPDATE about SET instragram='$insta'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                    }
                    
                  ?>
                    
            </div>
          </div>
        </div>

                 <!-- Modal -->
      <div class="modal fade" id="changeHeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Change Home Page Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="col-md-12 mt-3" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                         Select Header image to upload:<br>
                        <input type="file" name="file" /><br><br>

                        <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a"><b>Title</b></label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a"><b>Description</b></label>
                        <input type="text" class="form-control" name="desc" placeholder="Description">
                      </div>
                    </div>

                    Select Sub Page Header image to upload:<br>
                        <input type="file" name="file1" /><br><br>

                                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="image_set_home" class="btn btn-primary">Save changes</button>
              </div>
                </form>
                <?php
                   if(isset($_POST['image_set_home'])){
 
                      $name = $_FILES['file']['name'];
                      $name1 = $_FILES['file1']['name'];

                      $title = $_REQUEST['title'];
                    $desc = $_REQUEST['desc'];


                      // $target_dir = "upload/";
                      $target_dir = "../upload/home/";
                      $target_file = $target_dir . basename($_FILES["file"]["name"]);
                      $target_file1 = $target_dir . basename($_FILES["file1"]["name"]);


                      // Select file type
                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                      $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

                      // Valid file extensions
                      $extensions_arr = array("jpg","jpeg","png","gif");

                      // Check extension
                      if( in_array($imageFileType,$extensions_arr) ){
                          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                          $query="UPDATE details SET header_image='$name'";
                          mysqli_query($con,$query);
                          echo '<script>alert("Header Details Change Success"); window.location.href="settings.php";</script>';
                      }

                      if( in_array($imageFileType1,$extensions_arr) ){
                          move_uploaded_file($_FILES['file1']['tmp_name'],$target_dir.$name1);
                          $query="UPDATE details SET subpage_image='$name1'";
                          mysqli_query($con,$query);
                          echo '<script>alert("Header Details Change Success"); window.location.href="settings.php";</script>';
                      }


                      if(!empty($title))
                      {

                        $query3="UPDATE details SET header_title='$title'";
                        $sql3=mysqli_query($con,$query3);
                          echo '<script>alert("Header Details Change Success"); window.location.href="settings.php";</script>';
                      }
                      if(!empty($desc))
                      {

                        $query3="UPDATE details SET header_desc='$desc'";
                        $sql3=mysqli_query($con,$query3);
                          echo '<script>alert("Header Details Change Success"); window.location.href="settings.php";</script>';
                      }
                    }
                    
                  ?>
                    
            </div>
          </div>
        </div>

        <!-- Modal -->
      <div class="modal fade" id="changeDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Change About Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="col-md-12 mt-3" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                         Select About image to upload:<br>
                        <input type="file" name="file" /><br><br>

                        <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="title" class="a"><b>About Title</b></label><br>
                        <input type="text" class="form-control" name="title" placeholder="About Title">
                      </div>
                    </div>

                     <label for="title" class="a"><b>About Description</b></label><br><br>
                    <textarea id="summernote" name="editordata"></textarea>
                        <script>
                          $('#summernote').summernote({
                            placeholder: 'Details About this Package',
                            tabsize: 2,
                            height: 120,
                            toolbar: [
                              ['style', ['style']],
                              ['font', ['bold', 'underline', 'clear']],
                              ['color', ['color']],
                              ['para', ['ul', 'ol', 'paragraph']],
                            ]
                          });
                        </script><br><br>
                                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="image_set" class="btn btn-primary">Save changes</button>
              </div>
                </form>
                <?php
                   if(isset($_POST['image_set'])){
 
                      $name = $_FILES['file']['name'];

                      $title = $_REQUEST['title'];
                      $desc = $_REQUEST['editordata'];


                      // $target_dir = "upload/";
                      $target_dir = "../upload/home/";
                      $target_file = $target_dir . basename($_FILES["file"]["name"]);


                      // Select file type
                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                      // Valid file extensions
                      $extensions_arr = array("jpg","jpeg","png","gif");

                      // Check extension
                      if( in_array($imageFileType,$extensions_arr) ){
                          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                          $query="UPDATE about SET image='$name'";
                          mysqli_query($con,$query);
                          echo '<script>alert("Updated Succussfully"); window.location.href="settings.php";</script>';
                      }

                      if(!empty($title))
                      {

                        $query3="UPDATE about SET title='$title'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                      if(!empty($desc))
                      {

                        $query3="UPDATE about SET description='$desc'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                    }
                    
                  ?>
                    
            </div>
          </div>
        </div>

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