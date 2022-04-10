<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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

            <!-- Earnings (Monthly) Card Example -->
            <!--<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->

          </div>
        </div>
        <!-- /.container-fluid -->
<?php

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
    if ($n >= 5) {
        $n = $n-1;
        }

?>

        <center>
        <h2 style="font-size: 45px">Welcome</h2>
        <h1 style="font-size: 55px">Navjot Singh</h1><br><br>
        <h3>Your Current GYM rating is: <?= (int)$n ?> / 5</h3>
        </center>

        <!--<form action="upload.php" method="post" enctype="multipart/form-data" class="input-group mb-3">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose Gym Main Image</label>
            </div>
            <div class="input-group-prepend">
              <input type="submit" name="upload_main" value="Upload Main Image">
            </div>
          </div>
        </form>

        <form action="upload.php" method="post" enctype="multipart/form-data" class="input-group mb-3">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose Gym Image 1</label>
            </div>
            <div class="input-group-prepend">
              <input type="submit" name="upload_image_1" value="Upload Image 1">
            </div>
          </div>
        </form>

        <form action="upload.php" method="post" enctype="multipart/form-data" class="input-group mb-3">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose Gym Image 2</label>
            </div>
            <div class="input-group-prepend">
              <input type="submit" name="upload_image_2" value="Upload Image 2">
            </div>
          </div>
        </form>
        <hr>-->

        


              <div class="table-responsive">
                <table class="table" style="border: 2px solid;">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col"><center>GYM Main Image</center></th>
                      <th scope="col"><center>GYM Service Image</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="font-size: 15px">
                      <?php

                      $sqtt = "SELECT vendor_gym_main_img, vendor_gym_service_img from vendor_gym_registration WHERE vendor_id = '$vendor_id'";
                      $s_fth = mysqli_query($con,$sqtt);
                        while($s_rw = mysqli_fetch_array($s_fth)){
                          $main_image = $s_rw['vendor_gym_main_img'];
                          $service_image = $s_rw['vendor_gym_service_img'];

                          ?>
                          <td><center><img src="img/uploadDocuments/gym_main_image/<?= $main_image ?>" height="200px" width="200px"></center></td>
                          <td><center><img src="img/uploadDocuments/gym_service_image/<?= $service_image ?>" height="200px" width="200px"></center></td>
                          
                <?php } ?>                     
                      
                    </tr>
                  </tbody>
                </table>
              </div>

      </div>
      <!-- End of Main Content -->

<?php include('includes/footer.php') ?>

      