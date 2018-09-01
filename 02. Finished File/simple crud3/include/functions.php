<?php

/* SETS OF FUNCTIONS FOR CREATING DATA */

function createData($table_name, $post_data) {

	global $conn;

	$based = 0;

	array_pop($post_data);

	$sql = "INSERT INTO {$table_name} (" . getDBFields($post_data) . ") VALUES (" . getTokens($post_data) . ")";

	$stmt = $conn->prepare($sql);

	$bind_params = explode(',',bindTokens($post_data));

	foreach ($bind_params as $p => $value) {

		if (true) {

			$value = str_replace('\,','',$value);

			echo "$value" . "<br>";

		}

		//$stmt->bindValue($p = $p + 1, str_replace(',','',$value), PDO::PARAM_STR);

	}

	// $stmt->bindValue(1, 'Maaliw', PDO::PARAM_STR);
	// $stmt->bindValue(2, 'Renato III', PDO::PARAM_STR);
	// $stmt->bindValue(3, 'Male', PDO::PARAM_STR);
	// $stmt->bindValue(4, '2', PDO::PARAM_INT);

	//$stmt->execute();

}

function getDBFields($post_data) {

	$output = implode(',',array_keys($post_data));

	return $output;

}

function getTokens($post_data) {

	$new_array = [];

	foreach ($post_data as $p) {

		array_push($new_array, "?");

	}

	$output = implode(',', $new_array);

	return $output;

}

function bindTokens($post_data) {

	$new_array = [];

	foreach ($post_data as $post => $value) {

		array_push($new_array, $value); 

	}

	$imploded = implode(',', $new_array);

	return $imploded;


}

function sanitizedInput($value) {

	$value = trim($value);
	$value = strip_tags($value);
	$value = stripslashes($value);
	$value = str_replace(',','',$value);

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