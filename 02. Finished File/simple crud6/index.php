<?php 

	require('include/bootstrap.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Simple CRUD Application </title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
<body>

	<div id="wrapper">

		<div id="form-container">

			<form id="add_form" method="post">
				
				<fieldset>
					<legend> Add Record </legend>
					<div>
						<label for="lastname"> Last Name </label>
						<input type="text" name="lastname" id="lastname" required minlength="2" value="De la Cruz">
					</div>
					<div>
						<label for="firstname"> First Name </label>
						<input type="text" name="firstname" id="firstname" required minlength="2" value="Juan">
					</div>
					<div>
						<label for="sex"> Sex </label>
						<input type="radio" name="sex" value="Male" required checked> Male
						<input type="radio" name="sex" value="Female" required> Female
					</div>
					<div>
						<label for="departmentid"> Department </label>
						<select name="departmentid" id="departmentid" required>

							<option disabled selected value=''> -- SELECT DEPARTMENT -- </option>
							
							<?php

								$sql = "SELECT * FROM tbldepartment ORDER BY department";
								echo bindToComboBox($sql, 'departmentid', 'department');

							?>

						</select>
					</div>
					<div>
						<label for="programid"> Program </label>
						<select name="programid" id="programid" required disabled>
							
							<!-- DATA WILL BE LOADED WITH AJAX -->

						</select>
					</div>
					<div>
						<label for=""> &nbsp;</label>
						<input type="button" value="CREATE" name="create" id="create">
					</div>

				</fieldset>
				
			</form>

		</div>

		<hr>

		<div id="employee-table">
			
			<!-- DATA WILL BE LOADED WITH AJAX -->

		</div>

		
	</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</html>