<?php

	require('../include/bootstrap.php');

	$id = $_GET['id'];

	execute_query('tblemployees', $_POST, 'update', 'employeeid', $id, 'ajax');

?>			



	

				

