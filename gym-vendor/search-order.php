<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
          </div>

          <br><br>

          <!-- Content Row -->
          <div class="row">

              <div class="table-responsive">
                <?php
                    if (isset($_POST['order_search'])) {
                      $order_id = $_POST['order_id'];
                    }
                    
                    $sql = "SELECT * FROM customer_order WHERE vendorId = '$vendor_id' AND orderId = '$order_id'";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                      ?>
                <table class="table">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
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
                      	$orderAmount = $rows['orderAmount'] - $percentAmount;
                      	$user_id = $rows['user_id'];
                      	


                      	$query = "SELECT * FROM vendor_gym_add_service WHERE vendor_add_service_id = '$serviceId'";
                      	$fetch = mysqli_query($con,$query);
                      	$find=mysqli_fetch_array($fetch);
                      	$vendor_service_name = $find['vendor_service_name'];

                      	$querys = "SELECT * FROM user_registration WHERE user_id = '$user_id'";
                      	$fetched = mysqli_query($con,$querys);
                      	$finds=mysqli_fetch_array($fetched);
                      	$user_name = $finds['user_name'];

                        $sts = "SELECT * FROM order_payments WHERE orderId = '$orderId'";
                        $rst = mysqli_query($con,$sts);
                        $fpps=mysqli_fetch_array($rst);
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
                      <th scope="row">#</th>
                      <td><?= $vendor_service_name ?></td>
                      <td><?= $servicePlan ?> Days</td>
                      <td><?= $orderId ?></td>
                      <td><?= $orderAmount ?></td>
                      <td><?= $user_name ?></td>
                      <td><?= $transaction_id ?></td>
                      <td class="text-primary"><?= $transaction_status ?></td>
                      <td><?= $transaction_date ?></td>
                      <td style="color: red"><?= $expiryDate ?></td>
                    </tr>
                      <?php 
                      } 
                    }
                    else
                      {
                        echo "<h1 style='text-align: center; text-transform: uppercase'>The Customers having<br><br>Order Id ".$order_id."<br><br> is not booked services in you GYM.</h1>";
                      }?>
                  </tbody>
                </table>
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>