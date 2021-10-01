<?php
	$localhost = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bluestar";
	$conc = mysqli_connect($localhost,$username,$password,$dbname);
	if (!$conc)
	{
		die($mysqli->connect_error);
	}

	mysqli_select_db($conc,"bluestar");
?>