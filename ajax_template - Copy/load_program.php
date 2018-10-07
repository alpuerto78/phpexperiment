<?php 

	require('include/bootstrap.php');

	$departmentid = $_POST['departmentid'];

	$sql = "SELECT * FROM tblprogram WHERE departmentid = :departmentid ORDER BY program_desc";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':departmentid', $departmentid, PDO::PARAM_INT);

	$stmt->execute();

	$result = $stmt->fetchAll();

	$output = '';

	foreach ($result as $key) {

		$output .= "<option value={$key['programid']}>" . $key['program_desc'] . "</option>";

	}

	echo $output;

?>