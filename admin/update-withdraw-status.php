<?php

include('includes/database.php');
session_start();

if(!isset($_SESSION["admin_registration_number"])){
      header("location:index.php");
    }

if (isset($_POST['view_more_order'])) {
	$o_id = $_POST['o_id'].'<br>';
	$orderId = $_POST['orderId'];
	$withdraw_status = $_POST['withdraw_status'];

	$sql = "UPDATE customer_order SET withdraw_status = '$withdraw_status' WHERE orderId = '$orderId' AND o_id = '$o_id'";
          $result = mysqli_query($con,$sql);
          if ($result)
            {
            	echo "<script> alert('Withdraw Status Changed Successfully!');
              window.location.href = 'total-order.php';</script>";
                
            }
            else
            {
                echo "<script> alert('Error. Something went wrong!');</script>";
            }
}

?>