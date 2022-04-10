<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<?php

$msg = "";
if (isset($_POST['submit'])) {
    $vendor_account_number = $_POST['account_number'];
  $vendor_account_name = $_POST['account_name'];
  $vendor_ifsc_code = $_POST['ifsc_code'];
  $vendor_bank_name = $_POST['bank_name'];

    $sql = "UPDATE vendor_bank_details SET vendor_account_number = '$vendor_account_number',vendor_account_name = '$vendor_account_name',vendor_ifsc_code = '$vendor_ifsc_code',vendor_bank_name = '$vendor_bank_name' WHERE vendor_id = '$vendor_id' AND vendor_registration_number = '$vendor_registration_number'";
      $result = mysqli_query($con,$sql);
      if ($result)
        {
            echo "<script>window.location.href = 'bank-update.php?return=success';</script>";
        }
        else
        {
            $msg =  mysqli_error($con);
        }
}

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Withdraw Account Bank</h1>
          </div>


          <!-- Content Row -->
          <div class="row">
            <?php

if (isset($_POST['update_bank'])) {
    $vendor_id = $_POST['vendor_id'];
    $vendor_registration_number = $_POST['vendor_registration_number'];
      $vendor_account_number = $_POST['vendor_account_number'];
      $vendor_account_name = $_POST['vendor_account_name'];
      $vendor_ifsc_code = $_POST['vendor_ifsc_code'];
      $vendor_bank_name = $_POST['vendor_bank_name'];
}

?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
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
            </div>

              <form class="input-group mb-3" method="post">

                <h2><?php

                if (isset($_GET['return'])) {
                  if ($_GET['return'] == 'success') {
                    echo "Bank Details Updated Successfully";
                  }
                }

                ?></h2>

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
                  <input type="submit" class="form-control btn btn-primary" id="exampleInputEmail1" name="submit" value="Add Bank Account" required>
                </div>
              </form>


          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include('includes/footer.php') ?>

      