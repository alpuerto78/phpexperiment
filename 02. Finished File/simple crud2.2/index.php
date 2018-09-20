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

				execute_query('tblagents', $_POST);

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
					<label for="sex"> Area </label>
					<input type="radio" name="area" value="North" required checked> North
					<input type="radio" name="area" value="South" required> South
					<input type="radio" name="area" value="East" required> East
					<input type="radio" name="area" value="West" required> West
				</div>
				<div>
					<label for="accountid"> Account </label>
					<select name="accountid" id="accountid" required>
						
						<?php

							$sql = "SELECT * FROM tblaccount ORDER BY account";
							echo bindToComboBox($sql, 'accountid', 'account');

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

			$sql = "SELECT * FROM tblagents INNER JOIN tblaccount ON ";
			$sql .= "tblagents.accountid = tblaccount.accountid ORDER BY account";

			$count = row_count($sql);

			if ($count > 0) {

				echo "<table>";
					echo "<tr>";
					echo "<th> Last Name </th>";
					echo "<th> First Name </th>";
					echo "<th> Sex </th>";
					echo "<th> Area </th>";
					echo "<th> Account </th>";
					echo "<th colspan='2'> Action </th>";
				echo "</tr>";

				$result = fetch_multiple_data($sql);

				foreach ($result as $key) {

					echo "<tr>";
					
						echo "<td>" . $key['lastname'] . "</td>";
						echo "<td>" . $key['firstname'] . "</td>";
						echo "<td>" . $key['sex'] . "</td>";
						echo "<td>" . $key['area'] . "</td>";
						echo "<td>" . $key['account'] . "</td>";
						echo "<td><a href='update.php?agentid={$key['agentid']}'> UPDATE </a>";
						echo "<td><a href=\"delete.php?agentid={$key['agentid']}\" onclick=\"return confirm('Are you Sure?')\"> DELETE </a>";
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