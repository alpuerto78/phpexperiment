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

				$sql = query('tblemployees', $_POST); 

				$stmt = $conn->prepare($sql);

				foreach ($_POST as $key => $value) {

					bind($stmt, $key, $value);

				}
				
				$stmt->execute();

				unset($_POST['create']);

			}

		?>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			
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
					echo "<th> Department </th>";
					echo "<th colspan='2'> Action </th>";
				echo "</tr>";

				while ($result = $stmt_prepare->fetch(PDO::FETCH_ASSOC)) {

					echo "<tr>";
						echo "<td>" . $result['lastname'] . "</td>";
						echo "<td>" . $result['firstname'] . "</td>";
						echo "<td>" . $result['sex'] . "</td>";
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