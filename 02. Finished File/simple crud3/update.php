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

			$id = $_GET['id'];

			$sql = "SELECT * FROM tblemployees WHERE employeeid = :id";

			$result = fetch_single_data($sql, $id);

			if (isset($_POST['update'])) {

				execute_query('tblemployees', $_POST, 'update', 'employeeid', $id);

				unset($_POST['create']);

				redirect_to('index.php');

			}

		?>

		<form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>" method="post">
			
			<fieldset>
				<legend> Update Record </legend>
				<div>
					<label for="lastname"> Last Name </label>
					<input type="text" name="lastname" id="lastname" required value="<?php echo $result['lastname']?>">
				</div>
				<div>
					<label for="firstname"> First Name </label>
					<input type="text" name="firstname" id="firstname" required value="<?php echo $result['firstname']?>">
				</div>
				<div>
					<label for="sex"> Sex </label>
					<input type="radio" name="sex" value="Male"  <?php echo $result['sex'] === 'Male' ? 'checked' : '';?>> Male
					<input type="radio" name="sex" value="Female" <?php echo $result['sex'] === 'Female' ? 'checked' : '';?>> Female
				</div>
				<div>
					<label for="department"> Department </label>
					<select name="departmentid" id="departmentid" required>
						
						<?php

							$sql = "SELECT * FROM tbldepartment";

							echo bindToComboBoxUpdate($sql, 'departmentid', 'department', $result['departmentid']);

						?>

					</select>
				</div>
				<div>
					<label for=""> &nbsp;</label>
					<input type="submit" value="UPDATE" name="update">
				</div>

			</fieldset>
			
		</form>
		
	</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</html>