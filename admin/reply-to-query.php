<?php

include('includes/database.php');
session_start();

if(!isset($_SESSION["admin_registration_number"])){
      header("location:index.php");
    }

if (isset($_POST['reply_to_query'])) {
	$contact_id = $_POST['contact_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $reply = $_POST['reply'];

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

    $mail->setFrom('support@enridise.in', 'GMS');
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('support@enridise.in');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = '<div">Name: '.$name.'<br>Email: '.$email.'<br>Query: '.$message.'<br><br><br>Reply: '.$reply.'<div>';
    $mail->AltBody = $message;

    if(!$mail->send()) {
        echo "<script> alert('Error. Message could not be sent.');</script>";
    } else {
        $sql = "UPDATE contact_gym_query SET reply = '$reply' WHERE contact_id = '$contact_id'";
          $result = mysqli_query($con,$sql);
          if ($result)
            {
            	echo "<script> alert('Reply Sent Successfully!');</script>";
                echo "<div style='margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);'>
                		<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' href='dashboard.php' class='button'>Return Home</a>
                	  </div>";
            }
            else
            {
                echo "<script> alert('Error. Something went wrong!');</script>";
            }
    }
}

?>