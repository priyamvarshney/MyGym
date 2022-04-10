<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<?php
    $sql = "SELECT * FROM vendor_gym_registration WHERE vendor_status = 'Active'";
    $result = mysqli_query($con,$sql);
?>

<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Services</h2>
                        <div class="bt-option">
                            <a href="profile.php">Home</a>
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
                    <form action="user_search_service.php?id=<?= md5(uniqid()) ?>&name=<?= hash('sha256', '$vendor_business_name') ?>" method="post" class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search by Full GYM Name or City or Area Pincode..." name="search_city" aria-label="Search City..." aria-describedby="basic-addon2" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    <!-- Services Section End 
    </section>-->

    <!-- Pricing Section Begin 
    <section class="pricing-section spad">-->
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
                  
                      <form method="post" action="user-gym-view-services.php?id=<?= md5(uniqid()) ?>&name=<?= hash('sha256', $vendor_business_name) ?>">
                        <input type="text" name="vendor_id" value="<?= $vendor_id ?>" hidden>
                        <button type="submit" name="submit" style="background-color: #F36100;">View Services</button>
                      </form>
                  
                </div>
                <?php } ?>                
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

<?php include('includes/footer.php'); ?>