<?php

/* SETS OF FUNCTIONS FOR CREATING DATA, UPDATING DATA */

// Name of Table, Posted Data, [Mode], [Primary Key], [Primary Key Value]
function execute_query($table_name, &$post_data, $mode = 'create', $primary_key = null, $primary_key_value = null) { 

	global $conn;

	//Remove Last Item on $_POST (usually button)
	array_pop($post_data);

	//ASSEMBLE SQL String
	$sql = getSQL($table_name, $post_data, $mode, $primary_key);

	//Prepare SQL
	$stmt = $conn->prepare($sql);

	//Bind Parameters for Create, Update
	if ($mode == 'create' || $mode == 'update') {

		foreach ($post_data as $key => $value) {

			bind($stmt, $key, $value);

		}

	} 
	
	//BIND 'WHERE' PARAMETERS (Update or Delete)
	if ($mode == 'update' || $mode == 'delete') {

		bind($stmt, $primary_key, $primary_key_value);

	}

	//EXECUTE Query
	$stmt->execute();

}

function getDBFields($post_data) { //for create only

	$output = implode(',',array_keys($post_data));
	return $output;

}

function getTokens($post_data, $mode = 'create') {

	$new_array = [];

	switch($mode) {

		case 'create':

			foreach ($post_data as $key => $p) {

				array_push($new_array, ":" . $key);

			}

			$output = implode(',', $new_array);

		break;

		case 'update':

			foreach ($post_data as $key => $value) {

				array_push($new_array, $key . " = :" . $key);

			}

			$output = implode(',', $new_array);

		break;

	}

	return $output;

}

function bind($stmt, $param, $value) {

	return $stmt->bindParam(":" . $param, sanitizeInput($value), getDataType($value));

}

function getSQL($table_name, $post_data, $mode = 'create', $primary_key = null) {

	switch($mode) {

		case 'create':

			$sql = "INSERT INTO {$table_name} (" . getDBFields($post_data) . ") VALUES (" . getTokens($post_data) . ")";

		break;

		case 'update':

			//$sql = "UPDATE {$table_name} SET lastname = :lastname, firstname = :firstname, sex = :sex, departmentid = :departmentid ";
			//$sql .= "WHERE {$primary_key} = :id ";

			$sql = "UPDATE {$table_name} SET " . getTokens($post_data, 'update');
			$sql .= " WHERE {$primary_key} = :{$primary_key}";

		break;

		case 'delete':

			$sql = "DELETE FROM {$table_name} WHERE {$primary_key} = :{$primary_key}";

		break;

	} 

	return $sql;

}

function getDataType($value) {

	switch(true) {

		case is_int($value):

			$type = PDO::PARAM_INT;

		break;

		case is_bool($value):

			$type = PDO::PARAM_BOOL;

		break;

		case is_null($value):

			$type = PDO::PARAM_NULL;

		break;

		default:

			$type = PDO::PARAM_STR;

	}

	return $type;

}

function sanitizeInput($value) {

	$value = trim($value);
	$value = strip_tags($value);
	$value = stripslashes($value);

	return $value;

}

/* END SETS OF FUNCTIONS FOR CREATING DATA */

/* FUNCTIONS FOR RETURNING DATA */
function fetch_single_data($sql, $primary_key, $primary_key_value = null) {

	global $conn;

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(":" . $primary_key, $primary_key_value, PDO::PARAM_STR);

	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);

}

function fetch_multiple_data($sql) {

	global $conn;

	$stmt = $conn->prepare($sql);

	$stmt->execute();

	return $stmt->fetchAll();

}

function row_count($sql) {

	global $conn;

	$stmt = $conn->prepare($sql);

	$stmt->execute();

	return $stmt->rowCount();

}

/* END FUNCTIONS FOR RETURNING DATA */

/* BIND TO COMBOBOX FUNCTIONS */

function bindToComboBox($sql, $value, $description) { //simple combobox bind

	global $conn;

	$output = '';

	$stmt = $conn->prepare($sql);

	$stmt->execute();

	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

		$output .= "<option value={$result[$value]}>" . $result[$description] . "</option>";

	}

	return $output;

}

function bindToComboBoxUpdate($sql, $value, $description, $selected_identifier) { // binding used in fetching previous data

	global $conn;

	$output = '';

	$stmt = $conn->prepare($sql);

	$stmt->execute();

	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

		$output .= "<option value={$result[$value]}";

			if ($result[$value] === $selected_identifier) {

				$output .= " selected";

			}

		$output .= "> {$result[$description]} </option>";
		

	}

	return $output;

}

/* END BIND TO COMBOBOX FUNCTIONS */

?>