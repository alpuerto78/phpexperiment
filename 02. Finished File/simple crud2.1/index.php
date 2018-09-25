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

			if (isset($_POST['create'])) {

				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$sex = $_POST['sex'];
				$status = $_POST['status'];
				$department = $_POST['department'];

				$sql_string = "INSERT INTO tblemployees (lastname, firstname, sex, status, departmentid) ";
				$sql_string .= "VALUES (:lastname, :firstname, :sex, :status, :department)";

				$stmt_prepare = $conn->prepare($sql_string);

				$stmt_prepare->bindParam(":lastname", $lastname, PDO::PARAM_STR);
				$stmt_prepare->bindParam(":firstname", $firstname, PDO::PARAM_STR);
				$stmt_prepare->bindParam(":sex", $sex, PDO::PARAM_STR);
				$stmt_prepare->bindParam(":status", $status, PDO::PARAM_STR);
				$stmt_prepare->bindParam(":department", $department, PDO::PARAM_STR);

				$stmt_prepare->execute();

				unset($_POST['create']);

			}

		?>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			
			<fieldset>
				<legend> Add Record </legend>
				<div>
					<label for="firstname"> First Name </label>
					<input type="text" name="firstname" id="firstname" required minlength="2">
				</div>
				<div>
					<label for="lastname"> Last Name </label>
					<input type="text" name="lastname" id="lastname" required minlength="2">
				</div>
				<div>
					<label for="sex"> Sex </label>
					<input type="radio" name="sex" value="Male" required> Male
					<input type="radio" name="sex" value="Female" required> Female
				</div>
				<div>
					<label for="status"> Status </label>
					<input type="radio" name="status" value="Single" required> Single
					<input type="radio" name="status" value="Married" required> Married
					<input type="radio" name="status" value="Separated" required> Single
					<input type="radio" name="status" value="Widow/Widower" required> Widow/Widower
				</div>
				<div>
					<label for="department"> Department </label>
					<select name="department" id="department" required>
						
						<?php

							$sql_string = "SELECT * FROM tbldepartment ORDER BY department";

							echo bindToComboBox($sql_string, 'departmentid', 'department');

						?>

					</select>
				</div>
				<div>
					<label for=""> &nbsp;</label>
					<input type="submit" value="CREATE" name="create">
				</div>

			</fieldset>
			
		</form>

		<hr>

		<?php

			$sql_string = "SELECT * FROM tblemployees INNER JOIN tbldepartment ON ";
			$sql_string .= "tblemployees.departmentid = tbldepartment.departmentid ORDER BY lastname";

			$stmt_prepare = $conn->prepare($sql_string);

			$stmt_prepare->execute();

			$count = $stmt_prepare->rowCount();

			if ($count > 0) {

				echo "<table>";
					echo "<tr>";
					echo "<th> Last Name </th>";
					echo "<th> First Name </th>";
					echo "<th> Sex </th>";
					echo "<th> Status </th>";
					echo "<th> Department </th>";
					echo "<th colspan='2'> Action </th>";
				echo "</tr>";

				while ($result = $stmt_prepare->fetch(PDO::FETCH_ASSOC)) {

					echo "<tr>";
						echo "<td>" . $result['lastname'] . "</td>";
						echo "<td>" . $result['firstname'] . "</td>";
						echo "<td>" . $result['sex'] . "</td>";
						echo "<td>" . $result['status'] . "</td>";
						echo "<td>" . $result['department'] . "</td>";
						echo "<td><a href='update.php?id={$result['employeeid']}'> UPDATE </a>";
						echo "<td><a href=\"delete.php?id={$result['employeeid']}\" onclick=\"return confirm('Are you Sure?')\"> DELETE </a>";
					echo "</tr>";

				}

				echo "</table>";

			} else {

				echo "<h3> No Records Found or Database is Empty! </h3>";

			}

		
		?>
		
	</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</html>