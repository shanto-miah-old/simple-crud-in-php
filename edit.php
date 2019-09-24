<?php
	include 'db.php';

	if (!isset($_GET['id'])) {
		header('location: index.php');
	} else {
		$sql = "SELECT * FROM students WHERE id=".$_GET['id'];

		$result = mysqli_query($conn, $sql);
	}
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple CRUD</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container py-4">
		<div class="text-center p-4">
			<h2>Simple CRUD</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card shadow-sm">
					<div class="card-header d-flex justify-content-between">
						<div>Update Information</div>
						
						<div><a href="index.php" class="btn btn-info">Back</a></div>
					</div>
					<div class="card-body">
						<?php
						if ($result->num_rows > 0) { $student = mysqli_fetch_assoc($result);

							if (isset($_POST['update'])) {
								echo('<div class="alert alert-warning">');
								if ($_POST['name'] == '' || $_POST['father_name'] == '' || $_POST['address'] == '' || $_POST['mobile_number'] == '') {
									echo('All fileds are required!');
								} else {
									$sql = "UPDATE students SET name = '".$_POST['name']."', father_name = '".$_POST['father_name']."', mobile_number = '".$_POST['mobile_number']."', address = '".$_POST['address']."' WHERE id = ".$_GET['id'];

									if(mysqli_query($conn, $sql)) {
										echo('Update Successfull!');
									}
								}
								echo('</div>');

							}
							?>
							<form method="POST">
								
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" value="<?php echo($student['name']); ?>" placeholder="Name..." class="form-control">
								</div>

								<div class="form-group">
									<label>Father NAme</label>
									<input type="text" name="father_name" value="<?php echo($student['father_name']); ?>" placeholder="Father Name..." class="form-control">
								</div>

								<div class="form-group">
									<label>Address</label>
									<textarea name="address" class="form-control" rows="3"><?php echo($student['address']); ?></textarea>
								</div>

								<div class="form-group">
									<label>Mobile Number</label>
									<input type="number" name="mobile_number" value="<?php echo($student['mobile_number']); ?>" placeholder="Mobile Number..." class="form-control">
								</div>

								<div class="form-group">
									<input type="submit" name="update" value="Update" class="btn btn-block btn-info">
								</div>

								
							</form>
						<?php } else  { header('location: index.php'); } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
