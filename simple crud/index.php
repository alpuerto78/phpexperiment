<?php include('connection.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title> Simple CRUD Application </title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
<body>

	<div id="wrapper">
		
		<form action="add.php" method="post">
			
			<fieldset>
				<legend> Add Record </legend>
				<div>
					<label for="firstname"> First Name </label>
					<input type="text" name="firstname" id="firstname">
				</div>
				<div>
					<label for="lastname"> Last Name </label>
					<input type="text" name="lastname" id="lastname">
				</div>
				<div>
					<label for="department"> Department </label>
					<input type="text" name="department" id="department">
				</div>
				<div>
					<label for=""> &nbsp;</label>
					<input type="submit" value="CREATE">
				</div>

			</fieldset>
			
		</form>

		<hr>

		<?php

			$sql_string = "SELECT * FROM tblemployees";
			$stmt_prepare = $conn->prepare($sql_string);

			$stmt_prepare->execute();

			$count = $stmt_prepare->rowCount();

			if ($count > 0) {

				echo "<table>";
					echo "<tr>";
					echo "<td> Last Name </td>";
					echo "<td> First Name </td>";
					echo "<td> Department </td>";
				echo "</tr>";

				while ($result = $stmt_prepare->fetch(PDO::FETCH_ASSOC)) {

					echo "<tr>";
						echo "<td>" . $result['lastname'] . "</td>";
						echo "<td>" . $result['firstname'] . "</td>";
						echo "<td>" . $result['department'] . "</td>";
						echo "<td><a href='update.php?id={$result['employeeID']}'> UPDATE </a>";
						echo "<td><a href=\"delete.php?id={$result['employeeID']}\" onclick=\"return confirm('Are you Sure?')\"> DELETE </a>";
					echo "</tr>";

				}

				echo "</table>";

			} else {

				echo "No Records Found or Database is Empty!";

			}

		
		?>
		
	</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</html>