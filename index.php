<?php
	include 'db.php';

	$sql = "SELECT * FROM students";

	$result = mysqli_query($conn, $sql);
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple CRUD</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
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
						<div>All Student</div>
						<div><a href="add.php" class="btn btn-info">Add Student</a></div>
					</div>
					<div class="card-body">
						<?php if ($result->num_rows > 0) { ?>
							<table class="table table-responsive-sm">
								<head>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Address</th>
										<th>Action</th>
									</tr>
								</head>
								<tbody>
									<?php $i=0; while($student = $result->fetch_assoc()) { $i++; ?>
										<tr>
											<td><?php echo($i); ?></td>
											<td><?php echo($student['name']) ?></td>
											<td><?php echo($student['address']) ?></td>
											<td>
												<div class="btn-group">
													<a href="view.php?id=<?php echo($student['id']); ?>" class="btn btn-sm btn-primary">View</a>
													<a href="edit.php?id=<?php echo($student['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
													<a href="delete.php?id=<?php echo($student['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Address</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						<?php } else  { echo('<div class="alert alert-warning">No Result Found!</div>'); } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
