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
		header('Location: http://localhost/gymlife/gym-vendor/create-new-request.php?email=' .$vendor_email. '&selector=' . $selector . '&validator=' . $validator . '&reset=wrong');
	}
	else {
		$sql = "SELECT * FROM  pwdreset WHERE pwdResetSelector = '$selector' AND pwdResetToken = '$validator'";
		$result = mysqli_query($con,$sql);
	    $count = mysqli_num_rows($result);
	    if ($count == 1) {
	    	$row = mysqli_fetch_array($result);
	    	$getEmail = $row['pwdResetEmail'];
	    	$sql = "UPDATE vendor_gym_registration SET vendor_password = '$hash_password' WHERE vendor_email = '$getEmail'";
	    	$result = mysqli_query($con,$sql);
	    	if ($result) {
	    		$sqlis = "DELETE FROM pwdreset WHERE pwdResetEmail = '$getEmail'";
	    		$resulttes = mysqli_query($con,$sqlis);
	    		header('Location: index.php?reset=success');
	    	}
	    	else {
	    		echo "<script>alert('Checksum Mishmatch!')</script>";
	    		
	    	}
	    }
	    else{
	    	header('Location: index.php?reset=expired');
	    }
	}


}
else
{
	header('Location: index.php');
}

?>