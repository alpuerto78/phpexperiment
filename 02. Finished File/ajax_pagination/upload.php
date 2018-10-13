<?php

	require('include/bootstrap.php');

	$employeeid = $_GET['employeeid'];

	$dir = "upload/";
	$temp_name = $_FILES['photo']['tmp_name'];
	$name = basename($_FILES['photo']['name']);

	move_uploaded_file($temp_name, $dir . $name);

	$new_array = array('photo' => $name, 'dummy' => 'dummy');

	execute_query('tblemployees', $new_array, 'update', 'employeeid', $employeeid);

	header("Location: index.php");

?>