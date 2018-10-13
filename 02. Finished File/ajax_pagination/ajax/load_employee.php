<?php

	require('../include/bootstrap.php');

	$limit = 3;

	if (!isset($_GET['page'])) {

		$page = 1;

	} else {

		$page = $_GET['page'];

	}

	$start = ($page - 1) * $limit;

	// (1 - 1) * 10 = 0, 10
	// (2 - 1) * 10 = 10, 10
   	// (3 - 1) * 10 = 30, 10

	$sql = "SELECT * FROM tblemployees ";
	$total_count = row_count($sql);

	$sql_pagination = "SELECT * FROM tblemployees INNER JOIN tbldepartment ON tblemployees.departmentid = tbldepartment.departmentid ";
	$sql_pagination .= "INNER JOIN tblprogram ON tblemployees.programid = tblprogram.programid ORDER BY lastname, firstname, department, program_desc ";
	$sql_pagination .= "LIMIT {$start}, {$limit}";



	if ($total_count > 0) {

		echo "<div class='mb-1'>";

			$showFrom = $start + 1;
			$showTo = $page * $limit;
		
			if (($showTo) > $total_count) {

				$showTo = abs(($showTo) - ($total_count + $showTo));

			}

			echo "<p>" . $showFrom . " - " . $showTo . " of " . $total_count . " record/s " . "</p>";

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

		$result = fetch_multiple_data($sql_pagination);

		foreach ($result as $key) {

			echo "<tr>";
			
				echo "<td>" . $key['lastname'] . "</td>";
				echo "<td>" . $key['firstname'] . "</td>";
				echo "<td>" . $key['sex'] . "</td>";
				echo "<td>" . $key['department'] . "</td>";
				echo "<td>" . $key['program_desc'] . "</td>";
				echo "<td><a href='update.php?id={$key['employeeid']}'> UPDATE </a></td>";
				echo "<td><a href=\"delete.php?id={$key['employeeid']}\" onclick=\"return confirm('Are you Sure?')\"> DELETE </a></td>";
				echo "<td><a href='#' data-employee-id=\"{$key['employeeid']}\" class='view-info'> VIEW </a></td>";
				
			echo "</tr>";

		}

			echo "</tbody>";

		echo "</table>";

	} else {

		echo "<h3> No Records Found or Database is Empty! </h3>";

	}

?>