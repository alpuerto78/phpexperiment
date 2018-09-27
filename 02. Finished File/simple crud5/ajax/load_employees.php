<?php

	require('../include/bootstrap.php');

	$sql = "SELECT * FROM tblemployees INNER JOIN tbldepartment ON tblemployees.departmentid = tbldepartment.departmentid ";
	$sql .= "INNER JOIN tblprogram ON tblemployees.programid = tblprogram.programid ORDER BY lastname, firstname, department, program_desc";

	$count = row_count($sql);

	$output = '';

	if ($count > 0) {

		$output .= "<table>";

			$output .= "<tr>";

				$output .= "<th> Last Name </th>";
				$output .= "<th> First Name </th>";
				$output .= "<th> Sex </th>";
				$output .= "<th> Department </th>";
				$output .= "<th> Program </th>";
				$output .= "<th colspan='2'> Action </th>";

			$output .= "</tr>";

		$result = fetch_multiple_data($sql);

		foreach ($result as $key) {

			$output .= "<tr>";
			
				$output .= "<td class='lastname'>" . $key['lastname'] . "</td>";
				$output .= "<td>" . $key['firstname'] . "</td>";
				$output .= "<td>" . $key['sex'] . "</td>";
				$output .= "<td>" . $key['department'] . "</td>";
				$output .= "<td>" . $key['program_desc'] . "</td>";
				$output .= "<td><a class='upd' href=\"update.php?id={$key['employeeid']}\" data-id=\"{$key['employeeid']}\"> UPDATE </a>";
				$output .= "<td><a class='del' href=\"delete.php?id={$key['employeeid']}\" data-id=\"{$key['employeeid']}\"> DELETE </a>";
			$output .= "</tr>";

		}

		$output .= "</table>";

	} else {

		$output .= "<h3> No Records Found or Database is Empty! </h3>";

	}

	echo $output;

?>