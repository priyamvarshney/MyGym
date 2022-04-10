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
                      <th scope="col">Customer / Vendor</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Message</th>
                      <th scope="col">Reply</th>
                      <th scope="col">Contact Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $order_status = "Completed";
                    $p=0;
                    $sql = "SELECT * FROM contact_gym_query ORDER BY contact_id DESC";
                    $result = mysqli_query($con,$sql);
                    while ($rows=mysqli_fetch_array($result))
                    {
                      $contact_id = $rows['contact_id'];
                      $registration_number = $rows['registration_number'];
                      $name = $rows['name'];
                      $email = $rows['email'];
                      $subject = $rows['subject'];
                      $message = $rows['message'];
                      $reply = $rows['reply'];
                      $contact_date = $rows['contact_date'];
                      $p = $p + 1;

                    ?>
                    <tr style="font-size: 15px">
                      <th scope="row"><?= $p ?></th>
                      <td><?= $registration_number ?></td>
                      <td><?= $name ?> Days</td>
                      <td><?= $email ?></td>
                      <td><?= $subject ?></td>
                      <td><?= $message ?></td>
                      <td class="text-primary"><?= $reply ?></td>
                      <td><?= $contact_date ?></td>
                      <td>
                        <form method="post" action="reply-to-query.php">
                          <input type="hidden" name="contact_id" value="<?= $contact_id ?>">
                          <input type="hidden" name="name" value="<?= $name ?>">
                          <input type="hidden" name="email" value="<?= $email ?>">
                          <input type="hidden" name="subject" value="<?= $subject ?>">
                          <input type="hidden" name="message" value="<?= $message ?>">
                          <textarea name="reply" placeholder="Reply please..." required></textarea><br>
                          <button type="submit" name="reply_to_query" class="btn btn-primary">Reply</button>
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