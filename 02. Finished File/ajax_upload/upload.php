<?php

	require('include/bootstrap.php');

	$employeeid = $_GET['employeeid'];

	$dir = "upload/";
	$temp_name = $_FILES['photo']['tmp_name'];
	$name = basename($_FILES['photo']['name']);

	$file_extension = pathinfo($name, PATHINFO_EXTENSION);

	$random_name = uniqid($name, true);
	$random_number = rand(1, 1000000000);

	$new_name = $random_name . $random_number;

	move_uploaded_file($temp_name, $dir . $new_name . $file_extension);

	$new_array = array('photo' => $name, 'dummy' => 'dummy');

	execute_query('tblemployees', $new_array, 'update', 'employeeid', $employeeid);

	header("Location: index.php");

?>