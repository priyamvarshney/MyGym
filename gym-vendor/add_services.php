<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<?php

if(isset($_POST['submit']))
{
  $vendor_id = $_POST['vendor_id'];
  $vendor_registration_number = $_POST['vendor_registration_number'];
  $vendor_service_name = $_POST['vendor_service_name'];
  $vendor_service_plan = $_POST['vendor_service_plan'];
  $vendor_service_offer_1 = $_POST['vendor_service_offer_1'];
  $vendor_service_offer_2 = $_POST['vendor_service_offer_2'];
  $vendor_service_offer_3 = $_POST['vendor_service_offer_3'];
  $vendor_service_offer_4 = $_POST['vendor_service_offer_4'];
  $vendor_service_offer_5 = $_POST['vendor_service_offer_5'];
  $vendor_service_offer_6 = $_POST['vendor_service_offer_6'];
  $vendor_service_offer_7 = $_POST['vendor_service_offer_7'];
  $vendor_service_offer_8 = $_POST['vendor_service_offer_8'];
  $vendor_service_price = $_POST['vendor_service_price'];

  $sql = "INSERT INTO vendor_gym_add_service(vendor_id,vendor_registration_number,vendor_service_name,vendor_service_plan,vendor_service_offered1,vendor_service_offered2,vendor_service_offered3,vendor_service_offered4,vendor_service_offered5,vendor_service_offered6,vendor_service_offered7,vendor_service_offered8,vendor_service_price) VALUES ('$vendor_id','$vendor_registration_number','$vendor_service_name','$vendor_service_plan','$vendor_service_offer_1','$vendor_service_offer_2','$vendor_service_offer_3','$vendor_service_offer_4','$vendor_service_offer_5','$vendor_service_offer_6','$vendor_service_offer_7','$vendor_service_offer_8','$vendor_service_price')";
  $result = mysqli_query($con,$sql);
  if ($result)
    {   
      echo "<script>window.location.href = 'add_services.php?return=success';</script>";
    }
    else
    {
        echo mysqli_error($con);
    }
}

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h4 class="text-success"><b><?php

                if (isset($_GET['return'])) {
                  if ($_GET['return'] == 'success') {
                    echo "Service Added Successfully";
                  }
                }

                ?></b></h4>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Services</h1>
          </div>

          <br><br>

          <!-- Content Row -->
          <div class="row">

            <form  class="input-group mb-3" method="post">

              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_id" value="<?= $vendor_id ?>" hidden required>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_registration_number" value="<?= $vendor_registration_number ?>" hidden required>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_name" placeholder="Service Name" required>
              </div>

              <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect04" name="vendor_service_plan" required>
                  <option selected>Select Service Plan...</option>
                  <option value="1">1 Day Plan</option>
                  <option value="2">2 Days Plan</option>
                  <option value="7">7 Days Plan</option>
                  <option value="30">Monthly Plan</option>
                  <option value="90">Quaterly Plan</option>
                  <option value="180">Half Yearly Plan</option>
                  <option value="365">Yearly Plan</option>
                </select>
              </div>
              <div>
                <label for="exampleInputEmail1">Minimum 3 Services must be offered by the GYM owner for the customers</label>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_1" placeholder="Service Offered 1" required>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_2" placeholder="Service Offered 2" required>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_3" placeholder="Service Offered 3" required>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_4" placeholder="Service Offered 4">
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_5" placeholder="Service Offered 5">
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_6" placeholder="Service Offered 6">
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_7" placeholder="Service Offered 7">
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_offer_8" placeholder="Service Offered 8">
              </div>

              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" name="vendor_service_price" placeholder="Service Price incl. GST" required>
              </div>

              <div class="input-group mb-3 leave-comment">
                <input type="submit" class="form-control btn btn-primary" id="exampleInputEmail1" name="submit" value="Add Services" required>
              </div>

            </form>  
          </div>


        </div>
        <!-- /.container-fluid -->

        

      </div>
      <!-- End of Main Content -->

<?php include('includes/footer.php') ?>

      