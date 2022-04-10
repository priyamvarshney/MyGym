<?php

include('includes/database.php');
session_start();

if (isset($_POST['vendor_update_status'])) {
	$vendor_id = $_POST['vendor_id'];
	$vendor_registration_number = $_POST['vendor_registration_number'];
	$vendor_status = $_POST['vendor_status'];

	$sql = "UPDATE vendor_gym_registration SET vendor_status = '$vendor_status' WHERE vendor_id = '$vendor_id' AND vendor_registration_number = '$vendor_registration_number'";
	$result = mysqli_query($con,$sql);
	if ($result) {
		header('Location: vendors-details.php?update=success&vendor_registration_number=' .$vendor_registration_number. '');
	}
	else
	{

	}
}

?>