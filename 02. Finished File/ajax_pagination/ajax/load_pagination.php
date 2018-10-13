<?php

	require('../include/bootstrap.php');

	$sql = "SELECT * FROM tblemployees INNER JOIN tbldepartment ON tblemployees.departmentid = tbldepartment.departmentid ";
	$sql .= "INNER JOIN tblprogram ON tblemployees.programid = tblprogram.programid ORDER BY lastname, firstname, department, program_desc ";

	$count = row_count($sql);

	//pagination values

	$limit = 3; //display this number of records per page
	$total_records = $count; //count the total records returned
	$total_pages = ceil($total_records / $limit); //math for total pages

?>

<ul class="pagination" id="pagination">
	
	<?php 

		if (!empty($total_pages)) {

			for ($i = 1; $i <= $total_pages; $i++) {

				if ($i == 1) {

					echo "<li class='active'><a href='#' data-page='" . $i . "'>" . $i . "</a></li>";

				} else {

					echo "<li><a href='#' data-page='" . $i . "'>" . $i . "</a></li>";

				}

			}

		}

	?>

</ul>