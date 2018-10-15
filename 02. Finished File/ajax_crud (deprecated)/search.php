<?php include('config.php'); ?>
<?php  
	
	$pname = $_POST['pname'];
	$sql = "SELECT * FROM tblproduct WHERE pname LIKE '%$pname%'";
	
	if (!isset($pname) || $pname != '') {

		$result = mysql_query($sql, $conn);

		if (mysql_num_rows($result) == 0) {

			echo "No Match Found!";

		} else {

			echo "<tr>";
				echo "<th> Product Name </th>";
				echo "<th> Price </th>";
				echo "<th> Stock </th>";
			echo "</tr>";

			while ($row = mysql_fetch_array($result)) {

				echo "<tr>";
					echo "<td>" . $row['pname'] . "</td>";
					echo "<td>" . $row['price'] . "</td>";
					echo "<td>" . $row['stock'] . "</td>";
				echo "</tr>";

			}

		}

	}

?>