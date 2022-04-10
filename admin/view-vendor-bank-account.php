<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>


<?php
$vendor_account_number = "N/A";
	$vendor_account_name = "N/A";
	$vendor_ifsc_code = "N/A";
	$vendor_bank_name = "N/A";
	$bank_update_date = "N/A";
if (isset($_POST['vendor_banks'])) {
	$vendor_id = $_POST['vendor_id'];
	$vendor_registration_number = $_POST['vendor_registration_number'];

	$sql= "SELECT * FROM vendor_bank_details WHERE vendor_id = '$vendor_id' AND vendor_registration_number = '$vendor_registration_number'";
	$result = mysqli_query($con,$sql);
	while($rows = mysqli_fetch_array($result)){

	$vendor_account_number = $rows['vendor_account_number'];
	$vendor_account_name = $rows['vendor_account_name'];
	$vendor_ifsc_code = $rows['vendor_ifsc_code'];
	$vendor_bank_name = $rows['vendor_bank_name'];
	$bank_update_date = $rows['bank_update_date'];
	}

	$try = "SELECT vendor_total_balance FROM vendor_balance WHERE vendor_id = '$vendor_id'";
	$catch = mysqli_query($con,$try);
	while($rowes = mysqli_fetch_array($catch)){
		$vendor_total_balance = $rowes['vendor_total_balance'];
	}
}

?>


<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vendor Bank Detail</h1>
          </div>

          <!-- Content Row -->
          	<div class="row">
            	
              	<div class="table-responsive">
                	<table class="table">
                		<table class="table table-bordered" style="color: white; background-color: #345BCB">
							<tr>
								<th>Registration Number :</th>
                      			<td style="text-transform: uppercase;"><?= $vendor_registration_number ?></td>
							</tr>
							<tr>
								<th>Bank Account Number :</th>
								<td><?= $vendor_account_number ?></td>
							</tr>
							<tr>
								<th>Account Holder Name :</th>
								<td><?= $vendor_account_name ?></td>
							</tr>
							<tr>
								<th>Bank Account IFSC Code :</th>
								<td><?= $vendor_ifsc_code ?></td>
							</tr>
							<tr>
								<th>Bank Name :</th>
								<td><?= $vendor_bank_name ?></td>
							</tr>
							<tr>
								<td>Bank Update Date :</td>
								<td><?= $bank_update_date ?></td>
							</tr>
						</table>
					</div>
				</div>
        	</div>
        <!-- /.container-fluid -->
        <hr>

        <div style="padding-left: 100px; width: 500px">
        	<form method="post" action="#">
	        	<div class="form-group" hidden>
	        		<label>Vendor Id</label>
	        		<input class="form-control" type="text" name="vendor_id" value="<?= $vendor_id ?>" readonly>
	        	</div>
	        	<div class="form-group">
	        		<label>Vendor Total Balance</label>
	        		<input class="form-control" type="text" name="vendor_total_balance" value="<?= $vendor_total_balance ?>">
	        	</div>
	        	<div class="form-group">
	        		<label>Withdraw Transaction Details</label>
	        		<textarea class="form-control" type="text" name="txn_details"></textarea>
	        	</div>
	        	<div class="form-group">
	        		<button class="form-control" type="submit" name="withdraw" class="btn btn-primary" style="float: right; background-color: #345BCB; color: white">Withdraw</button>
	        	</div>
	        </form>
        </div><br><br>

        

      </div><br><br>

<?php include('includes/footer.php') ?>

<?php

if (isset($_POST['withdraw'])) {
	$vendor_id = $_POST['vendor_id'];
	$vendor_total_balance = $_POST['vendor_total_balance'];
	$txn_details = $_POST['txn_details'];

	$Withdraws = "INSERT INTO vendor_withdraw (w_vendoe_id,w_vendor_amount,w_vendor_details) VALUES ('$vendor_id','$vendor_total_balance','$txn_details')";
	$yes = mysqli_query($con,$Withdraws);
	if ($yes) {
		$new_total_balance = 0;
		$update = "UPDATE vendor_balance SET vendor_total_balance = '$new_total_balance' WHERE vendor_id = '$vendor_id'";
		$updates = mysqli_query($con,$update);
		echo "<script>alert('Withdrawn Success');window.location.href = 'dashboard.php'</script>";
	}
}


?>