<?php 

	require('../include/bootstrap.php');

	$employeeid = $_POST['employeeid'];

	$sql = "SELECT * FROM tblemployees WHERE employeeid = :id";

	$result = fetch_single_data($sql, $employeeid);

	if ($result['photo'] == '') {

		echo "<p class='tooltip' style='background-image: url(img/nophoto.jpg);'></p>";

	} else {

		echo "<p class='tooltip' style='background-image: url(upload/" . $result['photo'] . ");'></p>";
	}


?>