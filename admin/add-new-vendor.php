<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<?php

$sql = "SELECT * FROM vendor_gym_registration ORDER BY vendor_id DESC";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
$rows = mysqli_fetch_array($result);
$vndr_reg = $rows['vendor_registration_number'];

?>

<?php

if (isset($_POST['register_vendor'])) {
  $vendor_reg_number = $_POST['vendor_reg_number'];
  $vendor_name = $_POST['vendor_name'];
  $vendor_business_name = $_POST['vendor_business_name'];
  $vendor_gym_sex = $_POST['vendor_gym_sex'];
  $vendor_email = $_POST['vendor_email'];
  $vendor_mobile_number = $_POST['vendor_mobile_number'];
  $vendor_address = $_POST['vendor_address'];
  $vendor_landmark = $_POST['vendor_landmark'];
  $vendor_city = $_POST['vendor_city'];
  $vendor_pincode = $_POST['vendor_pincode'];
  $vendor_state = $_POST['vendor_state'];
  $vendor_pan_detail = $_POST['vendor_pan_detail'];
  $vendor_gst_detail = $_POST['vendor_gst_detail'];

  $sql = "SELECT * FROM vendor_gym_registration WHERE vendor_email = '$vendor_email'";
  $result = mysqli_query($con,$sql);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    echo "<script>alert('Email id already registered with this account!')</script>";
  }
  else
  {

    $query = "INSERT INTO vendor_gym_registration (vendor_registration_number, vendor_name, vendor_business_name, vendor_gym_sex, vendor_email, vendor_mobile_number, vendor_address, vendor_landmark, vendor_city, vendor_pincode, vendor_state, vendor_pan_detail, vendor_gst_detail) VALUES ('$vendor_reg_number','$vendor_name','$vendor_business_name','$vendor_gym_sex','$vendor_email','$vendor_mobile_number','$vendor_address','$vendor_landmark','$vendor_city','$vendor_pincode','$vendor_state','$vendor_pan_detail','$vendor_gst_detail')";
    $results = mysqli_query($con,$query);
    if($results)
    {
      $selector = md5(rand(0000,9999));
      $token = md5(rand(000000000,999999999));
      $expires = date("U") + 1800;

      $url = "http://localhost/gymlife/gym-vendor/create-new-request.php?email=" .$vendor_email. "&selector=" . $selector . "&validator=" . $token;

      $sql = "INSERT INTO pwdreset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) values ('$vendor_email','$selector','$token','$expires')";
      $result = mysqli_query($con,$sql);
      if (!$result) {
        echo "There was an Erroe!";
      }
      else
      {
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

        $mail->setFrom('support@enridise.in', 'Vendor Create Password Link');
        $mail->addAddress($vendor_email);               // Name is optional
        $mail->addReplyTo('support@enridise.in');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'DGM | Create Vendor Password Link';
        $mail->Body    = '<div style="color: black;">Click on the link given below to Create your Vendor password.<br><br><br><a href="'.$url.'">Click Here</a><br><br>Thanking You, Regards<br>DGM<div>';

        if(!$mail->send()) {
            echo "<script> alert('Error. Message could not be sent.');</script>";
        }
        else
        {
          echo "<script>alert('Vendor registered successfully! Create password link sended to vendor email.')</script>";
        }
      }
    }
    else
    {
      echo "<script>alert('Error. Something went wrong!')</script>";
    }

  }

}

?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          

          <br><br>

          <!-- Content Row -->
            <h2>Last Vendor Registration Number : <?= $vndr_reg ?></h2>
            <br>
            <h1 class="h3 mb-0 text-gray-800">Add New Vendors</h1>
            <br>
            <form method="post" enctype="multipart/form-data">
              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_reg_number" placeholder="Vendor Registration Number" value="vndr" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_name" placeholder="Vendor Name" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_business_name" placeholder="Vendor GYM Name" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_gym_sex" placeholder="Vendor GYM Type : Male/Female/Unisex" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_email" placeholder="Vendor email" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_mobile_number" placeholder="Vendor Mobile Number" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_address" placeholder="Vendor Address" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_landmark" placeholder="Vendor Landmark" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_city" placeholder="Vendor City" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_pincode" placeholder="Vendor Pincode" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_state" placeholder="Vendor State" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_pan_detail" placeholder="Vendor PAN Number" required>

              <input style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" name="vendor_gst_detail" placeholder="Vendor GST Number">

              <input class="btn btn-primary" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="submit" name="register_vendor" placeholder="Register Vendor">
            </form>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>

