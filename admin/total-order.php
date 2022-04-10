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
                <table class="table">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Order Amount</th>
                      <th scope="col">Transaction Id</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Service Start Date</th>
                      <th scope="col">Service Expiry Date</th>
                      <th scope="col">Withdraw Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM customer_order INNER JOIN order_payments ON customer_order.orderId = order_payments.orderId ORDER BY o_id DESC";
                    $result = mysqli_query($con,$sql);
                    while ($rows=mysqli_fetch_array($result))
                    {
                      $o_id = $rows['o_id'];
                    	$orderId = $rows['orderId'];
                    	$orderAmount = $rows['orderAmount'];
                    	$transaction_id = $rows['transaction_id'];
                    	$transaction_date = $rows['transaction_date'];
                    	$orderStatus = $rows['transaction_status'];
                      $withdraw_status = $rows['withdraw_status'];

                      $servicePlan = $rows['servicePlan'];

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
                      <td><?= $orderId ?></td>
                      <td><?= $orderAmount ?></td>
                      <td><?= $transaction_id ?></td>
                      <td class="text-primary"><?= $orderStatus ?></td>
                      <td><?= $transaction_date ?></td>
                      <td style="color: red"><?= $expiryDate ?></td>
                      <td><?= $withdraw_status ?></td>
                      <td>
                        <form method="post" action="view_more_order.php">
                          <input type="hidden" name="o_id" value="<?= $o_id ?>">
                          <input type="hidden" name="orderId" value="<?= $orderId ?>">
                          <button type="submit" name="view_more_order" class="btn btn-primary">View More</button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>