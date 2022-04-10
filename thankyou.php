<?php
include('includes/database.php');
session_start();

/*$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_mobile = $_SESSION['user_mobile'];*/

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DGM | Online GYM</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script src="https://www.cashfree.com/assets/cashfree.sdk.v1.2.js" type="text/javascript"></script>

    <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
<?php //include('includes/navbar.php') ?>
<?php

$msg = "";

?>

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Thank You For Using Us...!</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
            	
					<?php  
					$p = "";
					$secretkey = "ab482bedc37effcee63448e1bd6e63afde84667d"; // test : ab482bedc37effcee63448e1bd6e63afde84667d  PROD : d9bb74aad0f76165f5493e9edf3a69d4f9f23384
					$orderId = $_POST["orderId"];
					$orderAmount = $_POST["orderAmount"];
					$referenceId = $_POST["referenceId"];
					$txStatus = $_POST["txStatus"];
					$paymentMode = $_POST["paymentMode"];
					$txMsg = $_POST["txMsg"];
					$txTime = $_POST["txTime"];
					$signature = $_POST["signature"];
					$data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
					$hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
					$computedSignature = base64_encode($hash_hmac);

					$sql = "SELECT * FROM customer_order WHERE orderId = '$orderId'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($result);
					$user_id = $row['user_id'];

					$query = "SELECT * FROM user_registration WHERE user_id = '$user_id'";
					$results = mysqli_query($con,$query);
			        $countt = mysqli_num_rows($results);
			        if ($countt == 1) {
			            $rows = mysqli_fetch_array($results);
			            $_SESSION["user_id"] = $rows["user_id"];
			            $_SESSION["user_name"] = $rows["user_name"];
			            $_SESSION['user_email'] = $rows["user_email"];
			            $_SESSION['user_mobile'] = $rows["user_mobile"];

			            $buyer_email = $_SESSION['user_email'];
			        }

					if ($signature == $computedSignature)
					{
						$querys = "SELECT * FROM order_payments WHERE orderId = '$orderId'";
						$resultss = mysqli_query($con,$querys);
				        $counts = mysqli_num_rows($resultss);
				        if ($counts == 1)
				        {
				        	$p = "Order Inserted.";
				        ?>
				        	<h2 style="color: white"><?= $msg ?></h2><br>
						    <h2 style="color: white">Payment Details!</h2><br><br>
							<table class="table table-bordered" style="color: white;">
								<tr>
									<th>Order Status :</th>
									<td><?php echo $txStatus; ?></td>
								</tr>
								<tr>
									<th>Order Id :</th>
									<td><?php echo $orderId; ?></td>
								</tr>
								<tr>
									<th>Service Paid Amount :</th>
									<td><?php echo $orderAmount; ?></td>
								</tr>
								<tr>
									<th>Transaction Id :</th>
									<td><?php echo $referenceId; ?></td>
								</tr>
								<tr>
							        <td>Payment Mode </td>
							        <td><?php echo $paymentMode; ?></td>
							    </tr>
							    <tr>
							        <td>Message</td>
							        <td><?php echo $txMsg; ?></td>
							    </tr>
							    <tr>
							        <td>Transaction Time</td>
							        <td><?php echo $txTime; ?></td>
							    </tr>
							</table>

							<form method="post" action="my-order.php" class="form-group">
								<input type="test" name="order_id" value="<?= $response['purpose']; ?>" hidden>
								<input type="test" name="transaction_id" value="<?= $response['payments'][0]['payment_id']; ?>" hidden>
								<input type="test" name="order_status" value="<?= $response['status']; ?>" hidden>
								<button class="form-control btn submit_btn" type="submit" name="submit" style="background-color: #F36100; color: white">Continue Home</button>
							</form>
						<?php
				        }
				        else
				        {

				        	$try = "SELECT vendorId FROM customer_order WHERE orderId = '$orderId'";
				        	$catch = mysqli_query($con,$try);
				        	while($rowes = mysqli_fetch_array($catch)){
				        		$vendorId = $rowes['vendorId'];
				        	}

				        	$ty = "SELECT * FROM vendor_balance WHERE vendor_id = '$vendorId'";
				        	$cth = mysqli_query($con,$ty);
				        	$cnts = mysqli_num_rows($cth);
				        	if ($cnts == 1) {
				        		while($roweis = mysqli_fetch_array($cth)){
				        			$vendor_total_balance = $roweis['vendor_total_balance'];
				        		}
				        		$Amount = "";
				        		$new_total_balance = "";
				        		$Amount = $orderAmount - $orderAmount*10/100;
				        		$new_total_balance = $vendor_total_balance + $Amount;
				        		$update = "UPDATE vendor_balance SET vendor_total_balance = '$new_total_balance' WHERE vendor_id = '$vendorId'";
				        		$updates = mysqli_query($con,$update);

				        		$sql="INSERT INTO order_payments(orderId,transaction_id,transaction_amount,transaction_status) VALUES('$orderId','$referenceId','$orderAmount','$txStatus')";
		 						$result = mysqli_query($con,$sql);

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

							    $mail->setFrom('support@enridise.in', 'Order Confirmation Mail');
							    $mail->addAddress($buyer_email);               // Name is optional
							    $mail->addReplyTo('support@enridise.in');

							    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
							    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
							    $mail->isHTML(true);                                  // Set email format to HTML

							    $mail->Subject = 'Your order '.$orderId.' having transaction id '.$referenceId.' on DGM is '.$txStatus.'.';
							    $mail->Body    = '
							    <h2 style="color: black">Thankyou for using our system!</h2>
							    <center><div style="background-color: #335ACB; color: white"><br>
							    <h2 style="color: white">Your order '.$orderId.' having transaction id '.$referenceId.' on DGM is '.$txStatus.'.</h2><br><br>
								<table class="table table-bordered" style="color: black; width: 100%; height: 500px">
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Order Status :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$txStatus.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Order Id :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$orderId.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Service Paid Amount :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$orderAmount.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Payment Id :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$referenceId.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Payee Email :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$buyer_email.'</td>
									</tr>
								</table></div></center>
							    ';
							    //$mail->AltBody = $message;

							    if(!$mail->send()) {
							        echo "<script> alert('Error. Message could not be sent.');</script>";
							    } else {
							    	

							    ?>
							    <h2 style="color: white"><?= $msg ?></h2><br>
							    <h2 style="color: white">Payment Details!</h2><br><br>
								<table class="table table-bordered" style="color: white;">
									<tr>
										<th>Order Status :</th>
										<td><?php echo $txStatus; ?></td>
									</tr>
									<tr>
										<th>Order Id :</th>
										<td><?php echo $orderId; ?></td>
									</tr>
									<tr>
										<th>Service Paid Amount :</th>
										<td><?php echo $orderAmount; ?></td>
									</tr>
									<tr>
										<th>Transaction Id :</th>
										<td><?php echo $referenceId; ?></td>
									</tr>
									<tr>
								        <td>Payment Mode </td>
								        <td><?php echo $paymentMode; ?></td>
								    </tr>
								    <tr>
								        <td>Message</td>
								        <td><?php echo $txMsg; ?></td>
								    </tr>
								    <tr>
								        <td>Transaction Time</td>
								        <td><?php echo $txTime; ?></td>
								    </tr>
								</table>

								<form method="post" action="my-order.php" class="form-group">
									<input type="test" name="order_id" value="<?= $response['purpose']; ?>" hidden>
									<input type="test" name="transaction_id" value="<?= $response['payments'][0]['payment_id']; ?>" hidden>
									<input type="test" name="order_status" value="<?= $response['status']; ?>" hidden>
									<button class="form-control btn submit_btn" type="submit" name="submit" style="background-color: #F36100; color: white">Continue Home</button>
								</form>
								<?php
								}
				        	} else {
				        		$Amount = "";
				        		$Amount = $orderAmount - $orderAmount*10/100;
				        		$insert = "INSERT INTO vendor_balance (vendor_id, vendor_total_balance) VALUES ('$vendorId','$Amount')";
				        		$inserts = mysqli_query($con,$insert);

				        		$sql="INSERT INTO order_payments(orderId,transaction_id,transaction_amount,transaction_status) VALUES('$orderId','$referenceId','$orderAmount','$txStatus')";
		 						$result = mysqli_query($con,$sql);

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

							    $mail->setFrom('support@enridise.in', 'Order Confirmation Mail');
							    $mail->addAddress($buyer_email);               // Name is optional
							    $mail->addReplyTo('support@enridise.in');

							    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
							    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
							    $mail->isHTML(true);                                  // Set email format to HTML

							    $mail->Subject = 'Your order '.$orderId.' having transaction id '.$referenceId.' on DGM is '.$txStatus.'.';
							    $mail->Body    = '
							    <h2 style="color: black">Thankyou for using our system!</h2>
							    <center><div style="background-color: #335ACB; color: white"><br>
							    <h2 style="color: white">Your order '.$orderId.' having transaction id '.$referenceId.' on DGM is '.$txStatus.'.</h2><br><br>
								<table class="table table-bordered" style="color: black; width: 100%; height: 500px">
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Order Status :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$txStatus.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Order Id :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$orderId.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Service Paid Amount :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$orderAmount.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Payment Id :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$referenceId.'</td>
									</tr>
									<tr>
										<th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Payee Email :</th>
										<td style="text-align: left; padding: 8px; background-color: #f2f2f2">'.$buyer_email.'</td>
									</tr>
								</table></div></center>
							    ';
							    //$mail->AltBody = $message;

							    if(!$mail->send()) {
							        echo "<script> alert('Error. Message could not be sent.');</script>";
							    } else {
							    	

							    ?>
							    <h2 style="color: white"><?= $msg ?></h2><br>
							    <h2 style="color: white">Payment Details!</h2><br><br>
								<table class="table table-bordered" style="color: white;">
									<tr>
										<th>Order Status :</th>
										<td><?php echo $txStatus; ?></td>
									</tr>
									<tr>
										<th>Order Id :</th>
										<td><?php echo $orderId; ?></td>
									</tr>
									<tr>
										<th>Service Paid Amount :</th>
										<td><?php echo $orderAmount; ?></td>
									</tr>
									<tr>
										<th>Transaction Id :</th>
										<td><?php echo $referenceId; ?></td>
									</tr>
									<tr>
								        <td>Payment Mode </td>
								        <td><?php echo $paymentMode; ?></td>
								    </tr>
								    <tr>
								        <td>Message</td>
								        <td><?php echo $txMsg; ?></td>
								    </tr>
								    <tr>
								        <td>Transaction Time</td>
								        <td><?php echo $txTime; ?></td>
								    </tr>
								</table>

								<form method="post" action="my-order.php" class="form-group">
									<input type="test" name="order_id" value="<?= $response['purpose']; ?>" hidden>
									<input type="test" name="transaction_id" value="<?= $response['payments'][0]['payment_id']; ?>" hidden>
									<input type="test" name="order_status" value="<?= $response['status']; ?>" hidden>
									<button class="form-control btn submit_btn" type="submit" name="submit" style="background-color: #F36100; color: white">Continue Home</button>
								</form>
							    <?php
								}

				        	}

						}
					}
					else
					{
						$sql="INSERT INTO order_payments(orderId,transaction_id,transaction_amount,transaction_status) VALUES('$orderId','$referenceId','$orderAmount','$txStatus')";
		 				$result = mysqli_query($con,$sql);
						?>
						<h2 style="color: white"><?= $msg ?></h2><br>
					    <h2 style="color: white">Payment Details!</h2><br><br>
						<table class="table table-bordered" style="color: white;">
							<tr>
								<th>Order Status :</th>
								<td><?php echo $txStatus; ?></td>
							</tr>
							<tr>
								<th>Order Id :</th>
								<td><?php echo $orderId; ?></td>
							</tr>
							<tr>
								<th>Service Paid Amount :</th>
								<td><?php echo $orderAmount; ?></td>
							</tr>
							<tr>
								<th>Transaction Id :</th>
								<td><?php echo $referenceId; ?></td>
							</tr>
							<tr>
						        <td>Payment Mode </td>
						        <td><?php echo $paymentMode; ?></td>
						    </tr>
						    <tr>
						        <td>Message</td>
						        <td><?php echo $txMsg; ?></td>
						    </tr>
						    <tr>
						        <td>Transaction Time</td>
						        <td><?php echo $txTime; ?></td>
						    </tr>
						</table>

						<form method="post" action="my-order.php" class="form-group">
							<input type="test" name="order_id" value="<?= $response['purpose']; ?>" hidden>
							<input type="test" name="transaction_id" value="<?= $response['payments'][0]['payment_id']; ?>" hidden>
							<input type="test" name="order_status" value="<?= $response['status']; ?>" hidden>
							<button class="form-control btn submit_btn" type="submit" name="submit" style="background-color: #F36100; color: white">Continue Home</button>
						</form>
						
			<?php 	}
					
				?>
            </div>
        </div>
    </section>

	<?php include('includes/footer.php') ?>
				