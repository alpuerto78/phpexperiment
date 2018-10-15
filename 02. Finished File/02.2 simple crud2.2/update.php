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

			$agentid = $_GET['agentid'];

			$sql =  "SELECT * FROM tblagents INNER JOIN tblaccount ON ";
			$sql .= " tblagents.accountid = tblaccount.accountid WHERE agentid = :agentid";

			$result = fetch_single_data($sql, 'agentid', $agentid);

			if (isset($_POST['update'])) {

				execute_query('tblagents', $_POST, 'update', 'agentid', $agentid);

				unset($_POST['create']);

				redirect_to('index.php');

			}

		?>

		<form action="<?php echo $_SERVER['PHP_SELF'] . "?agentid=" . $agentid; ?>" method="post">
			
			<fieldset>
				<legend> Update Record </legend>
				<div>
					<label for="lastname"> Last Name </label>
					<input type="text" name="lastname" id="lastname" required minlength="2" value="<?php echo $result['lastname']?>">
				</div>
				<div>
					<label for="firstname"> First Name </label>
					<input type="text" name="firstname" id="firstname" required minlength="2" value="<?php echo $result['firstname']?>">
				</div>
				<div>
					<label for="sex"> Sex </label>
					<input type="radio" name="sex" value="Male"  <?php echo $result['sex'] === 'Male' ? 'checked' : '';?>> Male
					<input type="radio" name="sex" value="Female" <?php echo $result['sex'] === 'Female' ? 'checked' : '';?>> Female
				</div>
					<div>
					<label for="sex"> Area </label>
					<input type="radio" name="area" value="North" required <?php echo $result['area'] === 'North' ? 'checked' : '';?>> North
					<input type="radio" name="area" value="South" required <?php echo $result['area'] === 'South' ? 'checked' : '';?>> South
					<input type="radio" name="area" value="East" required <?php echo $result['area'] === 'East' ? 'checked' : '';?>> East
					<input type="radio" name="area" value="West" required <?php echo $result['area'] === 'West' ? 'checked' : '';?>> West
				</div>
				<div>
					<label for="accountid"> Account </label>
					<select name="accountid" id="accounttid" required>
						
						<?php

							$sql = "SELECT * FROM tblaccount";

							echo bindToComboBoxUpdate($sql, 'accountid', 'account', $result['agentid']);

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