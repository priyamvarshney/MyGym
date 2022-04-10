<?php
include('includes/database.php');
session_start();

if(isset($_POST['submit']))
{
 	$order_id = $_POST['order_id'];
 	$order_status = $_POST['order_status'];
 	$transaction_id = $_POST['transaction_id'];

 	$sql="update customer_order set order_status='$order_status', transaction_id='$transaction_id' where orderId='$order_id'";
 	$result = mysqli_query($con,$sql);
	if($result)
	{
		header("location: profile.php");
	}	
	else 
	{
		echo mysqli_error($con);
	}
}

?>