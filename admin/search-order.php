<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Search Details</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <br><br>

          <!-- Content Row -->
          <div class="row">

              <div class="table-responsive">
                <?php
                    if (isset($_POST['order_search'])) {
                      $order_id = $_POST['order_id'];
                    }
                    $order_status = "Completed";
                    $sql = "SELECT * FROM customer_order WHERE orderId = '$order_id'";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                      $rows=mysqli_fetch_array($result);
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
                    else
                      {
                        $querys = "SELECT * FROM vendor_gym_registration WHERE vendor_registration_number = '$order_id' OR vendor_business_name = '$order_id'";
                        $fetched = mysqli_query($con,$querys);
                        if(mysqli_num_rows($fetched) > 0)
                        {
                        ?>
                          <table class="table">
                            <thead>
                              <tr style="font-size: 15px">
                                <th scope="col">#</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Vendor Registration Number</th>
                                <th scope="col">Vendor GYM Name</th>
                                <th scope="col">Vendor GYM Type</th>
                                <th scope="col">Vendor Joining Date</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                          <?php
                          while($finds=mysqli_fetch_array($fetched))
                          {
                          $vendor_id = $finds['vendor_id'];
                          $vendor_name = $finds['vendor_name'];
                          $vendor_registration_number = $finds['vendor_registration_number'];
                          $vendor_business_name = $finds['vendor_business_name'];
                          $vendor_gym_sex = $finds['vendor_gym_sex'];
                          $vendor_registration_date = $finds['vendor_registration_date'];

                        ?>
                          
                              <tr style="font-size: 15px">
                                <th scope="row">#</th>
                                <td><?= $vendor_name ?></td>
                                <td><?= $vendor_registration_number ?> </td>
                                <td><?= $vendor_business_name ?></td>
                                <td><?= $vendor_gym_sex ?></td>
                                <td><?= $vendor_registration_date ?></td>
                                <td style="color: red">
                                  <form method="post" action="view-more-vendor.php">
                                    <input type="hidden" name="vendor_id" value="<?= $vendor_id ?>">
                                    <button class="btn btn-primary" type="submit" name="fetch_vendor">View More</button>
                                  </form>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>

                          <?php 
                        }
                        else
                        {
                          $querys = "SELECT * FROM user_registration WHERE user_name = '$order_id' OR user_email = '$order_id'";
                          $fetched = mysqli_query($con,$querys);
                          if(mysqli_num_rows($fetched) > 0)
                          {
                          ?>
                            <table class="table">
                              <thead>
                                <tr style="font-size: 15px">
                                  <th scope="col">#</th>
                                  <th scope="col">Customers Name</th>
                                  <th scope="col">Customers Email Id</th>
                                  <th scope="col">Customers Date of Birth</th>
                                  <th scope="col">Customers Mobile Number</th>
                                  <th scope="col">Customers Joining Date</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php
                            while($finds=mysqli_fetch_array($fetched))
                            {
                            $user_id = $finds['user_id'];
                            $user_name = $finds['user_name'];
                            $user_email = $finds['user_email'];
                            $user_dob = $finds['user_dob'];
                            $user_mobile = $finds['user_mobile'];
                            $user_registration_date = $finds['user_registration_date'];

                          ?>
                            
                                <tr style="font-size: 15px">
                                  <th scope="row">#</th>
                                  <td><?= $user_name ?></td>
                                  <td><?= $user_email ?></td>
                                  <td><?= $user_dob ?></td>
                                  <td><?= $user_mobile ?></td>
                                  <td><?= $user_registration_date ?></td>
                                  <td style="color: red">
                                    <form method="post" action="view-more-custorer.php">
                                      <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                      <button class="btn btn-primary" type="submit" name="fetch_customer">View More</button>
                                    </form>
                                  </td>
                                </tr>
                              <?php } ?>
                              </tbody>
                            </table>
                            <?php 
                          }
                          else
                          {
                            echo "<h1 style='text-align: center; text-transform: uppercase'>The <br><br>Search Id ".$order_id."<br><br> is Invalid.</h1>";
                          }
                          
                        }



                        
                       }?>
                  </tbody>
                </table>
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>