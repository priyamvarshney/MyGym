<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">GYM Newslatter</h1>
          </div>

          <br><?php
          if (isset($_GET['success'])) {
              if ($_GET['success'] == 'deleted') {
                $deletedEmail = $_GET['email'];
                echo "<p style='color: green'>Email Id ".$deletedEmail." Successfully Deleted.</p>";
              }
            }
          ?><br>

          <!-- Content Row -->
          <div class="row">

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
                      <th scope="col">Email ID</th>
                      <th scope="col">Newslatter Subscription Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM subscription ORDER BY sub_id DESC";
                    $result = mysqli_query($con,$sql);
                    while ($rows=mysqli_fetch_array($result))
                    {
                      $sub_id = $rows['sub_id'];
                    	$sub_email = $rows['sub_email'];
                      $sub_date = $rows['sub_date'];

                    ?>
                    <tr style="font-size: 15px">
                      <th scope="row">#</th>
                      <td><?= $sub_email ?></td>
                      <td class="text-primary"><?= $sub_date ?></td>
                      <td>
                        <form method="post" action="#">
                          <input type="hidden" name="sub_id" value="<?= $sub_id ?>">
                          <input type="hidden" name="sub_email" value="<?= $sub_email ?>">
                          <button type="submit" name="submit" class="btn btn-primary">Delete Newslatter</button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>
<?php
$msg1="";
$msg="";
if (isset($_POST['submit'])) {
  $sub_id = $_POST['sub_id'];
  $sub_email = $_POST['sub_email'];

  $query = "DELETE FROM subscription WHERE sub_id = '$sub_id'";
  $results = mysqli_query($con,$query);
  if ($results)
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

            $mail->setFrom('support@enridise.in', 'DGM | Newslatter');
            $mail->addAddress($sub_email);               // Name is optional
            $mail->addReplyTo('support@enridise.in');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = "DGM | Newslatter Subscription";
            $mail->Subject = $subject;
            $mail->Body    = '<div style="color: black;"><h1 style="color: black;">DGM | Newslatter Subscription<br></h1><h4 style="color: black;"><br>You are successfully deleted to our Newslatter.<br><hr>Thanking You<br><br>Regards: Team GMS<br><br><br></h4><div>';
            //$mail->AltBody = $message;

            if(!$mail->send()) {
                echo "<script> alert('Error. Message could not be sent.');</script>";
            } else {
    echo "<script>window.location.href = 'gym-newslatter.php?success=deleted&email=".$sub_email."';</script>";
    //header('location : gym-newslatter.php?success='.$sub_email.'');
    //$msg = "Subscription Deleted having email id ".$sub_email.".";
            }
  }
  else
  {
    echo "<script>alert('Something went wrong.')</script>";
  }
}

?>
<?php include('includes/footer.php') ?>