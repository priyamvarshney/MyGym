<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<?php

if (isset($_POST['submit'])) {
  $registration_number = $_POST['registration_number'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

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

    $mail->setFrom('support@enridise.in', 'Test Mailer');
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('support@enridise.in');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = '<div style="background-color: black; color: white; text-align: center;"><h1 style="background-color: #F36100;">Thanks For Contacting Us</h1><h2 style="color: white;">This is the reply for your query<br>We have recieved your query<br>And<br>We will contact you within 72 hours.<br><br>Regards: Team GMS<br><br></h2><div>';
    $mail->AltBody = $message;

    if(!$mail->send()) {
        echo "<script> alert('Error. Message could not be sent.');</script>";
    } else {
        $sql = "INSERT INTO contact_gym_query(registration_number,name,email,subject,message)VALUES('$registration_number','$name','$email','$subject','$message')";
          $result = mysqli_query($con,$sql);
          if ($result)
            {
                echo "<script> alert('Message Sent Successfully! We will contact you within 72 hours');
                window.location('user-contact.php');
                </script>";
            }
            else
            {
                echo "<script> alert('Error. Something went wrong!');</script>";
            }
    }
}

?>

<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Contact Us</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>Contact us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <span>Contact Us</span>
                        <h2>GET IN TOUCH</h2>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-map-marker"></i>
                        <p>Kachauri Gali, Patna City, Bihar<br/> 800008</p>
                        </div>
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li>+91-7033034637</li>
                                <li>+91-9113764578</li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p>navjot.s.ota456@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="#" method="post">
                            <input type="text" name="registration_number" placeholder="registration_number" value="Customer" hidden readonly required>
                            <input type="text" name="name" placeholder="Name" value="<?= $user_name ?>" readonly required>
                            <input type="text" name="email" placeholder="Email" value="<?= $user_email ?>" readonly required>
                            <input type="text" name="subject" placeholder="Subject" required>
                            <textarea name="message" placeholder="Message" required></textarea>
                            <button type="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--<div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12087.069761554938!2d-74.2175599360452!3d40.767139456514954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c254b5958982c3%3A0xb6ab3931055a2612!2sEast%20Orange%2C%20NJ%2C%20USA!5e0!3m2!1sen!2sbd!4v1581710470843!5m2!1sen!2sbd"
                    height="550" style="border:0;" allowfullscreen=""></iframe>
            </div>-->
        </div>
    </section>
    <!-- Contact Section End -->

    <?php include('includes/footer.php'); ?>