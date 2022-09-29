<?php

  include "php/config.php";

$link = "";
$link_status = "display: none;";

if (isset($_POST['upload'])) { // If isset upload button or not
	// Declaring Variables
	$location = "uploads/";
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"]; // Get uploaded file size

	/*
	How we can get mb from bytes
	(mb*1024)*1024

	In my case i'm 10 mb limit
	(10*1024)*1024
	*/

	if ($file_size > 10485760) { // Check file size 10mb or not
		echo "<script>alert('Woops! File is too big. Maximum file size allowed for upload 10 MB.')</script>";
	} else {
		$sql = "INSERT INTO uploaded_files (name, new_name)
				VALUES ('$file_name', '$file_new_name')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
			echo '  <div class="alert alert-success  cols2" role="alert">
        <span> FILE UPLOAD SUCCESFULL</span>
        </div>';

			// Select id from database
			$sql = "SELECT id FROM uploaded_files ORDER BY id DESC";
			$result = mysqli_query($conn, $sql);
			if ($row = mysqli_fetch_assoc($result)) {
				$link = base64_encode($base_url . "download.php?id=" . $row['id']);
        //	$link = ($base_url . "download.php?id=" . $row['id']);
				$link_status = "display: block;";
			}
		} else {
			echo ' <div class="alert alert-danger  cols2 cols2-eror-success" role="alert">
        <span>    Woops! SOMETHING WENT WRONG.</span>
          </div>';
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="upload.css">
	<title>Uprint file upload</title>
</head>
<body>
	<div class="file__upload">
		<div class="header">
<img src="../images/logo.jpg" alt="" style="border-radius:50%; width:25%;">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>

		</div>

		<form action="" method="POST" enctype="multipart/form-data" class="body">
			<!-- Sharable Link Code -->
			<input type="checkbox" id="link_checkbox">
			<input type="text" value="<?php echo $link; ?>" id="link" readonly>
			<label for="link_checkbox" style="<?php echo $link_status; ?>">Get Sharable Link</label>

			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p><br>
					<strong>	<span>browse</span> to begin the upload</strong>

				</p>
			</label>
			<button name="upload" class="btn">Upload</button>
                              <a href="print.php">  <i class="fas fa-arrow-circle-left fa-2x" ></i> </a>
		</form>

	</div>
  <script type="text/javascript">
  $(document).ready(function () {

  window.setTimeout(function() {
      $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
          $(this).remove();
      });
  }, 5000);

  });

  </script>
</body>
</html>
