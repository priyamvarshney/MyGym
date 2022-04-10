<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
          </div>

          <br><br>

          <!-- Content Row -->
          <div class="row">
            <h1 class="h3 mb-0 text-gray-800">Customers Details</h1>
              <div class="table-responsive">
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
                    $sql = "SELECT * FROM user_registration";
                    $result = mysqli_query($con,$sql);
                    while ($rows=mysqli_fetch_array($result))
                    {
                      $user_id = $rows['user_id'];
                      $user_name = $rows['user_name'];
                      $user_email = $rows['user_email'];
                      $user_dob = $rows['user_dob'];
                      $user_mobile = $rows['user_mobile'];
                      $user_registration_date = $rows['user_registration_date'];

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
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>

<?php include('includes/footer.php') ?>