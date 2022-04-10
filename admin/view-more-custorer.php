<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>


<?php

if (isset($_POST['fetch_customer'])) {
	$user_id = $_POST['user_id'];

	$sql = "SELECT * FROM user_registration WHERE user_id = '$user_id'";
	$result = mysqli_query($con,$sql);
	$rows = mysqli_fetch_array($result);

	$user_name = $rows['user_name'];
	$user_email = $rows['user_email'];
	$user_mobile = $rows['user_mobile'];
	$user_dob = $rows['user_dob'];
	$user_registration_date = $rows['user_registration_date'];
}

?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            
          	</div>

          	<br><br>

          <!-- Content Row -->
          	<div class="row">
              	<div class="table-responsive">
            		<h1 class="h3 mb-0 text-gray-800">Customer Breif Detail</h1>
                		<table class="table table-bordered" style="color: white; background-color: #345BCB">
							<tr>
								<th>Name :</th>
								<td><?= $user_name ?></td>
							</tr>
							<tr>
								<th>Email :</th>
								<td><?= $user_email ?></td>
							</tr>
							<tr>
								<th>Mobile :</th>
								<td><?= $user_mobile ?></td>
							</tr>
							<tr>
								<th>Date of Birth :</th>
								<td><?= $user_dob ?></td>
							</tr>
							<tr>
								<th>Registration Date :</th>
								<td><?= $user_registration_date ?></td>
							</tr>
						</table>
				</div>



				<!-- Customer Orders -->
				<div class="table-responsive">
            		<h1 class="h3 mb-0 text-gray-800">Customer Orders</h1>
            		<?php
                    $p = 0;
                    $sqli = "SELECT * FROM customer_order WHERE user_id = '$user_id' ORDER BY o_id DESC";
                    $resulti = mysqli_query($con,$sqli);
                    if(mysqli_num_rows($resulti) > 0)
                    {
                    	?>
                		<table class="table" style="color: white; background-color: #345BCB">
		                  <thead>
		                    <tr style="font-size: 15px">
		                      <th scope="col" style="background-color: #F36100">#</th>
		                      <th scope="col">GYM Name</th>
		                      <th scope="col">GYM Address</th>
		                      <th scope="col">Service Name</th>
		                      <th scope="col">Service Plan</th>
		                      <th scope="col">Order Id</th>
		                      <th scope="col">Order Amount</th>
		                      <th scope="col">Customer Name</th>
		                      <th scope="col">Transaction Id</th>
		                      <th scope="col" style="background-color: #F36100">Transaction Status</th>
		                      <th scope="col">Transaction Date</th>
		                      <th scope="col" style="background-color: #F36100">Service Expiry Date</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                    <?php
		                    while ($rows=mysqli_fetch_array($resulti))
		                    {
		                    	$p = $p + 1;
		                    	$serviceId = $rows['serviceId'];
		                    	$servicePlan = $rows['servicePlan'];
		                    	$orderId = $rows['orderId'];
		                    	$percentAmount = $rows['orderAmount'] *10/100;
		                    	$orderAmount = $rows['orderAmount'] - $percentAmount;
		                    	$user_id = $rows['user_id'];


		                    	$query = "SELECT * FROM vendor_gym_add_service WHERE vendor_add_service_id = '$serviceId'";
		                    	$fetch = mysqli_query($con,$query);
		                    	while($find=mysqli_fetch_array($fetch)){
		                    	$vendor_service_name = $find['vendor_service_name'];
		                    	$vendor_id = $find['vendor_id'];

		                    	$vendorQuery = "SELECT * FROM vendor_gym_registration WHERE vendor_id = '$vendor_id'";
		                    	$vendorFetch = mysqli_query($con,$vendorQuery);
		                    	while($vendorFind=mysqli_fetch_array($vendorFetch)){
		                    	$vendor_business_name = $vendorFind['vendor_business_name'];
		                        $vendor_address = $vendorFind['vendor_address'];
		                        $vendor_landmark = $vendorFind['vendor_landmark'];
		                        $vendor_city = $vendorFind['vendor_city'];
		                        $vendor_pincode = $vendorFind['vendor_pincode'];
		                        $vendor_state = $vendorFind['vendor_state'];

		                    	$querys = "SELECT * FROM user_registration WHERE user_id = '$user_id'";
		                    	$fetched = mysqli_query($con,$querys);
		                    	while($finds=mysqli_fetch_array($fetched)){
		                    	$user_name = $finds['user_name'];

		                    	$sts = "SELECT * FROM order_payments WHERE orderId = '$orderId'";
		                        $rst = mysqli_query($con,$sts);
		                        while($fpps=mysqli_fetch_array($rst)){
		                        $transaction_id = $fpps['transaction_id'];
		                        $transaction_date = $fpps['transaction_date'];
		                        $transaction_status = $fpps['transaction_status'];

		                          $membershipEnds = date("Y-m-d", strtotime(date("Y-m-d",strtotime($transaction_date))." + ".$servicePlan." day"));
		                          if (date("Y-m-d") < $membershipEnds) {
		                            $expiryDate = $membershipEnds;
		                          }
		                          else
		                          {
		                            $expiryDate = "Membership expired";
		                          }

		                    ?>
		                    <tr style="font-size: 15px">
		                      <th scope="row" style="background-color: #F36100"><?= $p ?></th>
		                      <td><?= $vendor_business_name ?></td>
		                      <td><?= $vendor_address ?> <?= $vendor_landmark ?>,<?= $vendor_city ?>-<?= $vendor_pincode ?>,<?= $vendor_state ?></td>
		                      <td><?= $vendor_service_name ?></td>
		                      <td><?= $servicePlan ?> Days</td>
		                      <td><?= $orderId ?></td>
		                      <td><?= $orderAmount ?></td>
		                      <td><?= $user_name ?></td>
		                      <td><?= $transaction_id ?></td>
		                      <td style="background-color: #F36100"><?= $transaction_status ?></td>
		                      <td><?= $transaction_date ?></td>
		                      <td style="background-color: #F36100;"><?= $expiryDate ?></td>
		                    </tr>
		                  <?php
		                	} } } } }
		              		?>
		                  </tbody>
		                </table>
		                <?php
                	}
                  else
                  	{
                  		echo "<h2 style='color: white; text-align: center'>You haven't ordered yet.<br>Please order something first!</h2>"; 
                  	}?>
				</div>
        	</div>
        <!-- /.container-fluid -->

        

      	</div>

<?php include('includes/footer.php') ?>