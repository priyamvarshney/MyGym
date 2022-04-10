<?php
include('includes/database.php');
session_start();
if(isset($_SESSION["user_id"])){
      header("location:profile.php");
    }

$msg = "";
$msg1 = "An OTP has been sent to your registered mobile number!";
if (isset($_POST['verify'])) {
    $enter_otp = $_POST['enter_otp'];
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user_registration WHERE user_email = '$email' AND user_otp = '$enter_otp'";
    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $enter_otp = "";
        $sqli = "UPDATE user_registration SET user_otp = '$enter_otp', status = 1 WHERE user_email = '$email'";
        $rest = mysqli_query($con,$sqli);

        $msg1 = "Account Verified Successfully! Please <a href='login.php'>Click Here</a> to Login Now...!";
        
    }
    else
    {
        $msg = "OTP is Wrong! Enter Correct OTP again!";
    }
    
}

if (isset($_POST['resendOtp'])) {
    $otp = rand(000000,999999);
    $email = $_SESSION['email'];

    $sql = "UPDATE user_registration SET user_otp = '$otp' WHERE user_email = '$email'";
    $result = mysqli_query($con,$sql);
    if ($result) {
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

        $mail->setFrom('support@enridise.in', 'OTP Verification');
        $mail->addAddress($email);               // Name is optional
        $mail->addReplyTo('support@enridise.in');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $subject = "OTP for Account Verification";
        $mail->Subject = $subject;
        $mail->Body    = '<div style="background-color: black; color: white; text-align: center;"><h1 style="background-color: #F36100;">OTP for Account Verification<br></h1><h2 style="color: white;"><br>Account Created Successfully.<br>Your OTP is '.$otp.' for Account Activation.<br><br><hr>Regards: Team GMS<br><br><br></h2><div>';
        
        if(!$mail->send()) {
            echo "<script> alert('Error. Message could not be sent.');</script>";
        } else {
            
            $msg1 = "New OTP sent seccessfully to your email id ".$email;
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
    <title>Gym | Template</title>

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

    

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Verify Account</h2>
                    </div>
                    <h3 style="color: red;"><?= $msg ?></h3>
                    <h4 style="color: green"><?= $msg1 ?></h4><br>
                    <div class="leave-comment">
                        <form action="#" method="post">
                            <input type="text" name="enter_otp" placeholder="Enter OTP" required>
                            <button type="submit" name="verify">Verify</button>
                        </form>
                    </div>
                        <form action="#" method="post">
                            <button type="submit" name="resendOtp">Resend OTP</button>
                        </form>

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
                            <a href="index.php"><img src="img/logo1.png" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore magna aliqua endisse ultrices gravida lorem.</p>
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
                            <li><a href="#">About</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">T.&.C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Subscribe</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
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