<?php
require_once 'connection.php';

if(isset($_REQUEST['product_id']))
{
          $id = $_REQUEST['product_id'];

          $querygetcode="SELECT  * FROM product where product_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['product_id'];

            $query1="DELETE FROM product WHERE product_id='$a '";
            mysqli_query($con,$query1);

            header('location:product.php');
          
}
else if(isset($_REQUEST['m_id']))
{
          $id = $_REQUEST['m_id'];

          $querygetcode="SELECT  * FROM message where m_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['m_id'];

          $query1="DELETE FROM message WHERE m_id='$a '";
          mysqli_query($con,$query1);
          header('location:message.php');

}else if(isset($_REQUEST['cat_id'])){
          $id = $_REQUEST['cat_id'];

          $querygetcode="SELECT  * FROM category where cat_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['cat_id'];


          $query1="DELETE FROM product WHERE cat_id ='$a'";
          mysqli_query($con,$query1);

          $query1="DELETE FROM category WHERE cat_id='$a '";
          mysqli_query($con,$query1);
          header('location:cat.php');

          
}

else if(isset($_REQUEST['customer_id']))
{
          $id = $_REQUEST['customer_id'];

          $querygetcode="SELECT  * FROM customer where customer_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['customer_id'];
          $g=$result_row['email'];

          $cdate = date("Y/m/d m:H:s");

            $viewquery = " SELECT * FROM customer where email='".$g."'";
              $viewresult = mysqli_query($con,$viewquery);
              if ($row = mysqli_fetch_assoc($viewresult)) {

                $name = $row['name'];
                $cus_id = $row['customer_id'];
                $phone = $row['phone'];
                $email = $row['email'];


              $q1="INSERT INTO customer_backup(customer_id,name,phone,email,trn_date) values('$cus_id','$name','$phone','$email','$cdate')";
                $res1=mysqli_query($con,$q1);

                if ($res1) {


              $query1="DELETE FROM customer WHERE email='$g '";
                      mysqli_query($con,$query1);

                      header('location:customer.php');
                }
              }
}
else{
  header('location:dashboard.php'); 
}
?>