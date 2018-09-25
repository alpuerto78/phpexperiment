<?php

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

function insertData($sql, $table_name, $params) {

	global $conn;

	$stmt = $conn->prepare($sql);


}