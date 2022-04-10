<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Services</h2>
                        <div class="bt-option">
                            <a href="profile.php">Home</a>
                            <span>My Orders</span>
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
                        <h2>My Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Services Section End </section>-->

    <!-- Pricing Section Begin <section class="pricing-section spad">-->
    
        
            
            	<?php
                    
                    $sql = "SELECT * FROM customer_order INNER JOIN order_payments ON customer_order.orderId = order_payments.orderId WHERE user_id = '$user_id' ORDER BY o_id DESC";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                    	?>
              <div class="table-responsive" style="padding-left: 50px; padding-right: 50px">
                
                <table class="table" style="color: white; width: auto">
                  <thead>
                    <tr style="font-size: 15px">
                      
                      <th scope="col">GYM Name</th>
                      <th scope="col">GYM Address</th>
                      <th scope="col">Service Name</th>
                      <th scope="col">Service Plan</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Order Amount</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Transaction Id</th>
                      <th scope="col">Transaction Status</th>
                      <th scope="col">Transaction Date</th>
                      <th scope="col">Service Expiry Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($rows=mysqli_fetch_array($result))
                    {
                    	$serviceId = $rows['serviceId'];
                    	$servicePlan = $rows['servicePlan'];
                    	$orderId = $rows['orderId'];
                    	$percentAmount = $rows['orderAmount'] *10/100;
                    	$orderAmount = $rows['orderAmount'] ;
                    	$user_id = $rows['user_id'];
                    	$transaction_id = $rows['transaction_id'];
                    	$transaction_date = $rows['transaction_date'];
                    	$orderStatus = $rows['transaction_status'];

                      $query = "SELECT * FROM vendor_gym_add_service WHERE vendor_add_service_id = '$serviceId'";
                      $fetch = mysqli_query($con,$query);
                      $find=mysqli_fetch_array($fetch);
                      $vendor_service_name = $find['vendor_service_name'];
                      $vendor_id = $find['vendor_id'];

                      $vendorQuery = "SELECT * FROM vendor_gym_registration WHERE vendor_id = '$vendor_id'";
                      $vendorFetch = mysqli_query($con,$vendorQuery);
                      $vendorFind=mysqli_fetch_array($vendorFetch);
                      $vendor_business_name = $vendorFind['vendor_business_name'];
                      $vendor_address = $vendorFind['vendor_address'];
                      $vendor_landmark = $vendorFind['vendor_landmark'];
                      $vendor_city = $vendorFind['vendor_city'];
                      $vendor_pincode = $vendorFind['vendor_pincode'];
                      $vendor_state = $vendorFind['vendor_state'];

                      $querys = "SELECT * FROM user_registration WHERE user_id = '$user_id'";
                      $fetched = mysqli_query($con,$querys);
                      $finds=mysqli_fetch_array($fetched);
                      $user_name = $finds['user_name'];

                    	$membershipEnds = date("Y-m-d", strtotime(date("Y-m-d",strtotime($transaction_date))." + ".$servicePlan." day"));

                      if ($orderStatus == 'SUCCESS') {
                        $orderStatus = "<span class='text-primary'>".$orderStatus."</span>";
                        if (date("Y-m-d") < $membershipEnds) {
                        $expiryDate = $membershipEnds;
                        }
                        else
                        {
                          $check = "SELECT * FROM user_feedback WHERE order_id = '$orderId'";
                          $to = mysqli_query($con,$check);
                          $count = mysqli_num_rows($to);

                          if ($count == 1) {
                            $expiryDate = "Membership expired";
                          } else {
                            $expiryDate = "Membership expired<br><a href='feedback.php?id=".$orderId."&sid=".$serviceId."&vid=".$vendor_id."&uid=".$user_id."' target='_blank'>Please provide Feedback</a>";
                            }
                        }
                      }
                      else{
                        $orderStatus = "<span style='color: red'>".$orderStatus."</span>";
                        $expiryDate = "";
                      }
          						


                    	

                      

                    ?>
                    <tr style="font-size: 15px">
                      
                      <td>
                        <form method="post" action="user-gym-view-services.php?id=<?= md5(uniqid()) ?>&name=<?= hash('sha256', $vendor_business_name) ?>">
                          <input type="text" name="vendor_id" value="<?= $vendor_id ?>" hidden>
                          <button type="submit" class="btn" name="submit" style="color: white;"><?= $vendor_business_name ?></button>
                        </form>
                      </td>
                      <td><?= $vendor_address ?><br><?= $vendor_landmark ?><br><?= $vendor_city ?>-<?= $vendor_pincode ?>,<?= $vendor_state ?></td>
                      <td><?= $vendor_service_name ?></td>
                      <td><?= $servicePlan ?> Days</td>
                      <td><?= $orderId ?></td>
                      <td><?= $orderAmount ?></td>
                      <td><?= $user_name ?></td>
                      <td><?= $transaction_id ?></td>
                      <td><?= $orderStatus ?></td>
                      <td><?= $transaction_date ?></td>
                      <td style="color: red"><?= $expiryDate ?></td>
                    </tr>
                  <?php
                	} 
              		?>
                  </tbody>
                </table>
                
              </div>
              <?php
                	}
                  else
                  	{
                  		echo "<h2 style='color: white; text-align: center'>You haven't ordered yet.<br>Please order something first!</h2>"; 
                  	}?>
            

            
        
    </section>
    <!-- Pricing Section End -->

<?php include('includes/footer.php'); ?>