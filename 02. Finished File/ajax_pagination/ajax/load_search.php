<?php

	require('../include/bootstrap.php');

	$search = $_POST['search'];
	$field = $_POST['field'];

	$sql  = "SELECT * FROM tblemployees INNER JOIN tbldepartment ON tblemployees.departmentid = tbldepartment.departmentid ";
	$sql .= "INNER JOIN tblprogram ON tblemployees.programid = tblprogram.programid ";
	
	if ($field == 'all') {

		$sql .= "WHERE CONCAT_WS(' ', lastname, firstname, sex, department, program_desc) LIKE '%"  . $search . "%' " ;

	} else {

		$sql .= "WHERE ". $field . " LIKE '%"  . $search . "%' " ;
		
	}

	$sql .= "ORDER BY lastname, firstname, department, program_desc, sex" ;

	$count = row_count($sql);

?>

<?php

	if ($count > 0) {

	echo "<div>";

		echo "<div class='mb-1'>";

			echo "<p>" . $count . " match/es found." . "</p>"; 

		echo "</div>";

		echo "<table>";
			echo "<thead>";
				echo "<tr>";
					echo "<th> Last Name </th>";
					echo "<th> First Name </th>";
					echo "<th> Sex </th>";
					echo "<th> Department </th>";
					echo "<th> Program </th>";
					echo "<th colspan='3'> Action </th>";
				echo "</tr>";
			echo "</thead>";

			echo "<tbody>";

		$result = fetch_multiple_data($sql);

		foreach ($result as $key) {

			echo "<tr>";
				
				echo "<td>" . $key['lastname'] . "</td>";
				echo "<td>" . $key['firstname'] . "</td>";
				echo "<td>" . $key['sex'] . "</td>";
				echo "<td>" . $key['department'] . "</td>";
				echo "<td>" . $key['program_desc'] . "</td>";
				echo "<td><a href='update.php?id={$key['employeeid']}'> UPDATE </a>";
				echo "<td><a href=\"delete.php?id={$key['employeeid']}\" onclick=\"return confirm('Are you Sure?')\"> DELETE </a>";
				echo "<td><a href='#' data-employee-id=\"{$key['employeeid']}\" class='view-info'> VIEW </a>";
			echo "</tr>";

		}

			echo "</tbody>";

		echo "</table>";

	echo "</div>";

	} else {

		echo "<h3> No Match/es Found. </h3>";

	}

?>
