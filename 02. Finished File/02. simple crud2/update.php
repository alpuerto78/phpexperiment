<?php 

	include('connection.php');
	include('include/functions.php');

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

			$sql_retrieve = "SELECT * FROM tblemployees INNER JOIN tbldepartment ON ";
			$sql_retrieve .= "tblemployees.departmentid = tbldepartment.departmentid WHERE employeeid = :id";

			$stmt_retrieve = $conn->prepare($sql_retrieve);

			$stmt_retrieve->bindParam(":id", $id, PDO::PARAM_STR);

			$stmt_retrieve->execute();

			$result_retrieve = $stmt_retrieve->fetch(PDO::FETCH_ASSOC);

			$departmentid = $result_retrieve['departmentid'];


			if (isset($_POST['update'])) {

				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$sex = $_POST['sex'];
				$department = $_POST['department'];

				$sql_string = "UPDATE tblemployees SET lastname = :lastname, firstname = :firstname, sex = :sex, departmentid = :departmentid ";
				$sql_string .= "WHERE employeeid = :id";

				$stmt_prepare = $conn->prepare($sql_string);

				$stmt_prepare->bindParam(":lastname", $lastname, PDO::PARAM_STR);
				$stmt_prepare->bindParam(":firstname", $firstname, PDO::PARAM_STR);
				$stmt_prepare->bindParam(":sex", $sex, PDO::PARAM_STR);
				$stmt_prepare->bindParam(":departmentid", $department, PDO::PARAM_INT);
				$stmt_prepare->bindParam(":id", $id, PDO::PARAM_INT);

				$stmt_prepare->execute();

				unset($_POST['update']);

				header("Location: index.php");

			}

		?>

		<form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>" method="post">
			
			<fieldset>
				<legend> Update Record </legend>
				<div>
					<label for="firstname"> First Name </label>
					<input type="text" name="firstname" id="firstname" required value="<?php echo $result_retrieve['firstname']?>">
				</div>
				<div>
					<label for="lastname"> Last Name </label>
					<input type="text" name="lastname" id="lastname" required value="<?php echo $result_retrieve['lastname']?>">
				</div>
				<div>
					<label for="sex"> Sex </label>
					<input type="radio" name="sex" value="Male"  <?php echo $result_retrieve['sex'] === 'Male' ? 'checked' : '';?>> Male
					<input type="radio" name="sex" value="Female" <?php echo $result_retrieve['sex'] === 'Female' ? 'checked' : '';?>> Female
				</div>
				<div>
					<label for="department"> Department </label>
					<select name="department" id="department" required>
						
						<?php

							$sql_string = "SELECT * FROM tbldepartment";

							echo bindToComboBoxUpdate($sql_string, 'departmentid', 'department', $departmentid);

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