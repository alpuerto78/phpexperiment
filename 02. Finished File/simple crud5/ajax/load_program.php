<?php 

	require('../include/bootstrap.php');

	$departmentid = $_POST['departmentid'];

	$sql = "SELECT * FROM tblprogram WHERE departmentid = {$departmentid} ORDER BY program_desc";

	$result = fetch_multiple_data($sql);

	$output = '';

	foreach ($result as $key) {

		$output .= "<option value={$key['programid']}>" . $key['program_desc'] . "</option>";

	}

	echo $output;

?>