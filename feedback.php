<?php
include('includes/database.php');
session_start();



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

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="#">
                            <img src="img/DGM-01.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

<?php

$msg = "";


?>

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <?php 
            	if (empty($_GET['id']) ||empty($_GET['sid']) ||empty($_GET['vid']) || empty($_GET['uid'])) {
    		?>
					<p style="color: red; text-align: center;font-size: 22px">Could not validate your request now!<br>Please retry after some time.</p>
			<?php
				}
				else
				{
					$id = $_GET['id'];
					$sid = $_GET['sid'];
					$vid = $_GET['vid'];
					$uid = $_GET['uid'];

					$check = "SELECT * FROM user_feedback WHERE order_id = '$id'";
					$to = mysqli_query($con,$check);
					$count = mysqli_num_rows($to);

					if ($count == 1) {
						echo "<script>
						alert('Feedback Already Submitted.');
						window.location.href = 'my-order.php';
						</script>";
					}
					else {


						$sql = "SELECT * from user_registration where user_id = '$uid'";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)){
							$name = $row['user_name'];
							$email = $row['user_email'];
						}
						$query = "SELECT * from vendor_gym_registration where vendor_id = '$vid'";
						$results = mysqli_query($con,$query);
						while($rows = mysqli_fetch_array($results)){
							$vendor_business_name = $rows['vendor_business_name'];
						}
				?>
						<div class="row">
			                <div class="col-lg-12">
			                    <div class="section-title">
			                        <span>Please Provide Your Valuable Feedback</span><br>
			                        <span>to</span><br>
			                        <p style="color: white; font-size: 32px; padding-top: 20px"><?= $vendor_business_name ?></p>
			                    </div>
			                </div>
	            		</div>
	            		<div class="row justify-content-center">

						<form role="form" method="post" action="submit-feedback.php">
				            <div class="row">
				                <div class="col-sm-12 form-group">
				                <label style="color: white">1. How do you rate your overall experience?</label>
				                <p>
				                    <label class="radio-inline" style="color: red">
				                    <input type="radio" name="experience" id="radio_experience" value="Bad" required>
				                    Bad
				                    </label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

				                    <label class="radio-inline" style="color: green">
				                    <input type="radio" name="experience" id="radio_experience" value="Good" required>
				                    Good
				                    </label>
				                </p>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-sm-12 form-group">
				                    <label for="comments" style="color: white">
				                        2. Comments:</label>
				                    <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7" required></textarea>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-sm-6 form-group">
				                    <label for="name" style="color: white">
				                    3.    Your Name:</label>
				                    <input type="text" class="form-control" id="name" value="<?= $name ?>" name="name" readonly required>
				                </div>
				                <div class="col-sm-6 form-group">
				                    <label for="email" style="color: white">
				                    4.    Email:</label>
				                    <input type="email" class="form-control" id="email" value="<?= $email ?>" name="email" readonly required>
				                    <input type="hidden" class="form-control" id="email" value="<?= $vid ?>" name="vid" readonly required>
				                    <input type="hidden" class="form-control" id="email" value="<?= $sid ?>" name="sid" readonly required>
				                    <input type="hidden" class="form-control" id="email" value="<?= $uid ?>" name="uid" readonly required>
				                    <input type="hidden" class="form-control" id="email" value="<?= $id ?>" name="id" readonly required>
				                </div>
				            </div>

		                    <div class="row">
				                <div class="col-sm-12 form-group">
				                    <button type="submit" class="btn btn-lg btn-warning btn-block" name="submit">Post </button>
				                </div>
		            		</div>
						</form>
			<?php
					}
				} 
			?>
            </div>
        </div>
    </section>

	<section class="footer-section">
        <div class="container">
			<div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
				