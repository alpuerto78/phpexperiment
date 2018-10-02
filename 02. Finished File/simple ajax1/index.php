<?php 

	require('include/bootstrap.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Simple AJAX </title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
<body>

	<div id="wrapper">
	
		<form>
						
			<fieldset>
				
				<div>
					<label for="manufacturerid"> Department </label>
					<select name="manufacturerid" id="manufacturerid" required>

						<option disabled selected value=''> -- SELECT MANUFACTURER -- </option>
						
						<?php

							$sql = "SELECT * FROM tblmanufacturer ORDER BY manufacturer";
							echo bindToComboBox($sql, 'manufacturerid', 'manufacturer');

						?>

					</select>
				</div>
				<div>
					<label for="modelid"> Program </label>
					<select name="modelid" id="modelid" required>
						
						<!-- DATA WILL BE LOADED WITH AJAX -->

					</select>
				</div>

			</fieldset>


		</form>

	</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</html>