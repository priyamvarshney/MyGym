<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

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
              echo "<script>window.location.href = 'user-contact.php?return=success&name=".$subject."';</script>";
            }
            else
            {
                echo "<script> alert('Error. Something went wrong!');</script>";
            }
    }
}


?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h4 class="text-success"><?php

                if (isset($_GET['return'])) {
                  if ($_GET['return'] == 'success') {
                    $subject = $_GET['name'];
                    echo "['$subject']=>Querry Submitted Successfully!";
                  }
                }

                ?></h4>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>
            <h2 class="h3 mb-0 text-gray-800">Have any Problem Feel free to contact us</h2>

          <br><br>

          <!-- Content Row -->
          <div class="row">

            <form  class="input-group mb-3" method="post">

              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="registration_number" value="<?= $vendor_registration_number ?>" hidden readonly required>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $vendor_name ?>" readonly required>
              </div>
              <div class="input-group mb-3">
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= $vendor_email ?>" readonly required>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="subject" placeholder="Subject" required>
              </div>
              <div class="input-group mb-3">
                <textarea type="text" class="form-control" id="exampleInputEmail1" name="message" placeholder="Message" required></textarea>
              </div>

              <div class="input-group mb-3 leave-comment">
                <input type="submit" class="form-control btn btn-primary" id="exampleInputEmail1" name="submit" value="Submit" required>
              </div>

            </form>  
          </div>


        </div>
        <!-- /.container-fluid -->

        

      </div>
      <!-- End of Main Content -->

<?php include('includes/footer.php') ?>

      