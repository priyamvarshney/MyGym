<?php
include('includes/database.php');
session_start();
if(isset($_SESSION["user_id"])){
      header("location:profile.php");
}

$msg = "";
if (isset($_POST['submit'])) {
    $vendor_id = $_POST['vendor_id'];
    $sql = "SELECT * FROM vendor_gym_add_service WHERE vendor_id = '$vendor_id'";
    $result = mysqli_query($con,$sql);
}

$gymName = "SELECT * FROM vendor_gym_registration WHERE vendor_id = '$vendor_id'";
$resulting = mysqli_query($con,$gymName);
while($focus = mysqli_fetch_array($resulting)){
$vendor_business_name = $focus['vendor_business_name'];
$vendor_business_description = $focus['vendor_business_description'];
$vendor_gym_service_img = $focus['vendor_gym_service_img'];
$vendor_address = $focus['vendor_address'];
$vendor_landmark = $focus['vendor_landmark'];
$vendor_city = $focus['vendor_city'];
$vendor_pincode = $focus['vendor_pincode'];
$vendor_state = $focus['vendor_state'];

}

    $gt = "SELECT * FROM user_feedback WHERE rating = 'Good' AND vid = '$vendor_id'";
    $gs = mysqli_query($con,$gt);
    $gc = mysqli_num_rows($gs);

    $bt = "SELECT * FROM user_feedback WHERE vid = '$vendor_id'";
    $bs = mysqli_query($con,$bt);
    $bc = mysqli_num_rows($bs);
    if ($gc == 0) {
        $n = 3;
    } else {
    $calculate = $gc/$bc;
    $n = $calculate*5;
    }
    if ($n == 5) {
        $n = $n-1;
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
                        <h2>Services</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <h1 style="text-align: center; color: white;">Welcome to <?= $vendor_business_name ?></h1><hr>
        <h4 style="color: #F36100; padding-left: 50px; padding-right: 50px; padding-top: 10px; padding-bottom: 10px">Description: <?= $vendor_business_description ?></h4><hr>
        <h5 style="text-align: center; color: white; padding: 5px">Address: <?= $vendor_address ?> <?= $vendor_landmark ?><br><?= $vendor_city ?>-<?= $vendor_pincode ?>, <?= $vendor_state ?></h5><br>
        <div class="container">
                <?php
                $tStar = (int)$n;
                echo '<p style="text-align: center; font-size: 22px; padding: 5px; color: white">Rating &nbsp; : &nbsp; &nbsp;';
                for ($i=0; $i < $tStar; $i++) { 
                    echo '<span style="color: #FF9529" class="fa fa-star"></span> ';
                }
                echo ' Rated GYM</p>';
                ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h3 style="color: white;">Choose variety of services from <?= $vendor_business_name ?></h3>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php
                while ($rows=mysqli_fetch_array($result))
                {
                    $vendor_add_service_id = $rows['vendor_add_service_id'];
                    $vendor_service_name = $rows['vendor_service_name'];
                    $vendor_service_plan = $rows['vendor_service_plan'];
                    $vendor_service_offered1 = $rows['vendor_service_offered1'];
                    $vendor_service_offered2 = $rows['vendor_service_offered2'];
                    $vendor_service_offered3 = $rows['vendor_service_offered3'];
                    $vendor_service_offered4 = $rows['vendor_service_offered4'];
                    $vendor_service_offered5 = $rows['vendor_service_offered5'];
                    $vendor_service_offered6 = $rows['vendor_service_offered6'];
                    $vendor_service_offered7 = $rows['vendor_service_offered7'];
                    $vendor_service_offered8 = $rows['vendor_service_offered8'];
                    $vendor_service_price = $rows['vendor_service_price'];
                ?>
                <div class="card">
                  <img src="gym-vendor/img/uploadDocuments/gym_service_image/<?= $vendor_gym_service_img ?>" alt="Denim Jeans" style="width:100%">
                  <h3><?= $vendor_service_name ?></h3><br>
                  <p><b>Plan: <?= $vendor_service_plan ?> Days</b></p>
                  <p><b>Service Offered: <?= $vendor_service_offered1 ?>, <?= $vendor_service_offered2 ?>, <?= $vendor_service_offered3 ?>, <?= $vendor_service_offered4 ?>, <?= $vendor_service_offered5 ?>, <?= $vendor_service_offered6 ?>, <?= $vendor_service_offered7 ?>, <?= $vendor_service_offered8 ?></b></p>
                  <p class="price">₹ <?= $vendor_service_price ?></p>
                  
                    <!--    <form id="redirectForm" method="post" action="">
                        <input type="hidden" name="orderId" value="ORDS<?= rand(000000,999999) ?>"/>
                        <input type="hidden" name="orderAmount" value="<?= $vendor_service_price ?>"/>
                        <input type="hidden" name="servicePlan" value="<?= $vendor_service_plan ?>"/>
                        <input type="hidden" name="serviceId" value="<?= $vendor_add_service_id ?>"/>
                        <input type="hidden" name="vendorId" value="<?= $vendor_id ?>"/>
                    
                    </form>
                    -->
                        <button type="submit" name="submit" onclick="myFunction()" style="background-color: #F36100;">Buy Service</button>
                </div>
                <?php } ?>                
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

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
  DGM | Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <br> This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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

    <script>
function myFunction() {
  alert("You are not Login. Please login first!");
  window.location='login.php';
}
</script>

</body>

</html>