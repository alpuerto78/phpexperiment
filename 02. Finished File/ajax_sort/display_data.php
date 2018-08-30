<?php include('config.php'); ?>
<?php

	$sql = "SELECT * FROM tblinfo";
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