<?php
include('includes/database.php');
session_start();
if(isset($_SESSION["user_id"])){
      header("location:profile.php");
}

    $sql = "SELECT * FROM vendor_gym_registration WHERE vendor_status = 'Active'";
    $result = mysqli_query($con,$sql);
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

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Search Your City</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- City list along with gym list will be desplayed here -->

                <!--<div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04">
                        <option selected>Choose City...</option>
                        <option value="1">Patna City</option>
                        <option value="2">Patna</option>
                        <option value="3">Muzzafarpur</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div>
                </div>-->

                <div class="input-group mb-3">
                    <form action="search_service.php?search=<?= md5(uniqid()) ?>" method="post" class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search by Full GYM Name or City or Area Pincode..." name="search_city" aria-label="Search City..." aria-describedby="basic-addon2" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    
    <!-- Services Section End </section>-->

    <!-- Pricing Section Begin <section class="pricing-section spad">-->
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2>Choose your desire GYM</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php
                while ($rows=mysqli_fetch_array($result))
                {
                    $vendor_id = $rows['vendor_id'];
                    $vendor_business_name = $rows['vendor_business_name'];
                    $vendor_gym_main_img = $rows['vendor_gym_main_img'];
                    $vendor_city = $rows['vendor_city'];
                    $vendor_gym_sex = $rows['vendor_gym_sex'];
                ?>
                <div class="card">
                  <img src="gym-vendor/img/uploadDocuments/gym_main_image/<?= $vendor_gym_main_img ?>" alt="Denim Jeans" style="width:100%">
                  <h2><?= $vendor_business_name ?>(<?= $vendor_gym_sex ?>)</h2>
                  <p>This GYM is Located at</p>
                  <p class="price"><?= $vendor_city ?></p>
                  
                      <form method="post" action="gym-view-services.php?id=<?= md5(uniqid()) ?>&name=<?= hash('sha256', $vendor_business_name) ?>">
                        <input type="text" name="vendor_id" value="<?= $vendor_id ?>" hidden>
                        <button type="submit" name="submit" style="background-color: #F36100;">View Services</button>
                      </form>
                  
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
                            <a href="#"><img src="img/DGM-01.png" alt=""></a>
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
  DGM | Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <br> This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by Priyamm</p>
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