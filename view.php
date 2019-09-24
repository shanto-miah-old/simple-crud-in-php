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
			<div class="col-10">
				<div class="card shadow-sm">
					<div class="card-header d-flex justify-content-between">
						<div>Student Information</div>
						
						<div><a href="index.php" class="btn btn-info">Back</a></div>
					</div>
					<div class="card-body">
						<?php if ($result->num_rows > 0) { $student = mysqli_fetch_assoc($result); ?>
							<table class="table table-responsive-sm">
								<tr>
									<th>Name</th>
									<td><?php echo($student['name']); ?></td>
								</tr>
								<tr>
									<th>Father Name</th>
									<td><?php echo($student['father_name']); ?></td>
								</tr>
								<tr>
									<th>Address</th>
									<td><?php echo($student['address']); ?></td>
								</tr>
								<tr>
									<th>Mobile Number</th>
									<td><?php echo($student['mobile_number']); ?></td>
								</tr>
								<tr>
									<th>Action</th>
									<td>
										<a href="edit.php?id=<?php echo($student['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
										<a href="delete.php?id=<?php echo($student['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
									</td>
								</tr>

							</table>
						<?php } else  { echo('<div class="alert alert-warning">No Result Found!</div>'); } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
