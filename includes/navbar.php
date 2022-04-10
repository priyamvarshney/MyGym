
    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="profile.php">Home</a></li>
                <li><a href="user-about-us.php">About Us</a></li>
                <li><a href="user-services.php">Search Gym</a></li>
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
                <li><a href="user-contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a>Welcome <?= $user_name ?></a>
            <a href="my-order.php">My Order</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="profile.php">
                            <img src="img/logo1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="profile.php">Home</a></li>
                            <li><a href="user-about-us.php">About Us</a></li>
                            <!--<li><a href="classes.html">Classes</a></li>-->
                            <li><a href="user-services.php">Search Gym</a></li>
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
                            <li><a href="user-contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            <a>Welcome <?= $user_name ?></a>
                            <a href="my-order.php">My Order</a>
                            <a href="logout.php">Log Out</a>
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
