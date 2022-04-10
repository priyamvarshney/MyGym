<?php
include('includes/database.php');
session_start();
if(isset($_SESSION["user_id"])){
      header("location:profile.php");
    }

$msg = "";

$sqli = "SELECT * FROM vendor_gym_registration ORDER BY vendor_registration_number DESC LIMIT 1";
$results = mysqli_query($con,$sqli);
$row = mysqli_fetch_array($results);
$lastRegNo = $row['vendor_registration_number'];
if ($lastRegNo == " ") {
    $new_vendor_registration_number = "vndr".$year = date("Y") ."1001";
} else {
    $new_vendor_registration_number = substr($lastRegNo,4);
    $new_vendor_registration_number = intval($new_vendor_registration_number);
    $new_vendor_registration_number = $year = date("Y").($new_vendor_registration_number + 1);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gym_name = $_POST['gym_name'];
    $email = $_POST['email'];
    $p = $_POST['password'];
    $password = md5($_POST['password']);
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];  
    $state = $_POST['state'];
    $gym_type = $_POST['gym_type'];
    $pan_detail = $_POST['pan_detail'];
    $gst_detail = $_POST['gst_detail'];
    $registration_number = $_POST['registration_number'];

        $sqli = "SELECT vendor_registration_number FROM vendor_gym_registration ORDER BY vendor_id";
        $results = mysqli_query($con,$sqli);
        $row = mysqli_fetch_array($results);
        $vendor_registration_number = $row['vendor_registration_number'];
        $new_vendor_registration_number = $vendor_registration_number + 1;

    $sql = "SELECT * FROM vendor_gym_registration WHERE vendor_email = '$email'";
    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
        //if user record is available in database then $count will be equal to 1
    if($count == 1)
    {
        $msg = "Email id already registered. Please login with this Email id by <a href='gym-vendor/index.php'>Clicking here</a>";
    }
    else
    {


        $sqli = "INSERT INTO vendor_gym_registration(vendor_registration_number,vendor_name,vendor_business_name,vendor_gym_sex,vendor_email,vendor_password,vendor_mobile_number,vendor_address,vendor_city,vendor_pincode,vendor_state,vendor_pan_detail,vendor_gst_detail)VALUES('$registration_number','$name','$gym_name','$gym_type','$email','$password','$mobile','$address','$city','$pincode','$state','$pan_detail','$gst_detail')";
        $resultt = mysqli_query($con,$sqli);
        if ($resultt)
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

            $mail->setFrom('support@enridise.in', 'GYM Registration Application');
            $mail->addAddress($email);               // Name is optional
            $mail->addReplyTo('support@enridise.in');

            //$mail->addAttachment('files/DGM Vendor GYM Registration Form.pdf');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = "Confirmation GYM Registration Application";
            $mail->Subject = $subject;
            $mail->Body    = '<div style="color: black;">This is a confirmation mail regarding GYM Registration Application that you have successfully applied for GYM Registration in DGM.<br><br>Your Login credentials are:<br>id: '.$registration_number.'<br>Password: '.$p.'<br><br>Thanking You, Regards<br>DGM<div>';
           

            if(!$mail->send()) {
                header('location: gym-register.php?gymregister=error');
            } else {
                header('location: gym-vendor/index.php?gymregister=success');
            }
            
        }
        else
        {
            echo "<script> alert('Error. Something went wrong!');</script>";
        }
    }
}


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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="services.php">Search Gym</a></li>
                <!--<li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="about-us.html">About us</a></li>
                        <li><a href="class-timetable.html">Classes timetable</a></li>
                        <li><a href="bmi-calculator.html">Bmi calculate</a></li>
                        <li><a href="team.html">Our team</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="blog.html">Our blog</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </li>-->
                <li><a href="contact.php">Contact</a></li>
                <li><a href="gym-register.php">Register GYM</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="login.php">Login</a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="index.php">
                            <img src="img/DGM-01.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.php">About Us</a></li>
                            <!--<li><a href="classes.html">Classes</a></li>-->
                            <li><a href="services.php">Search Gym</a></li>
                            <!--<li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="class-timetable.html">Classes timetable</a></li>
                                    <li><a href="bmi-calculator.html">Bmi calculate</a></li>
                                    <li><a href="team.html">Our team</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="blog.html">Our blog</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                            </li>-->
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="gym-register.php">Register GYM</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            <a href="login.php">Login</a>
                            <a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Register your GYM</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>Register your GYM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['gymregister'])) {
                        if ($_GET['gymregister'] == 'success') {
                            echo '<p style="color: green">Your GYM registration application submitted successfully. A confirmation mail has been sent to your mail id.!</p>';
                        } 
                        if ($_GET['gymregister'] == 'error') {
                            echo '<p style="color: red">Your GYM registration application submitted successfully. Error sending mail!</p>';
                        }
                    }
                    ?>
                    <div class="section-title">
                        <h2>Register your GYM</h2>
                    </div>
                    <h3 style="color: red;"><?= $msg ?></h3>
                    <div class="leave-comment">
                        <form action="#" method="post">
                            <label style="color: white">Your Registration Number (<span style="color: red">Not editable</span>)</label>
                            <input type="text" name="registration_number" placeholder="Your Name" value="<?= $new_vendor_registration_number ?>" readonly required>
                            <input type="text" name="name" placeholder="Your Name*" required>
                            <input type="text" name="gym_name" placeholder="GYM Name*" required>
                            <select style="color: white; background-color: black" class="custom-select" name="gym_type" required>
                              <option selected>Select GYM Type*</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Unisex">Unisex</option>
                            </select><br><br>
                            <input type="email" name="email" placeholder="Email*" required>
                            <input type="password" name="password" placeholder="Password*" required>
                            <input type="text" name="mobile" placeholder="Mobile Number*" required>
                            <input type="text" name="address" placeholder="GYM Address*" required>
                            <input type="text" name="city" placeholder="GYM City*" required>
                            <input type="text" name="pincode" placeholder="GYM Pincode*" maxlength="6" required>
                            <input type="text" name="state" placeholder="GYM State*" required>
                            <input type="text" name="pan_detail" placeholder="PAN Number*" required>
                            <input type="text" name="gst_detail" placeholder="GST Number">
                            <p>By clicking 'Submit' you are aggree to our <a href="termsConditions.php" target="_blank">Terms & Conditions</a>.</p>
                            <button type="submit" name="submit">Submit</button>
                        </form>
                    </div><br>
                        <h4 style="color: white; font-size: 20px; text-align: center;">Go to <a href="gym-vendor/index.php"><span>Login</a></h4>

                </div>

            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-map-marker"></i>
                        <p>Kachauri Gali, Patna City, Bihar<br/> 800008</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>+91-7033034637</li>
                            <li>+91-9113764578</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>navjot.s.ota456@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="img/logo1.png" alt=""></a>
                        </div>
                        <!--<div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa  fa-envelope-o"></i></a>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Useful links</h4>
                        <ul>
                            <li><a href="about-us.php">About</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="termsConditions.php">T.&.C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div style="width: auto; margin-left: 16px">
                    <?php include('includes/subscribe.php'); ?>
                </div>
                <!--<div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h4>Tips & Guides</h4>
                        <div class="fw-recent">
                            <h6><a href="#">Physical fitness may help prevent depression, anxiety</a></h6>
                            <ul>
                                <li>3 min read</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                        <div class="fw-recent">
                            <h6><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a></h6>
                            <ul>
                                <li>3 min read</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  DGM | Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <br> This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by Priyam</p>
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