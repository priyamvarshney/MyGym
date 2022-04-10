<?php

$message = "";
$error_message = "";
if (isset($_POST['subscribe_submit'])) {
	$subscribe_email = $_POST['subscribe_email'];

	$sql = "SELECT * FROM subscription WHERE sub_email = '$subscribe_email'";
	$result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "<script>alert('You are already subscribed.');</script>";
    	//$error_message = "You are already subscribed.";
    } else {
    	$query = "INSERT INTO subscription (sub_email) VALUES ('$subscribe_email')";
    	$insert = mysqli_query($con,$query);
    	if ($insert) {
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

            $mail->setFrom('support@enridise.in', 'DGM | Newslatter');
            $mail->addAddress($subscribe_email);               // Name is optional
            $mail->addReplyTo('support@enridise.in');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = "DGM | Newslatter Subscription";
            $mail->Subject = $subject;
            $mail->Body    = '<div style="color: black;"><h1 style="color: black;">DGM | Newslatter Subscription<br></h1><h4 style="color: black;"><br>Thank you for subscribing to our Newslatter.<br>You are successfully subscribed to our Newslatter.<br><hr>Thanking You<br><br>Regards: Team GMS<br><br><br></h4><div>';
            //$mail->AltBody = $message;

            if(!$mail->send()) {
                echo "<script> alert('Error. Message could not be sent.');</script>";
            } else {
                echo "<script>alert('You are now subscribed.');window.location.href = 'index.php';</script>";
        		//$message = "You are now subscribed.";
            }
    	} else {
            echo "<script>alert('Can't subscribed right now.');window.location.href = 'index.php';</script>";
    		//$error_message = "Error.";
    	}
    }
}


?>

<p>Subscribe to our Newslatter</p>
<form action="#" method="post" class="input-group mb-3">

    <input type="text" class="form-control" placeholder="Enter Email Id" name="subscribe_email" aria-label="Search City..." aria-describedby="basic-addon2" required><br>
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" name="subscribe_submit">Subscribe</button>
    </div>
</form>
