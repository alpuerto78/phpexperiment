<?php  
	
	include('include/bootstrap.php');

	$manufacturerid = $_POST['manufacturerid'];

	$sql = "SELECT * FROM tblmodel WHERE manufacturerid = :manufacturerid ORDER BY model";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':manufacturerid', $manufacturerid, PDO::PARAM_INT);

	$stmt->execute();

	$result = $stmt->fetchAll();

	$output = '';

	foreach ($result as $key) {

		$output .= "<option value={$key['modelid']}>" . $key['model'] . "</option>";

	}

	echo $output;

?>