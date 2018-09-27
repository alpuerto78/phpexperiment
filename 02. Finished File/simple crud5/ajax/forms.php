<?php require('../include/bootstrap.php'); ?>

<?php $id = $_GET['id']; ?>

<?php if (isset($id)) { ?>

	<?php $sql = "SELECT * FROM tblemployees WHERE employeeid = :id"; ?>

	<?php $result = fetch_single_data($sql, $id); ?>

	<!-- IF $_GET IS SET, SHOW UPDATE FORM -->

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
				<input type="button" value="CANCEL" name="cancel" class="cancel">
			</div>

		</fieldset>
		
	</form>

<?php } else { ?>

	<!-- IF $_GET IS SET, SHOW ADD FORM -->

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