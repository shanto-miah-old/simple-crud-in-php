<?php
	include 'db.php';

	if (isset($_GET['id'])) {

		$sql = "DELETE FROM students WHERE id = ".$_GET['id'];

		if (mysqli_query($conn, $sql)) {
			header('location: index.php');
		} else {
			header('location: index.php');
		}
	} else {
		header('location: index.php');
	}
?>