<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>


<?php

if (isset($_POST['fetch_vendor'])) {
	$vendor_id = $_POST['vendor_id'];
}

	$sql = "SELECT * FROM vendor_gym_registration WHERE vendor_id = '$vendor_id'";
	$result = mysqli_query($con,$sql);
	$rows = mysqli_fetch_array($result);

	$vendor_registration_number = $rows['vendor_registration_number'];
	$vendor_name = $rows['vendor_name'];
	$vendor_business_name = $rows['vendor_business_name'];
	$vendor_gym_sex = $rows['vendor_gym_sex'];
	$vendor_email = $rows['vendor_email'];
	$vendor_mobile_number = $rows['vendor_mobile_number'];
	$vendor_address = $rows['vendor_address'];
	$vendor_landmark = $rows['vendor_landmark'];
	$vendor_city = $rows['vendor_city'];
	$vendor_pincode = $rows['vendor_pincode'];
	$vendor_state = $rows['vendor_state'];
	$vendor_pan_detail = $rows['vendor_pan_detail'];
	$vendor_gst_detail = $rows['vendor_gst_detail'];
	$vendor_gym_main_img = $rows['vendor_gym_main_img'];
	$vendor_gym_service_img = $rows['vendor_gym_service_img'];
	$vendor_registration_date = $rows['vendor_registration_date'];
    $vendor_status = $rows['vendor_status'];

$query = "SELECT * FROM customer_order INNER JOIN order_payments ON customer_order.orderId = order_payments.orderId WHERE vendorId = '$vendor_id' AND transaction_status = 'SUCCESS'";
$fetch = mysqli_query($con,$query);
$total_vendor_earnings = 0;
While($find=mysqli_fetch_array($fetch))
{
  $total_vendor_earnings = $total_vendor_earnings + $find['orderAmount'];
}

$queryes = "SELECT * FROM vendor_balance WHERE vendor_id = '$vendor_id'";
$fetches = mysqli_query($con,$queryes);
$current_balance = 0;
$current_vendor_balance = 0;
//$current_balance_without_charge = 0;
While($findes=mysqli_fetch_array($fetches))
{
  $current_vendor_balance = $findes['vendor_total_balance'];
}
//$current_balance = $current_balance_without_charge - $current_balance_without_charge*10/100;

$p_image = "SELECT pan_card_image FROM pan_image WHERE vendor_id = '$vendor_id'";
$p_r = mysqli_query($con,$p_image);
while($p_rw = mysqli_fetch_array($p_r)){
$pan_card_image = $p_rw['pan_card_image'];
}

$c_image = "SELECT cancle_cheque_image FROM cheque_image WHERE vendor_id = '$vendor_id'";
$c_r = mysqli_query($con,$c_image);
while($c_rw = mysqli_fetch_array($c_r)){
$cancle_cheque_image = $c_rw['cancle_cheque_image'];
}

$aad = "SELECT aadhaar_front, aadhaar_back FROM aadhaar_image WHERE vendor_id = '$vendor_id'";
$faad = mysqli_query($con,$aad);
while($a_rw = mysqli_fetch_array($faad)){
$aadhaar_front = $a_rw['aadhaar_front'];
$aadhaar_back = $a_rw['aadhaar_back'];
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

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vendor Breif Detail</h1>
          </div>

          <!-- Content Row -->
          	<div class="row">
          		<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vendor Services</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      	<form method="post" action="view-vendor-services.php">
                      		<input type="hidden" name="vendor_id" value="<?= $vendor_id ?>">
                      		<input type="hidden" name="vendor_registration_number" value="<?= $vendor_registration_number ?>">
                      		<input type="hidden" name="vendor_business_name" value="<?= $vendor_business_name ?>">
                      		<button type="submit" name="vendor_services" class="btn btn-primary">View Vendor Services</button>
                      	</form>
                      </div>
                    </div>
                    <div class="col-auto">
                      <!--<i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vendor Bank Account</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      	<form method="post" action="view-vendor-bank-account.php">
                      		<input type="hidden" name="vendor_id" value="<?= $vendor_id ?>">
                      		<input type="hidden" name="vendor_registration_number" value="<?= $vendor_registration_number ?>">
                      		<button type="submit" name="vendor_banks" class="btn btn-primary">View Vendor Bank Account</button>
                      	</form>
                      </div>
                    </div>
                    <div class="col-auto">
                      <!--<i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current Account Balance</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">₹ <?= $current_vendor_balance ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          		<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vendor GYM Status: <b><?= $vendor_status ?></b></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      	<form method="post" action="vendor-status-update.php">
                      		<input type="hidden" name="vendor_id" value="<?= $vendor_id ?>">
                      		<input type="hidden" name="vendor_registration_number" value="<?= $vendor_registration_number ?>">
                      		<select class="form-control" id="inputGroupSelect04" name="vendor_status" required>
			                  <option selected>Select Status</option>
			                  <option value="Active">Active</option>
			                  <option value="Disabled">Disabled</option>
			                  <option value="Blocked">Blocked</option>
			              	</select><br>
                      		<button type="submit" name="vendor_update_status" class="btn btn-primary">Update GYM Status</button>
                      	</form>
                      </div>
                    </div>
                    <div class="col-auto">
                      <!--<i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            	
              	<div class="table-responsive">
                	<table class="table">
                		<table class="table table-bordered" style="color: white; background-color: #345BCB">
							<tr>
								<th>Registration Number :</th>
                      			<td style="text-transform: uppercase;"><?= $vendor_registration_number ?></td>
							</tr>
							<tr>
								<th>Name :</th>
								<td><?= $vendor_name ?></td>
							</tr>
							<tr>
								<th>GYM Name & Rating:</th>
								<td><?= $vendor_business_name ?> ( <?= (int)$n ?> / 5 ) Rating</td>
							</tr>
							<tr>
								<th>GYM Type :</th>
								<td><?= $vendor_gym_sex ?></td>
							</tr>
							<tr>
								<th>Email :</th>
								<td><?= $vendor_email ?></td>
							</tr>
							<tr>
								<th>Mobile :</th>
								<td><?= $vendor_mobile_number ?></td>
							</tr>
							<tr>
								<th>Address :</th>
								<td><?= $vendor_address ?> <?= $vendor_landmark ?>, <?= $vendor_city ?>-<?= $vendor_pincode ?>, <?= $vendor_state ?></td>
							</tr>
							<tr style="background-color: #F36100">
								<th>PAN Number :</th>
								<td><?= $vendor_pan_detail ?></td>
							</tr>
							<tr style="background-color: #F36100">
								<th>GST Number :</th>
								<td><?= $vendor_gst_detail ?></td>
							</tr>
							<tr>
								<th>GYM Main Image :<br><img src="../gym-vendor/img/uploadDocuments/gym_main_image/<?= $vendor_gym_main_img ?>" alt="Denim Jeans" style="width: auto; height: 250px"></th>
								<th>GYM Service Image :<br><img src="../gym-vendor/img/uploadDocuments/gym_service_image/<?= $vendor_gym_service_img ?>" alt="Denim Jeans" style="width: auto; height: 250px;"></th>
							</tr>
              <tr>
                <th>Aadhaar Front Image :<br><img src="../gym-vendor/img/uploadDocuments/aadhaar_images/<?= $aadhaar_front ?>" alt="Denim Jeans" style="width: auto; height: 250px"></th>
                <th>Aadhaar Back Image :<br><img src="../gym-vendor/img/uploadDocuments/aadhaar_images/<?= $aadhaar_back ?>" alt="Denim Jeans" style="width: auto; height: 250px;"></th>
              </tr>
              <tr>
                <th>PAN Card Image :<br><img src="../gym-vendor/img/uploadDocuments/pan_images/<?= $pan_card_image ?>" alt="PAN Card Image" style="width:auto; height: 250px"></th>
                <th>Cancle Cheque Image :<br><img src="../gym-vendor/img/uploadDocuments/cancle_cheque_images/<?= $cancle_cheque_image ?>" alt="Cancle Cheque Image" style="width:auto; height: 250px;"></th>
              </tr>
							<tr>
								<th>GYM Registration Date :</th>
								<td><?= $vendor_registration_date ?></td>
							</tr>
						</table>
					</div>
				</div>
        	</div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>