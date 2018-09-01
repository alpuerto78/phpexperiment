<?php

/* SETS OF FUNCTIONS FOR CREATING DATA */

function query($table_name, &$post_data) { //Name of Table, Posted Data

	array_pop($post_data);

	$sql = "INSERT INTO {$table_name} (" . getDBFields($post_data) . ") VALUES (" . getTokens($post_data) . ")";

	return $sql;

}

function getDBFields($post_data) {

	$output = implode(',',array_keys($post_data));

	return $output;

}

function getTokens($post_data) {

	$new_array = [];

	foreach ($post_data as $key => $p) {

		//array_push($new_array, "?");
		array_push($new_array, ":" . $key);

	}

	$output = implode(',', $new_array);

	return $output;

}

function bind($stmt, $param, $value, $type = null) {

	if (is_null($type)) {

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

	}

	return $stmt->bindParam(":" . $param, sanitizedInput($value), $type);

}

function sanitizedInput($value) {

	$value = trim($value);
	$value = strip_tags($value);
	$value = stripslashes($value);

	return $value;

}

/* END SETS OF FUNCTIONS FOR CREATING DATA */



function bindToComboBox($sql_string, $value, $description) {

	global $conn;

	$output = '';

	$stmt_prepare = $conn->prepare($sql_string);

	$stmt_prepare->execute();

	while ($result = $stmt_prepare->fetch(PDO::FETCH_ASSOC)) {

		$output .= "<option value={$result[$value]}>" . $result[$description] . "</option>";

	}

	return $output;

}

function bindToComboBoxUpdate($sql_string, $value, $description, $selected_identifier) {

	global $conn;

	$output = '';

	$stmt = $conn->prepare($sql_string);

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