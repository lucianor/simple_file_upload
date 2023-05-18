<?PHP
$message ="";
$path = "uploads/";

if(!empty($_FILES['uploaded_file'])) {
	$path = $path . basename( $_FILES['uploaded_file']['name']);

	if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
		$message= "The file ".  basename( $_FILES['uploaded_file']['name'])." has been uploaded";
		$cssclass= "success";
	} else {
		$message="There was an error uploading the file, please try again!";
		$cssclass = "danger";
	}
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>File Upload</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>
	<body>
		<div class="px-4 py-5 my-5 text-center">
			<h1 class="display-5 fw-bold text-body-emphasis">Upload Files</h1><br />
			<div class="mx-auto">
					<div class="d-grid d-sm-flex justify-content-sm-center">
						<form enctype="multipart/form-data" action="upload.php" method="POST">
							<fieldset>
								<input type="file" class="form-control" placeholder="File" aria-label="File" name="uploaded_file"><br/>
								<button type="submit" class="btn btn-primary">Upload</button>
							</fieldset>
						</form>
					</div>
					<br />
					<?PHP if (!empty($message)) { ?>
					<div class="d-grid d-sm-flex justify-content-sm-center">
							<div class="alert alert-<?=$cssclass?> alert-dismissible fade show" role="alert"><?=$message?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
					</div>
					<?PHP } ?>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>
