<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<?php

$appId = "177459375a2dc129084f2d1df54771"; // test : 177459375a2dc129084f2d1df54771  PROD : 5779879ef317c79dca0ba371b89775
$returnUrl = "http://localhost/gymlife/thankyou.php";
$msg = "";
if (isset($_POST['submit'])) {
    $vendor_id = $_POST['vendor_id'];
    $sql = "SELECT * FROM vendor_gym_add_service WHERE vendor_id = '$vendor_id'";
    $result = mysqli_query($con,$sql);
}

$gymName = "SELECT * FROM vendor_gym_registration WHERE vendor_id = '$vendor_id'";
$resulting = mysqli_query($con,$gymName);
$focus = mysqli_fetch_array($resulting);
$vendor_business_name = $focus['vendor_business_name'];
$vendor_business_description = $focus['vendor_business_description'];
$vendor_gym_service_img = $focus['vendor_gym_service_img'];
$vendor_address = $focus['vendor_address'];
$vendor_landmark = $focus['vendor_landmark'];
$vendor_city = $focus['vendor_city'];
$vendor_pincode = $focus['vendor_pincode'];
$vendor_state = $focus['vendor_state'];

$sqli = "SELECT * FROM customer_order ORDER BY o_id DESC LIMIT 1";
$results = mysqli_query($con,$sqli);
$row = mysqli_fetch_array($results);
$lastRegNo = $row['orderId'];
if ($lastRegNo == " ") {
    $new_orderId = "ORDS1001";
} else {
    $new_oId = substr($lastRegNo,4);
    $new_oId = intval($new_oId);
    $new_orderId = "ORDS" . ($new_oId + 1);
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

    

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <h1 style="text-align: center; color: white;">Welcome to <?= $vendor_business_name ?></h1>
        <h4 style="color: #F36100; padding-left: 50px; padding-right: 50px; padding-top: 10px; padding-bottom: 10px">Description: <?= $vendor_business_description ?></h4><hr>
        <h3 style="text-align: center; color: white;">Address: <?= $vendor_address ?> <?= $vendor_landmark ?><br><?= $vendor_city ?>-<?= $vendor_pincode ?><br><?= $vendor_state ?></h3><br>

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

                    if ($vendor_service_plan==7) {
                        $days = 'weekly'; 
                    }
                    elseif ($vendor_service_plan==30) {
                        $days = 'monthly'; 
                    }
                    else{
                        $days = 'yearly';
                    }

                        /*$order = $api->order->create(array(
                        'receipt' => '123',
                        'amount' => $vendor_service_price,
                        'payment_capture' => 1,
                        'currency' => 'INR'
                        )
                        );*/
                        $order = rand(000000,999999);
                ?>
                <div class="card">

                  <img src="gym-vendor/img/uploadDocuments/gym_service_image/<?= $vendor_gym_service_img ?>" alt="Denim Jeans" style="width:100%">
                  <h3><?= $vendor_service_name ?></h3><br>
                  <p><b>Plan: <?= $vendor_service_plan ?> Days</b></p>
                  <p><b>Service Offered: <?= $vendor_service_offered1 ?>, <?= $vendor_service_offered2 ?>, <?= $vendor_service_offered3 ?>, <?= $vendor_service_offered4 ?>, <?= $vendor_service_offered5 ?>, <?= $vendor_service_offered6 ?>, <?= $vendor_service_offered7 ?>, <?= $vendor_service_offered8 ?></b></p>
                  <p class="price">₹ <?= $vendor_service_price ?></p>
                  
                    <form id="redirectForm" method="post" action="request.php">
                        <input type="hidden" name="orderId"value="<?= $new_orderId ?>" readonly />
                        <input type="hidden" name="orderAmount" value="<?= $vendor_service_price ?>" readonly />
                        <input type="hidden" name="servicePlan" value="<?= $vendor_service_plan ?>" readonly />
                        <input type="hidden" name="serviceId" value="<?= $vendor_add_service_id ?>" readonly />
                        <input type="hidden" name="vendorId" value="<?= $vendor_id ?>" readonly />
                        <input type="hidden" name="appId" value="<?= $appId ?>" readonly />
                        <input type="hidden" name="customerName" value="<?= $user_name ?>" readonly />
                        <input type="hidden" name="customerEmail" value="<?= $user_email ?>" readonly />
                        <input type="hidden" name="customerPhone" value="<?= $user_mobile ?>" readonly />
                        <input type="hidden" name="returnUrl" value="<?= $returnUrl ?>" readonly />
                        <input type="hidden" class="form-control" name="orderNote" value="<?= $user_id ?>" placeholder="User Id" readonly />
                        <input type="hidden" class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)" readonly />
                        <button type="submit" name="submit" style="background-color: #F36100;">Buy Service</button>
                    </form>
                </div>
                <?php } ?>                
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

<?php include('includes/footer.php'); ?>