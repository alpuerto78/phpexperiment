<?php 

	require('include/bootstrap.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM tblemployees WHERE employeeid = :id";

	$result = fetch_single_data($sql, $id);

?>

	<form id="update_form" method="post" data-id="<?php echo $id; ?>">
		
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
				<label for="programid"> Program </label>
				<select name="programid" id="programid" required>
					
					<?php

						$sql = "SELECT * FROM tblprogram WHERE departmentid = " . $result['departmentid'];

						echo bindToComboBoxUpdate($sql, 'programid', 'program_desc', $result['programid']);

					?>

				</select>
			</div>
			<div>
				<label for=""> &nbsp;</label>
				<input type="button" value="UPDATE" name="update" id="update">
			</div>

		</fieldset>
		
	</form>