<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<?php

if (isset($_POST['vendor_services'])) {
	$vendor_id = $_POST['vendor_id'];
	$vendor_registration_number = $_POST['vendor_registration_number'];
	$vendor_business_name = $_POST['vendor_business_name'];
}

?>


<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="color: #345BCB">Vendor Services <p style="text-transform: uppercase; text-align: center; color: #345BCB"><?= $vendor_business_name ?> (<?= $vendor_registration_number ?>)</p></h1>

          </div>

          <br><br>

          <!-- Content Row -->
          <div class="row">

              <div class="table-responsive">
                <?php
                $order_status = "Completed";
                $sql = "SELECT * FROM vendor_gym_add_service WHERE vendor_id = '$vendor_id' AND vendor_registration_number = '$vendor_registration_number' ORDER BY vendor_add_service_id DESC";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                ?>
                <table class="table" style="background-color: #345BCB; color: white">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
                      <th scope="col">Service Name</th>
                      <th scope="col">Service Plan</th>
                      <th scope="col">Service Offered</th>
                      <th scope="col">Service Price</th>
                      <th scope="col">Service Upload Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($rows=mysqli_fetch_array($result))
                    {
                      	$vendor_add_service_id = $rows['vendor_add_service_id'];
                    	$vendor_service_name = $rows['vendor_service_name'];
                    	$vendor_service_plan = $rows['vendor_service_plan'];
                    	$vendor_service_offered1 = $rows['vendor_service_offered1'];
                    	$vendor_service_offered2 = $rows['vendor_service_offered2'];
                    	$vendor_service_offered3 = $rows['vendor_service_offered3'];
                    	$vendor_service_offered4 = $rows['vendor_service_offered4'];
                    	$vendor_service_offered5 = $rows['vendor_service_offered5'];
                    	$vendor_service_offered6 = $rows['vendor_service_offered6'];
                    	$vendor_service_offered7 = $rows['vendor_service_offered7'];
                    	$vendor_service_offered8 = $rows['vendor_service_offered8'];
                    	$vendor_service_price = $rows['vendor_service_price'];
                    	$vendor_add_service_date = $rows['vendor_add_service_date'];

                    ?>
                    <tr style="font-size: 15px">
                      <th scope="row">#</th>
                      <td><?= $vendor_service_name ?></td>
                      <td><?= $vendor_service_plan ?> Days</td>
                      <td><?= $vendor_service_offered1 ?>, <?= $vendor_service_offered2 ?>, <?= $vendor_service_offered3 ?>, <?= $vendor_service_offered4 ?>, <?= $vendor_service_offered5 ?>, <?= $vendor_service_offered6 ?>, <?= $vendor_service_offered7 ?>, <?= $vendor_service_offered8 ?> </td>
                      <td>₹ <?= $vendor_service_price ?></td>
                      <td ><?= $vendor_add_service_date ?></td>
                      <td>None</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <?php
                } else {
                  echo "<h1 align='center' style='color:red'>Currently vendor have not listed any services!</h1>";
                }
                ?>
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>