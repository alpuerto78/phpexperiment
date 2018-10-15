<?php require('../include/bootstrap.php'); ?>
<?php 

	if (isset($_GET['id'])) { //check if $_GET is set, if set assign value to a variable

		$employeeid = $_GET['id'];

	}

?>

<!-- IF $_GET IS SET, LOAD UPDATE FORM -->

<?php if (isset($employeeid)) { ?>

	<?php $sql = "SELECT * FROM tblemployees WHERE employeeid = :employeeid"; ?>

	<?php $result = fetch_single_data($sql, 'employeeid', $employeeid); ?>

	<form id="update_form" method="post" data-id="<?php echo $employeeid; ?>">
		
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
				<input type="button" value="CANCEL" name="cancel" class="cancel">
			</div>

		</fieldset>
		
	</form>

<!-- IF $_GET IS NOT SET, SHOW ADD FORM -->

<?php } else { ?>

	<form id="add_form">
					
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
				<select name="programid" id="programid" required disabled>
					
					<!-- DATA WILL BE LOADED WITH AJAX -->

				</select>
			</div>
			<div>
				<label for=""> &nbsp;</label>
				<input type="button" value="CREATE" name="create" id="create">
				<input type="button" value="CANCEL" name="cancel" class="cancel">
			</div>

		</fieldset>


	</form>

<?php } ?>

