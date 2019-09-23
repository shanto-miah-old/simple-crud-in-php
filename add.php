<?php
	include 'db.php';
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple CRUD</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
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
						<div>Add New Student</div>
						
						<div><a href="index.php" class="btn btn-info">Back</a></div>
					</div>
					<div class="card-body">

						<?php
							if (isset($_POST['add'])) {

								echo('<div class="alert alert-warning">');

								if ($_POST['name'] == '' || $_POST['father_name'] == '' || $_POST['address'] == '' || $_POST['mobile_number'] == '') {
									echo('All fileds are required!');
								} else {
									$sql = "INSERT INTO students (name, father_name, address, mobile_number) VALUES ('".$_POST['name']."', '".$_POST['father_name']."', '".$_POST['mobile_number']."', '".$_POST['address']."')";

									if(mysqli_query($conn, $sql)) {
										echo('Student Added Successfull!');
									} else {
										echo('Failed!');
									}
								}

								echo('</div>');

							}
						?>

						<form method="POST">
							
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" placeholder="Name..." class="form-control">
							</div>

							<div class="form-group">
								<label>Father NAme</label>
								<input type="text" name="father_name" placeholder="Father Name..." class="form-control">
							</div>

							<div class="form-group">
								<label>Address</label>
								<textarea name="address" class="form-control" rows="3"></textarea>
							</div>

							<div class="form-group">
								<label>Mobile Number</label>
								<input type="number" name="mobile_number" placeholder="Mobile Number..." class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="add" value="Add New" class="btn btn-block btn-info">
							</div>

							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>