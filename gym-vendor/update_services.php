<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<?php

if (isset($_POST['submit'])) {
  $vendor_add_service_id = $_POST['vendor_add_service_id'];

  $sqli = "DELETE FROM vendor_gym_add_service WHERE vendor_add_service_id = '$vendor_add_service_id'";
  $delete = mysqli_query($con,$sqli);

  if ($delete) {
    echo "<script>window.location.href = 'update_services.php?return=success';</script>";
  }
  else {
    echo "<script> alert('Error. Something went wrong!');</script>";
  }
}

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h4 class="text-success"><?php

                if (isset($_GET['return'])) {
                  if ($_GET['return'] == 'success') {
                    echo "Service Deleted Successfully";
                  }
                }

                ?></h4>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Viwe / Update Services</h1>
          </div>

          <br><br>

          <!-- Content Row -->
          <div class="row">

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
                      <th scope="col">Service Name</th>
                      <th scope="col">Service Plan</th>
                      <th scope="col">Service Offered 1</th>
                      <th scope="col">Service Offered 2</th>
                      <th scope="col">Service Offered 3</th>
                      <th scope="col">Service Offered 4</th>
                      <th scope="col">Service Offered 5</th>
                      <th scope="col">Service Offered 6</th>
                      <th scope="col">Service Offered 7</th>
                      <th scope="col">Service Offered 8</th>
                      <th scope="col">Service Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM vendor_gym_add_service WHERE vendor_registration_number = '$vendor_registration_number'";
                    $result = mysqli_query($con,$sql);
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

                    ?>
                    <tr style="font-size: 15px">
                      <th scope="row">#</th>
                      <td><?= $vendor_service_name ?></td>
                      <td><?= $vendor_service_plan ?></td>
                      <td><?= $vendor_service_offered1 ?></td>
                      <td><?= $vendor_service_offered2 ?></td>
                      <td><?= $vendor_service_offered3 ?></td>
                      <td><?= $vendor_service_offered4 ?></td>
                      <td><?= $vendor_service_offered5 ?></td>
                      <td><?= $vendor_service_offered6 ?></td>
                      <td><?= $vendor_service_offered7 ?></td>
                      <td><?= $vendor_service_offered8 ?></td>
                      <td><?= $vendor_service_price ?></td>
                      <td>
                        <form  class="input-group mb-3" method="post">
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_add_service_id" value="<?= $vendor_add_service_id ?>" hidden required>
                          </div>
                          <div class="input-group mb-3 leave-comment">
                            <input type="submit" class=" btn btn-danger" id="exampleInputEmail1" name="submit" value="Delete Services" required>
                          </div>
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
      <!-- End of Main Content -->

<?php include('includes/footer.php') ?>

      