<?php include('config.php'); ?>
<?php  
	
	$sql = "SELECT * FROM tblproduct ORDER BY pname";
	$result = mysql_query($sql, $conn);

	if (mysql_num_rows($result) == 0) {

		echo 'No Record/s Found';

	} else {

		$output = "<table id='product-data'>";
		$output .= "<tr>";
			$output .= "<td> Product Name </td><td> Price </td><td> Stock </td><td></td><td></td>";
		$output .= "</tr>";

		while ($row = mysql_fetch_array($result)) {

			$output .= "<tr>";
			$output .= "<td>" . $row['pname'] . "</td>";
			$output .= "<td>" . $row['price'] . "</td>";
			$output .= "<td>" . $row['stock'] . "</td>";
			$output .= "<td><span class='hover-pointer upd' data-id='" . $row['id'] . "'> update </span></td>";
			$output .= "<td><span class='hover-pointer del' data-id='" . $row['id'] . "'> delete </span></td>";

		}

		echo $output;

	}


?>