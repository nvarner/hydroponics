<?php
// Get libraries
require_once("../functions.php");

// Get the JSON file and POST
$json_file = get_json("../data/settings.json");
$json_update = $_POST;

// Loop through POST and change everything to a float so math can be used on it,
// then add it to the JSON
foreach ($json_update as $key => $value) {
	if (is_numeric($value)) {
		$json_file->$key = (float) $value;
		echo $value . " is a number\n";
	} else {
		echo $value . " is not a number\n";
	}
	// If the value is not numeric, discard it just to be safe
}

// Put the new JSON back into the file so that it can be read later
set_json("../data/settings.json", $json_file);
?>
