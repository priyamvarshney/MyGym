<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<?php
$message = "";
$message1 = "";

$m_message = "";
$m_message1 = "";

$s_message = "";
$s_message1 = "";

$c_message = "";
$c_message1 = "";

$p_message = "";
$p_message1 = "";

$d_message = "";
$d_message1 = "";

$a_message = "";
$a_message1 = "";

// GYM DESCRIPTION UPDATE

if (isset($_POST['update_description'])) {
	$vendor_id = $_POST['vendor_id'];
	$description = $_POST['description'];

	$updt = "UPDATE vendor_gym_registration SET vendor_business_description = '$description' WHERE vendor_id = '$vendor_id'";
	$rstp = mysqli_query($con,$updt);
	if ($rstp) {
		$d_message = "Description Updated.";
	}
	else {
		$d_message1 = mysqli_error($con);
		//$d_message1 = "Description Update Failed.";
	}
}

// GYM MAIN IMAGE UPLOAD
if (isset($_POST['main_image'])) {
	$vendor_id = $_POST['vendor_id'];
	$gym_main_image = $_FILES['gym_main_image'];
	$fileName = $_FILES['gym_main_image']['name'];
	$fileTmpName = $_FILES['gym_main_image']['tmp_name'];

	$fileSize = $_FILES['gym_main_image']['size'];

	$fileError = $_FILES['gym_main_image']['error'];
	$fileType = $_FILES['gym_main_image']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('png', 'jpg', 'jpeg');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 5000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'img/uploadDocuments/gym_main_image/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sqll = "UPDATE vendor_gym_registration SET vendor_gym_main_img = '$fileNameNew' WHERE vendor_id = '$vendor_id'";
				$reslt = mysqli_query($con,$sqll);
				if ($reslt) {
					$m_message = 'Image Upload Success';
				}else {
					$m_message1 = "Image Upload Failed";
				}
				
			} else {
				$m_message1 = 'File size is too high';
			}
		} else {
			$m_message1 = 'Error. Something went wrong';
		}
	} else {
		$m_message1 = 'You can only upload PDF or DOCX files!';
	}
}


// GYM SERVIVE IMAGE UPLOAD
if (isset($_POST['service_image'])) {
	$vendor_id = $_POST['vendor_id'];
	$gym_service_image = $_FILES['gym_service_image'];
	$fileName = $_FILES['gym_service_image']['name'];
	$fileTmpName = $_FILES['gym_service_image']['tmp_name'];

	$fileSize = $_FILES['gym_service_image']['size'];

	$fileError = $_FILES['gym_service_image']['error'];
	$fileType = $_FILES['gym_service_image']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('png', 'jpg', 'jpeg');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 5000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'img/uploadDocuments/gym_service_image/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sqll = "UPDATE vendor_gym_registration SET vendor_gym_service_img = '$fileNameNew' WHERE vendor_id = '$vendor_id'";
				$reslt = mysqli_query($con,$sqll);
				if ($reslt) {
					$s_message = 'Image Upload Success';
				}else {
					$s_message1 = "Image Upload Failed";
				}
			} else {
				$s_message1 = 'File size is too high';
			}
		} else {
			$message1 = 'Error. Something went wrong';
		}
	} else {
		$message1 = 'You can only upload PDF or DOCX files!';
	}
}


// AADHAAR FRONT & BACK IMAGE UPLOAD
if (isset($_POST['aadhar_image'])) {
	$vendor_id = $_POST['vendor_id'];
	$aadhaar_front = $_FILES['aadhaar_front'];
	$aadhaar_back = $_FILES['aadhaar_back'];

	$fileName = $_FILES['aadhaar_front']['name'];
	$bfileName = $_FILES['aadhaar_back']['name'];

	$fileTmpName = $_FILES['aadhaar_front']['tmp_name'];
	$bfileTmpName = $_FILES['aadhaar_back']['tmp_name'];

	$fileSize = $_FILES['aadhaar_front']['size'];
	$bfileSize = $_FILES['aadhaar_back']['size'];

	$fileError = $_FILES['aadhaar_front']['error'];
	$bfileError = $_FILES['aadhaar_back']['error'];

	$fileType = $_FILES['aadhaar_front']['type'];
	$bfileType = $_FILES['aadhaar_back']['type'];

	$fileExt = explode('.', $fileName);
	$bfileExt = explode('.', $bfileName);

	$fileActualExt = strtolower(end($fileExt));
	$bfileActualExt = strtolower(end($bfileExt));

	$allowed = array('png', 'jpg', 'jpeg');
	$ballowed = array('png', 'jpg', 'jpeg');

	$check = "SELECT aadhaar_front, aadhaar_back FROM aadhaar_image WHERE vendor_id = '$vendor_id'";
	$cResult = mysqli_query($con,$check);
	$count = mysqli_num_rows($cResult);
	if ($count == 1) {
		$a_message1 = "Image already uploaded.";
	}
	else
	{
		if (in_array($fileActualExt, $allowed)) {
			if (in_array($bfileActualExt, $ballowed)) {
				if ($fileError === 0) {
					if ($bfileError === 0) {
						if ($fileSize < 5000000) {
							if ($bfileSize < 5000000) {
								$fileNameNew = uniqid('', true).".".$fileActualExt;
								$bfileNameNew = uniqid('', true).".".$bfileActualExt;

								$fileDestination = 'img/uploadDocuments/aadhaar_images/'.$fileNameNew;
								$bfileDestination = 'img/uploadDocuments/aadhaar_images/'.$bfileNameNew;

								move_uploaded_file($fileTmpName, $fileDestination);
								move_uploaded_file($bfileTmpName, $bfileDestination);

								$sqll = "INSERT INTO aadhaar_image (vendor_id,aadhaar_front, aadhaar_back) VALUES ('$vendor_id', '$fileNameNew', '$bfileNameNew')";
								$reslt = mysqli_query($con,$sqll);
								if ($reslt) {
									$a_message = 'Image Upload Success';
								}else {
									$a_message1 = "Image Upload Failed";
								}
							} else {
								$a_message1 = 'File size is too high';
							}
						} else {
							$a_message1 = 'File size is too high';
						}
					} else {
						$a_message1 = 'Error. Something went wrong';
					}
				} else {
					$a_message1 = 'Error. Something went wrong';
				}
			} else {
				$a_message1 = 'You can only upload PNG, JPG JPEG files!';
			}
		} else {
			$a_message1 = 'You can only upload PNG, JPG JPEG files!';
		}
	}
}


// CANCLE CHEQUE IMAGE UPLOAD
if (isset($_POST['cheque_image'])) {
	$vendor_id = $_POST['vendor_id'];
	$cancle_cheque_image = $_FILES['cancle_cheque_image'];
	$fileName = $_FILES['cancle_cheque_image']['name'];
	$fileTmpName = $_FILES['cancle_cheque_image']['tmp_name'];

	$fileSize = $_FILES['cancle_cheque_image']['size'];

	$fileError = $_FILES['cancle_cheque_image']['error'];
	$fileType = $_FILES['cancle_cheque_image']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('png', 'jpg', 'jpeg');

	$check = "SELECT cancle_cheque_image FROM cheque_image WHERE vendor_id = '$vendor_id'";
	$cResult = mysqli_query($con,$check);
	$count = mysqli_num_rows($cResult);
	if ($count == 1) {
		$c_message1 = "Image already uploaded.";
	}
	else
	{
		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 5000000) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'img/uploadDocuments/cancle_cheque_images/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					$sqll = "INSERT INTO cheque_image (vendor_id,cancle_cheque_image) VALUES ('$vendor_id', '$fileNameNew')";
					$reslt = mysqli_query($con,$sqll);
					if ($reslt) {
						$c_message = 'Image Upload Success';
					}else {
						$c_message1 = "Image Upload Failed";
					}
				} else {
					$c_message1 = 'File size is too high';
				}
			} else {
				$c_message1 = 'Error. Something went wrong';
			}
		} else {
			$c_message1 = 'You can only upload PDF or DOCX files!';
		}
	}
}


// PAN CARD IMAGE UPLOAD
if (isset($_POST['pan_image'])) {
	$vendor_id = $_POST['vendor_id'];
	$pan_card_image = $_FILES['pan_card_image'];
	$fileName = $_FILES['pan_card_image']['name'];
	$fileTmpName = $_FILES['pan_card_image']['tmp_name'];

	$fileSize = $_FILES['pan_card_image']['size'];

	$fileError = $_FILES['pan_card_image']['error'];
	$fileType = $_FILES['pan_card_image']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('png', 'jpg', 'jpeg');

	$check = "SELECT pan_card_image FROM pan_image WHERE vendor_id = '$vendor_id'";
	$pResult = mysqli_query($con,$check);
	$count = mysqli_num_rows($pResult);
	if ($count == 1) {
		$p_message1 = "Image already uploaded.";
	}
	else
	{

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 5000000) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'img/uploadDocuments/pan_images/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					$sqll = "INSERT INTO pan_image (vendor_id,pan_card_image) VALUES ('$vendor_id', '$fileNameNew')";
					$reslt = mysqli_query($con,$sqll);
					if ($reslt) {
						$p_message = 'Image Upload Success';
					}else {
						$p_message1 = "Image Upload Failed";
					}
				} else {
					$p_message1 = 'File size is too high';
				}
			} else {
				$p_message1 = 'Error. Something went wrong';
			}
		} else {
			$p_message1 = 'You can only upload PDF or DOCX files!';
		}
	}
}


// GST CERTIFICATE UPLOAD
if (isset($_POST['gst_image'])) {
	$vendor_id = $_POST['vendor_id'];
	$gst_certificate = $_FILES['gst_certificate'];
	$fileName = $_FILES['gst_certificate']['name'];
	$fileTmpName = $_FILES['gst_certificate']['tmp_name'];

	$fileSize = $_FILES['gst_certificate']['size'];

	$fileError = $_FILES['gst_certificate']['error'];
	$fileType = $_FILES['gst_certificate']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('pdf');

	$check = "SELECT gst_certificate FROM gst_image WHERE vendor_id = '$vendor_id'";
	$pResult = mysqli_query($con,$check);
	$count = mysqli_num_rows($pResult);
	if ($count == 1) {
		$p_message1 = "Image already uploaded.";
	}
	else
	{

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 5000000) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'img/uploadDocuments/gstCertificates/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					$sqll = "INSERT INTO gst_image (vendor_id,gst_certificate) VALUES ('$vendor_id', '$fileNameNew')";
					$reslt = mysqli_query($con,$sqll);
					if ($reslt) {
						$message = 'File Upload Success';
					}else {
						$message1 = "File Upload Failed";
					}
				} else {
					$message1 = 'File size is too high';
				}
			} else {
				$message1 = 'Error. Something went wrong';
			}
		} else {
			$message1 = 'You can only upload PDF_arc(p, x, y, r, alpha, beta) files!';
		}
	}


}


?>

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
	                      <th scope="col">S No.</th>
	                      <th scope="col">Upload Documents</th>
	                      <th scope="col">View Documents</th>
	                    </tr>
                  	</thead>
                  	<tbody>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                  	<tr style="font-size: 15px">
                    	<td>1</td>
                      	<td style="width: 50%">Enter your business description:<br>
	                      	<form action="#" method="post">
	                      		<input type="hidden" class="form-control" value="<?= $vendor_id ?>" placeholder="Upload GYM Main Image" name="vendor_id" required>
                             	<textarea class="form-control" name="description" style="height: 200px">Enter your business description here.</textarea>
                                <button class="btn btn-success" type="submit"style=" float:right; margin-top:10px;" name="update_description">Update Description</button>           
                             </form>
	                      	<p style="color: green"><?= $d_message ?></p><p style="color: red"><?= $d_message1 ?></p>
                      	</td>
                      	<td >Viwe GYM Description:<br>
                      		<?php
                      		$search = "SELECT vendor_business_description from vendor_gym_registration WHERE vendor_id = '$vendor_id'";
                      		$fth = mysqli_query($con,$search);
                      		while($rw = mysqli_fetch_array($fth)){
                      		$vendor_business_description = $rw['vendor_business_description'];
                      		?>
                      		<p><?= $vendor_business_description ?></p>
                      		<?php } ?>
                      	</td>
                    </tr>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                    <tr style="font-size: 15px">
                    	<td>2</td>
                      	<td style="width: 50%">Upload GYM Main Image:<br>
	                      	<form method="post" action="#" enctype="multipart/form-data" class="input-group mb-3">
	                      		<input type="hidden" class="form-control" value="<?= $vendor_id ?>" placeholder="Upload GYM Main Image" name="vendor_id" required>
	                      		<input type="file" class="form-control" placeholder="Upload GYM Main Image" name="gym_main_image" required>
							    <div class="input-group-append">
							        <button class="btn btn-outline-secondary" type="submit" name="main_image">Upload</button>
							    </div>
	                      	</form>
	                      	<p style="color: green"><?= $m_message ?></p><p style="color: red"><?= $m_message1 ?></p>
                      	</td>
                      	<td >Viwe GYM Main Image:<br>
                      		<?php
                      		$search = "SELECT vendor_gym_main_img from vendor_gym_registration WHERE vendor_id = '$vendor_id'";
                      		$fth = mysqli_query($con,$search);
                      		while($rw = mysqli_fetch_array($fth)){
                      		$main_image = $rw['vendor_gym_main_img'];
                      		?>
                      		<img src="img/uploadDocuments/gym_main_image/<?= $main_image ?>" height="300px" width="600px">
                      		<?php } ?>
                      	</td>
                    </tr>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                    <tr style="font-size: 15px">
                    	<td>3</td>
                      	<td style="width: 50%">Upload GYM Service Image:<br>
	                      	<form method="post" action="#" enctype="multipart/form-data" class="input-group mb-3">
	                      		<input type="hidden" class="form-control" value="<?= $vendor_id ?>" placeholder="Upload GYM Main Image" name="vendor_id" required>
	                      		<input type="file" class="form-control" placeholder="Upload GYM Service Image" name="gym_service_image" required>
							    <div class="input-group-append">
							        <button class="btn btn-outline-secondary" type="submit" name="service_image">Upload</button>
							    </div>
	                      	</form>
	                      	<p style="color: green"><?= $s_message ?></p><p style="color: red"><?= $s_message1 ?></p>
                      	</td>
                      	<td >Viwe GYM Service Image:<br>
                      		<?php
                      		$s_search = "SELECT vendor_gym_service_img from vendor_gym_registration WHERE vendor_id = '$vendor_id'";
                      		$s_fth = mysqli_query($con,$s_search);
                      		while($s_rw = mysqli_fetch_array($s_fth)){
                      		$s_main_image = $s_rw['vendor_gym_service_img'];
                      		?>
                      		<img src="img/uploadDocuments/gym_service_image/<?= $s_main_image ?>" height="300px" width="600px">
                      		<?php } ?>
                      	</td>
                    </tr>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
					
					<tr style="font-size: 15px">
                    	<td>4</td>
                      	<td style="width: 50%">
                      		Upload Aadhar Front and Back:<br><br>
                      		<p style="color: red"><?= $message1 ?></p>
                      		<?php
                      		$afchck = "SELECT aadhaar_front, aadhaar_back from aadhaar_image WHERE vendor_id = '$vendor_id'";
                      		$afts = mysqli_query($con,$afchck);
                      		$afcount = mysqli_num_rows($afts);
                      		if ($afcount == 1) {
	                      		echo "<br><br><br><h1>Image already uploaded!</h1>";
                      		}
                      		else
                      		{

                      		?>
		                      	<form method="post" action="#" enctype="multipart/form-data" class="input-group mb-3">
		                      		<input type="hidden" class="form-control" value="<?= $vendor_id ?>" placeholder="Upload GYM Main Image" name="vendor_id" required>
		                      		<div class="form-group">
			                      		<label>Upload Addhaar Front</label>
			                      		<input type="file" class="form-control" placeholder="Upload Addhaar Front" name="aadhaar_front" required>
		                      		</div><br>
		                      		<div class="form-group">
			                      		<label>Upload Addhaar Back</label>
			                      		<input type="file" class="form-control" placeholder="Upload Addhaar Back" name="aadhaar_back" required>
			                      	</div>
								    <div class="form-group">
								        <button class="btn btn-outline-secondary form-control" type="submit" name="aadhar_image">Upload</button>
								    </div>
		                      	</form>
		                      	<p style="color: green"><?= $a_message ?></p><p style="color: red"><?= $a_message1 ?></p>
	                      	<?php } ?>
                      	</td>
                      	<td >Viwe GYM Service Image:<br>
                      		<?php
                      		$s_search = "SELECT aadhaar_front, aadhaar_back from aadhaar_image WHERE vendor_id = '$vendor_id'";
                      		$s_fth = mysqli_query($con,$s_search);
                      		while($s_rw = mysqli_fetch_array($s_fth)){
                      		$aadhaar_front = $s_rw['aadhaar_front'];
                      		$aadhaar_back = $s_rw['aadhaar_back'];
                      		?>
                      		<img src="img/uploadDocuments/aadhaar_images/<?= $aadhaar_front ?>" height="300px" width="300px">
                      		<img src="img/uploadDocuments/aadhaar_images/<?= $aadhaar_back ?>" height="300px" width="300px">
                      		<?php } ?>
                      	</td>
                    </tr>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

                    <tr style="font-size: 15px">
                    	<td>5</td>
                      	<td style="width: 50%">Upload Cancle Cheque Image:<br><br>
                      		<p style="color: red"><?= $c_message1 ?></p>
                      		<?php

                      		$cchck = "SELECT cancle_cheque_image from cheque_image WHERE vendor_id = '$vendor_id'";
                      		$cts = mysqli_query($con,$cchck);
                      		$ccount = mysqli_num_rows($cts);
                      		if ($ccount == 1) {
                      			echo "<br><br><br><h1>Image already uploaded!</h1>";
                      		} else {

                      		?>
	                      	<form method="post" action="#" enctype="multipart/form-data" class="input-group mb-3">
	                      		<input type="hidden" class="form-control" value="<?= $vendor_id ?>" placeholder="Upload GYM Main Image" name="vendor_id" required>
	                      		<input type="file" class="form-control" placeholder="Upload Cancle Cheque Image" name="cancle_cheque_image" required>
							    <div class="input-group-append">
							        <button class="btn btn-outline-secondary" type="submit" name="cheque_image">Upload</button>
							    </div>
	                      	</form>
	                      	<p style="color: green"><?= $c_message ?></p><p style="color: red"><?= $c_message1 ?></p>
	                      	<?php } ?>
                      	</td>
                      	<td >View Cancle Cheque Image:<br>
                      		<?php
                      		$c_search = "SELECT cancle_cheque_image from cheque_image WHERE vendor_id = '$vendor_id'";
                      		$c_fth = mysqli_query($con,$c_search);
                      		while($c_rw = mysqli_fetch_array($c_fth)){
                      		$c_main_image = $c_rw['cancle_cheque_image'];
                      		?>
                      		<img src="img/uploadDocuments/cancle_cheque_images/<?= $c_main_image ?>" height="300px" width="600px">
                      		<?php } ?>
                      	</td>
                    </tr>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                    <tr style="font-size: 15px">
                    	<td>6</td>
                      	<td style="width: 50%">Upload PAN Card Image:<br><br>
                      		<p style="color: red"><?= $p_message1 ?></p>
                      		<?php

                      		$pchck = "SELECT pan_card_image from pan_image WHERE vendor_id = '$vendor_id'";
                      		$pts = mysqli_query($con,$pchck);
                      		$pcount = mysqli_num_rows($pts);
                      		if ($pcount == 1) {
                      			echo "<br><br><br><h1>Image already uploaded!</h1>";
                      		} else {

                      		?>
	                      	<form method="post" action="#" enctype="multipart/form-data" class="input-group mb-3">
	                      		<input type="hidden" class="form-control" value="<?= $vendor_id ?>" placeholder="Upload GYM Main Image" name="vendor_id" required>
	                      		<input type="file" class="form-control" placeholder="Upload Pan Card Image" name="pan_card_image" required>
							    <div class="input-group-append">
							        <button class="btn btn-outline-secondary" type="submit" name="pan_image">Upload</button>
							    </div>
	                      	</form>
	                      	<p style="color: green"><?= $p_message ?></p><p style="color: red"><?= $p_message1 ?></p>
	                      	<?php } ?>
                      	</td>
                      	<td >Viwe PAN Card Image:<br>
                      		<?php
                      		$p_search = "SELECT pan_card_image from pan_image WHERE vendor_id = '$vendor_id'";
                      		$p_fth = mysqli_query($con,$p_search);
                      		while($p_rw = mysqli_fetch_array($p_fth)){
                      		$p_main_image = $p_rw['pan_card_image'];
                      		?>
                      		<img src="img/uploadDocuments/pan_images/<?= $p_main_image ?>" height="300px" width="600px">
                      	<?php } ?>
                      	</td>
                    </tr>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                    <tr style="font-size: 15px">
                    	<td>7</td>
                      	<td style="width: 50%">
                      		Upload GST Certificate PDF:<br><br>
                      		<p style="color: red"><?= $message1 ?></p>
                      		<?php

                      		$gchck = "SELECT gst_certificate from gst_image WHERE vendor_id = '$vendor_id'";
                      		$gts = mysqli_query($con,$gchck);
                      		$gcount = mysqli_num_rows($gts);
                      		if ($gcount == 1) {
                      			echo "<br><br><br><h1>File already uploaded!</h1>";
                      		} else {

                      		?>
	                      	<form method="post" action="#" enctype="multipart/form-data" class="input-group mb-3">
	                      		<input type="hidden" class="form-control" value="<?= $vendor_id ?>" placeholder="Upload GYM Main Image" name="vendor_id" required>
	                      		<input type="file" class="form-control" placeholder="Upload GST Certificate PDF" name="gst_certificate" required>
							    <div class="input-group-append">
							        <button class="btn btn-outline-secondary" type="submit" name="gst_image">Upload</button>
							    </div>
	                      	</form>
	                      	<p style="color: green"><?= $message ?></p><p style="color: red"><?= $message1 ?></p>
	                      	<?php } ?>
                      	</td>
                      	<td >Viwe GST Certificate:<br>
                      		<?php
                      		$g_search = "SELECT gst_certificate from gst_image WHERE vendor_id = '$vendor_id'";
                      		$g_fth = mysqli_query($con,$g_search);
                      		while($g_rw = mysqli_fetch_array($g_fth)){
                      		$g_main_image = $g_rw['gst_certificate'];
                      		?>

                      		<iframe width="100%" height="350%" src="img/uploadDocuments/gstCertificates/<?= $g_main_image ?>"></iframe>
                      		<?php } ?>
                      	</td>
                    </tr>
                  <?php //} ?>
                  </tbody>
                </table>
              </div>

          </div>
        </div>
        <!-- /.container-fluid -->

        

      </div>






<?php include('includes/footer.php') ?>