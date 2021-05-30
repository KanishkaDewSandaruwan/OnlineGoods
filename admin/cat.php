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
                        <h1 class="mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">CATEGORY LIST</h1>
                         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
                        <div class="row">
                        <div class="col-md-12 mt-4" style="font-family: \"Times New Roman\",Times, serif; font-size: 25px;">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table v-middle text-center">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th class="border-top-0 text-white">Categori Name</th>
                                            <th class="border-top-0 text-white">Category Type</th>
                                            <th class="border-top-0 text-white">Image</th>
                                            <th class="border-top-0 text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <?php $count=1;
                                      $getcat = "SELECT * FROM category";
                                      $viewresult = mysqli_query($con, $getcat);
                                        
                                      ?>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($viewresult)) { 

                                            $image = $row['cat_image'];
                                            $image_src = "../upload/category/".$image;?>
                                        <tr>
                                            <td><h4><?php echo $row['cat_name']; ?></h4></td>
                                            <td><h4><?php echo $row['type']; ?></h4></td>
                                            <td><img width="100px" src='<?php echo $image_src; ?>'></td>
                                            <td>
                                              <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <a class="dropdown-item" href="edit_cat.php?cat_id=<?php echo $row['cat_id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                  <a class="dropdown-item" href="delete.php?cat_id=<?php echo $row['cat_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                </div>
                                              </div>
                                            </td>
                                        </tr>
                                        <?php   $count++; } ?>
                                    </tbody>
                                </table>
                            </div>
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
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h1 style="font-family: \"Times New Roman\",Times, serif; text-align:center" class ="text-danger text-center" >Add New Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name" class="a"><b>Category Name</b></label>
                        <input type="text" class="form-control" name="cat_name" placeholder="Category Name">
                      </div>
                    </div>

                    <br>
                      Select Category Front image to upload:<br>
                        <input type="file" name="file" /><br><br>
                    
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputState"><b>Category Type</b></label>
                        <select id="inputState" name="cat_type" class="form-control">
                          <option selected></option>
                          <option>Hardware</option>
                          <option>PVC</option>
                        </select>
                      </div>
                      </div>

                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
                                    <?php
                                    if(isset($_POST['submit'])){
                                      if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) { 

                                      $cat_name = $_REQUEST['cat_name'];
                                      $cat_type = $_REQUEST['cat_type'];
                                      $file = $_REQUEST['file'];

                                      $name = $_FILES['file']['name'];
                                      $target_dir = "../upload/category/";
                                      $target_file = $target_dir . basename($_FILES["file"]["name"]);
                                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                      $extensions_arr = array("jpg","jpeg","png","gif");

                                            if(!empty($cat_name)){
                                              if(!empty($cat_type)){
                                                  $q4 = "SELECT * FROM category WHERE cat_name='$cat_name'";
                                                  $res4 = mysqli_query($con,$q4);

                                                  if(mysqli_num_rows($res4)>0)
                                                  {
                                                    echo '<script>alert("Product Categori Alrady Saved.");
                                                    </script>';
                                                  }
                                                  else{
                                                    if (in_array($imageFileType,$extensions_arr)) {

                                                            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

                                                            $q1="INSERT INTO category(cat_name,cat_image,type) values('$cat_name','$name','$cat_type')";
                                                                  $res1=mysqli_query($con,$q1);
                                                                  if ( $res1)
                                                                  {

                                                                       echo '<script>alert("Product Category Save is Scussessfully.");window.location.href="cat.php"; </script>';
                                                                  }else{
                                                                    echo "<script>alert(\"Product Categori Save is Not Scussess\");</script>";
                                                                  }

                                                    }
                                                  }
                                                }else{ echo "<script>alert(\"Please Select Category Type\");</script>";}
                                              }else{ echo "<script>alert(\"Please Enter Product Categories\");</script>";}
                                      }else{ echo "<script>alert(\"Please Select Image\");</script>";}
                                  } ?>
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