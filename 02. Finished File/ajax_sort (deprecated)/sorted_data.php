<?php include('config.php'); ?>
<?php

	$field_value = $_POST['field_value'];
	$sort_value = $_POST['sort_value'];

	$sql = "SELECT * FROM tblinfo ORDER BY $field_value $sort_value";
	$result = mysql_query($sql, $conn);


	while ($row = mysql_fetch_array($result)) {

		echo "<tr class='tr-contents'>";
			echo "<td>" . $row['lastname'] . "</td>";
			echo "<td>" . $row['firstname'] . "</td>";
			echo "<td>" . $row['department'] . "</td>";
			echo "<td>" . $row['salary'] . "</td>";	
		echo "</tr>";

	}

?>