<?php

	require('include/bootstrap.php');

	$employeeid = $_GET['employeeid'];

	$post_data = []; //no post data will pe passed

	execute_query('tblemployees', $post_data, 'delete', 'employeeid', $employeeid);

	redirect_to("index.php");

?>