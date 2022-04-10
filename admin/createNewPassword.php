<?php

include('includes/database.php');
session_start();


if (isset($_POST['send_request'])) {
	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$password = $_POST['password'];
	$new_password = $_POST['new_password'];
	$hash_password = md5($password);

	if ($password != $new_password) {
		echo "Password and Confirm Password does not match";
	}
	else {
		$sql = "SELECT * FROM  pwdreset WHERE pwdResetSelector = '$selector' AND pwdResetToken = '$validator'";
		$result = mysqli_query($con,$sql);
	    $count = mysqli_num_rows($result);
	    if ($count == 1) {
	    	$row = mysqli_fetch_array($result);
	    	$getEmail = $row['pwdResetEmail'];
	    	$sql = "UPDATE admin_gms SET admin_password = '$hash_password' WHERE admin_email = '$getEmail'";
	    	$result = mysqli_query($con,$sql);
	    	if ($result) {
	    		echo "<script>alert('Password Changed Successfully!')</script>";
	    		$sql = "DELETE FROM pwdreset WHERE pwdResetEmail = '$getEmail'";
	    		$result = mysqli_query($con,$sql);
	    		header('Location: index.php?reset=success');
	    	}
	    	else {
	    		echo "<script>alert('Checksum Mishmatch!')</script>";
	    		
	    	}
	    }
	    else{
	    	echo "Link Expired";
	    }
	}


}
else
{
	header('Location: index.php');
}

?>