<?php

	require('include/bootstrap.php');

	$employeeid = $_GET['employeeid'];

	$dir = "upload/";
	$temp_name = $_FILES['photo']['tmp_name'];
	$name = basename($_FILES['photo']['name']);

	$file_extension = pathinfo($name, PATHINFO_EXTENSION);

	$random_number = rand(1, 1000000000);
	$random_name = uniqid($random_number, true);
	
	$new_file_name = $random_name . $random_number . '.' . $file_extension;

	move_uploaded_file($temp_name, $dir . $new_file_name);

	$post_data = array('photo' => $new_file_name, 'dummy' => 'dummy');

	execute_query('tblemployees', $post_data, 'update', 'employeeid', $employeeid);

	header("Location: index.php");

?>