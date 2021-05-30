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
          <li class=" nav-item active"><a href="cat.php"><i class="fas fa-th-list"></i><span class="menu-title" data-i18n="">Category</span></a>
          </li>
          <li class=" nav-item"><a href="product.php"><i class="fas fa-box"></i><span class="menu-title" data-i18n="">Products</span></a>
          </li>
          <li class=" nav-item"><a href="order.php"><i class="fas fa-calendar-week"></i><span class="menu-title" data-i18n="">Orders</span></a>
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
            <div class="row">
                <div class="container-fluid">
                        <h1 class="mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;"> EDIT PRODUCT</h1>
                      <div class="row">
                        <div class="col-md-6 mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">
                          <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="code" class="a"><b>Product Name</b></label>
                                <input type="text" class="form-control" name="name" placeholder="Product Name">
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

                            <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="desc"><b>Product Price </b></label>
                              <input type="text" class="form-control" name="price" placeholder="Product Price ">
                            </div>
                            </div>

                              <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="inputState"><b>Categories</b></label>
                                <select id="inputState" name="cat" class="form-control">
                                <option selected></option>
                                <?php 
                                  $q3 = "SELECT * FROM category";
                                    $res3 = mysqli_query($con,$q3);
                                    $c=1;
                                    while($row=mysqli_fetch_assoc($res3)){
                                      $id = $row['cat_id'];
                                      echo "<option value='$id'>".$row['cat_name']." | ".$row['type']."</option>";
                                      $c++;
                                    }
                                 ?>
                                </select>
                              </div>
                              </div>

                              <div class="dropdown-divider" style="color:red;"></div>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="original_price"><b>Quntity</b></label>
                              <input type="text" class="form-control"  name="qty" placeholder="Quntity">
                            </div>
                            </div>

                            <br>
                            Select Foods Front image to upload:<br>
                              <input type="file" name="file" /><br><br>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="inputState"><b>Availability</b></label>
                                  <select id="inputState" name="available" class="form-control">
                                    <option selected></option>
                                    <option>Yes</option>
                                    <option>No</option>
                                  </select>
                                </div>
                                </div>

                            <button type="button" class="btn btn-dark" onclick="window.location.href = 'product.php' ">Back</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                        </form>
                         <?php
                                        if(isset($_POST['submit'])){

                                          
                                          $product_name = $_REQUEST['name'];
                                          $desc = $_REQUEST['editordata'];
                                          $price = $_REQUEST['price'];
                                          $cat = $_REQUEST['cat'];
                                          $qty = $_REQUEST['qty'];
                                          $available = $_REQUEST['available'];

                                          $id = $_REQUEST['product_id'];

                                          $cdate = date("Y/m/d m:H:s");


                                          $file = $_REQUEST['file'];
                                          $name = $_FILES['file']['name'];
                                          $target_dir = "../upload/product/";
                                          $target_file = $target_dir . basename($_FILES["file"]["name"]);
                                          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                          $extensions_arr = array("jpg","jpeg","png","gif");


                                          if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) { 
                                            if( in_array($imageFileType,$extensions_arr) ){
                                                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                                                $query="UPDATE product SET image='$name' where product_id='".$id."'";
                                                mysqli_query($con,$query);
                                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                            }
                                          }

                                          if(!empty($product_name))
                                          {
                                            $query3="UPDATE product SET product_name='$product_name' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($cat))
                                          {
                                            $query3="UPDATE product SET cat_id='$cat' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($desc))
                                          {
                                            $query3="UPDATE product SET description='$desc' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($price))
                                          {
                                            $query3="UPDATE product SET price='$price' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($qty))
                                          {
                                            $query3="UPDATE product SET qnt='$qty' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }
                                          if(!empty($available))
                                          {
                                            $query3="UPDATE product SET available='$available' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }
                                      } ?>
                        
                    </div>
                  </div>
                </div>
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