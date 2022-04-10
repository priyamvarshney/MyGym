<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vendors Details</h1>
          </div>

          <br>
          <?php
          if (isset($_GET['update'])) {
            $update = $_GET['update'];
            $vendor_registration_number = $_GET['vendor_registration_number'];
            if ($update == 'success') {
              echo "<p class='text-success'>Vendor Status Updated Successfully having Registration number <b style='text-transform: uppercase;'>".$vendor_registration_number."</b>.</p>";
            }
          }
                        ?>
          <br>

          <!-- Content Row -->
          <div class="row">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr style="font-size: 15px">
                      <th scope="col">#</th>
                      <th scope="col">Vendor Name</th>
                      <th scope="col">Vendor Registration Number</th>
                      <th scope="col">Vendor GYM Name</th>
                      <th scope="col">Vendor GYM Type</th>
                      <th scope="col">Vendor GYM Status</th>
                      <th scope="col">Vendor Joining Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM vendor_gym_registration";
                    $result = mysqli_query($con,$sql);
                    while ($rows=mysqli_fetch_array($result))
                    {
                      $vendor_id = $rows['vendor_id'];
                      $vendor_name = $rows['vendor_name'];
                      $vendor_registration_number = $rows['vendor_registration_number'];
                      $vendor_business_name = $rows['vendor_business_name'];
                      $vendor_gym_sex = $rows['vendor_gym_sex'];
                      $vendor_status = $rows['vendor_status'];
                      $vendor_registration_date = $rows['vendor_registration_date'];

                    ?>
                    <tr style="font-size: 15px">
                      <th scope="row">#</th>
                      <td><?= $vendor_name ?></td>
                      <td style="text-transform: uppercase;"><?= $vendor_registration_number ?></td>
                      <td><?= $vendor_business_name ?></td>
                      <td><?= $vendor_gym_sex ?></td>
                      <td class="text-primary"><b><?= $vendor_status ?></b></td>
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
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>