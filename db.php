<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "crud_db";
	 
	$conn = mysqli_connect($servername, $username, $password, $database);
	if(!$conn){
		die(mysql_connect_error());
	}
?>