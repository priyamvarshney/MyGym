<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<?php

if (isset($_POST['view_more_order'])) {
	$o_id = $_POST['o_id'];
	$orderId = $_POST['orderId'];
}

?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="color: #345BCB">Order Detail of Order Id <p style="text-transform: uppercase; text-align: center; color: #345BCB"><?= $orderId ?></p></h1>
          </div>

          <br><br>

          <!-- Content Row -->
          <div class="row">

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Order Amount</th>
                      <th scope="col">GYM Name</th>
                      <th scope="col">Service Name</th>
                      <th scope="col">Service Plan</th>
                      <th scope="col">Transaction Id</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Service Start Date</th>
                      <th scope="col">Service Expiry Date</th>
                      <th scope="col">Withdraw Status</th>
                      <th scope="col">Withdraw Amount</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM customer_order INNER JOIN order_payments ON customer_order.orderId = order_payments.orderId WHERE o_id = '$o_id' ORDER BY o_id DESC";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                    	$rows=mysqli_fetch_array($result);

                      	$o_id = $rows['o_id'];
                    	$orderId = $rows['orderId'];
                    	$orderAmount = $rows['orderAmount'];
                    	$servicePlan = $rows['servicePlan'];
                      	$serviceId = $rows['serviceId'];
                      	$vendorId = $rows['vendorId'];
                    	$transaction_id = $rows['transaction_id'];
                    	$transaction_date = $rows['transaction_date'];
                    	$orderStatus = $rows['transaction_status'];
                      	$withdraw_status = $rows['withdraw_status'];


                      	$withdraw_amount = $orderAmount - $orderAmount*10/100;



                    	$membershipEnds = date("Y-m-d", strtotime(date("Y-m-d",strtotime($transaction_date))." + ".$servicePlan." day"));
          				if (date("Y-m-d") < $membershipEnds) {
          					$expiryDate = $membershipEnds;
          				}
          				else
          					{
          					$expiryDate = "Membership expired";
          				}

          				$sqli = "SELECT * FROM vendor_gym_registration WHERE vendor_id = '$vendorId'";
                    	$results = mysqli_query($con,$sqli);
                    	$rowsi=mysqli_fetch_array($results);
                    	$vendor_business_name = $rowsi['vendor_business_name'];

                    	$sqlie = "SELECT * FROM vendor_gym_add_service WHERE vendor_add_service_id = '$serviceId'";
                    	$resultse = mysqli_query($con,$sqlie);
                    	$rowsie=mysqli_fetch_array($resultse);
                    	$vendor_service_name = $rowsie['vendor_service_name'];


                    ?>
                    <tr style="font-size: 15px">
                      <th scope="row">#</th>
                      <td><?= $orderId ?></td>
                      <td><?= $orderAmount ?></td>
                      <td><?= $vendor_business_name ?></td>
                      <td class="text-primary"><?= $vendor_service_name ?></td>
                      <td><?= $servicePlan ?> Days</td>
                      <td><?= $transaction_id ?></td>
                      <td class="text-success"><?= $orderStatus ?></td>
                      <td><?= $transaction_date ?></td>
                      <td style="color: red"><?= $expiryDate ?></td>
                      <td><?= $withdraw_amount ?></td>
                      <td><?= $withdraw_status ?></td>
                      <td class="text-success">
                      	<form method="post" action="update-withdraw-status.php">
                          <input type="hidden" name="o_id" value="<?= $o_id ?>">
                          <input type="hidden" name="orderId" value="<?= $orderId ?>">
                          <textarea type="text" name="withdraw_status" placeholder="Type Withdrawal Status"></textarea>
                          <button type="submit" name="view_more_order" class="btn btn-primary">View More</button>
                        </form>
                       </td>
                    </tr>
                  <?php
              		} 
                  	else
                  	{
                  		echo "Order you search didnot matched";
                  	}?>
                  </tbody>
                </table>
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>


