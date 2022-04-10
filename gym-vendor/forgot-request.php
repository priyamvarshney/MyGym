<?php
include('includes/database.php');
session_start();

if (isset($_POST['send_request'])) {
	$email = $_POST['email'];

	$selector = md5(rand(0000,9999));

	$token = md5(rand(000000000,999999999));

	$url = "http://localhost/gymlife/gym-vendor/create-new-request.php?selector=" . $selector . "&validator=" . $token;

	$expires = date("U") + 1800;
	
	$sql = "DELETE FROM pwdreset WHERE pwdResetEmail = '$email'";
	$result = mysqli_query($con,$sql);
	if (!$result) {
		echo "There was an Erroe!";
	}
	else
	{
		echo "Old Data deleted successfully!";
	}

	$sql = "INSERT INTO pwdreset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) values ('$email','$selector','$token','$expires')";
	$result = mysqli_query($con,$sql);
	if (!$result) {
		echo "There was an Erroe!";
	}
	else
	{
		echo "Row inserted successfully!";
	}
	

	require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@enridise.in';                 // SMTP username
    $mail->Password = '@123Papa';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('support@enridise.in', 'Enridise Reset Password Link');
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('support@enridise.in');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Reset Password Link';
    $mail->Body    = '<div style="color: black;">Click on the link given below to reser your password.<br><br><br><a href="'.$url.'">'.$url.'</a><div>';
    $mail->AltBody = $message;

    if(!$mail->send()) {
        echo "<script> alert('Error. Message could not be sent.');</script>";
    }
    else
    {
    	header('Location: forgot_password.php?reset=success');
    }
}
else
{
	header('Location: index.php');
}

?>