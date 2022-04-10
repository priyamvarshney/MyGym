<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<?php

if (isset($_POST['submit_bank'])) {
  $vendor_account_number = $_POST['account_number'];
  $vendor_account_name = $_POST['account_name'];
  $vendor_ifsc_code = $_POST['ifsc_code'];
  $vendor_bank_name = $_POST['bank_name'];

  $sqlii = "SELECT * FROM vendor_bank_details WHERE vendor_id = '$vendor_id' AND vendor_registration_number = '$vendor_registration_number'";
    $resulttt = mysqli_query($con,$sqlii);
    $count = mysqli_num_rows($resulttt);
    //if user record is available in database then $count will be equal to 1
    if($count == 1)
    {
        $msg = "Bank Details already registered.";
    }
    else
    {

      $sql = "INSERT INTO vendor_bank_details(vendor_id,vendor_registration_number,vendor_account_number,vendor_account_name,vendor_ifsc_code,vendor_bank_name)VALUES('$vendor_id','$vendor_registration_number','$vendor_account_number','$vendor_account_name','$vendor_ifsc_code','$vendor_bank_name')";
      $result = mysqli_query($con,$sql);
      if ($result)
        {
            $msg = "Bank Details Updated";
        }
        else
        {
            echo mysqli_error($con);
        }
    }
}

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Withdraw Bank Account</h1>
          </div>


          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="vendor-order.php">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Earning</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?= $total_earnings ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="vendor-order.php">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current Account Balance</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?= $current_balance ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            
            <?php

            $bankQuery = "SELECT * FROM vendor_bank_details WHERE vendor_id = '$vendor_id' AND vendor_registration_number = '$vendor_registration_number'";
            $bankFetch = mysqli_query($con,$bankQuery);
            if(mysqli_num_rows($bankFetch) > 0)
            {

            ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
                      <th scope="col">Account Number</th>
                      <th scope="col">Account Name</th>
                      <th scope="col">Bank IFSC Code</th>
                      <th scope="col">Bank Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    while ($bankFind=mysqli_fetch_array($bankFetch))
                    {
                      $vendor_account_number = $bankFind['vendor_account_number'];
                      $vendor_account_name = $bankFind['vendor_account_name'];
                      $vendor_ifsc_code = $bankFind['vendor_ifsc_code'];
                      $vendor_bank_name = $bankFind['vendor_bank_name'];
                  ?>
                      <tr style="font-size: 15px">
                        <th scope="row">#</th>
                        <td><?= $vendor_account_number ?></td>
                        <td><?= $vendor_account_name ?></td>
                        <td><?= $vendor_ifsc_code ?></td>
                        <td><?= $vendor_bank_name ?></td>
                        <td style="color: red">
                          <form method="post" action="bank-update.php">
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="vendor_id" value="<?= $vendor_id?>" required>
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="vendor_registration_number" value="<?= $vendor_registration_number?>" required>
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="vendor_account_number" value="<?= $vendor_account_number?>" required>
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="vendor_account_name" value="<?= $vendor_account_name?>" required>
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="vendor_ifsc_code" value="<?= $vendor_ifsc_code?>" required>
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="vendor_bank_name" value="<?= $vendor_bank_name?>" required>
                            <input type="submit" class="form-control btn btn-danger" id="exampleInputEmail1" name="update_bank" value="Update Bank Account" required>
                          </form>
                        </td>
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
            ?>

              <form class="input-group mb-3" method="post">

                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="exampleInputEmail1" name="account_number" placeholder="Account Number" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="exampleInputEmail1" name="account_name" placeholder="Account Name" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="exampleInputEmail1" name="ifsc_code" placeholder="IFSC Code" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="exampleInputEmail1" name="bank_name" placeholder="Bank Name" required>
                </div>

                <div class="input-group mb-3 leave-comment">
                  <input type="submit" class="form-control btn btn-primary" id="exampleInputEmail1" name="submit_bank" value="Add Bank Account" required>
                </div>
              </form>
            <?php
            }
            ?>


          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include('includes/footer.php') ?>

      