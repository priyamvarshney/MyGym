<?php

include('includes/database.php');
session_start();

if (isset($_POST['submit'])) {
	$experience = $_POST['experience'];
	$comments = $_POST['comments'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$vid = $_POST['vid'];
	$sid = $_POST['sid'];
	$uid = $_POST['uid'];
	$id = $_POST['id'];

	$sql = "INSERT INTO user_feedback (order_id,vid,sid,uid,name,email,rating,coment) VALUES ('$id','$vid','$sid','$uid','$name','$email','$experience','$comments')";
	$result = mysqli_query($con,$sql);
	if ($result) {
		echo "<script>
		alert('Feedback Submitted Successfullt!');
		window.location.href = 'my-order.php';
		</script>";
	} else {
		echo "<script>
		alert('Feedback Submitted Failed!');
		window.location.href = 'my-order.php';
		</script>";
	}
}


?>