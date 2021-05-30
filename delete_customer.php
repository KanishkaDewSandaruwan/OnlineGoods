<?php 
require_once 'connection.php';
require_once 'user.php';

$g = $_SESSION['customer_id'];
	        $query2="DELETE FROM customer WHERE customer_id='$id'";
            mysqli_query($con,$query2);

	         header('location:logout.php');
 ?>