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

		<?php

			if (isset($_POST['create'])) {

				unset($_POST['create']);

				execute_query('tblemployees', $_POST);

			}

		?>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="add-form">
			
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
					<select name="programid" id="programid" required>
						
						<!-- DATA WILL BE LOADED WITH AJAX -->

					</select>
				</div>
				<div>
					<label for=""> &nbsp;</label>
					<input type="submit" value="CREATE" name="create">
				</div>

			</fieldset>
			
		</form>

		<hr>

		<form id="live-search" class="mt-1">
		
			<div>
				<label for="field"> Search By: </label>
				<select name="field" id="field">
					<option value="all"> ALL Fields </option>
					<option value="lastname"> Last Name </option>
					<option value="firstname"> First Name </option>
					<option value="sex"> Sex </option>
					<option value="department"> Department </option>
					<option value="program_desc"> Program </option>
				</select>
			</div>
			<div>
				<label for="search"> Search </label>
				<input type="text" name="search" id="search" placeholder="Enter Search String">
			</div>

		</form>

		<div id="employee-table">
			
			<!-- DATA WILL BE LOADED IN AJAX -->

		</div>

		<div id="pagination-container">
			
			<!-- DATA WILL BE LOADED IN AJAX -->

		</div>

		<div id="overlay">

			<!-- DATA WILL BE LOADED IN AJAX -->

		</div>

	</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</html>