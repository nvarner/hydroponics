<?php
require_once("../functions.php");

$json_file = get_json("../data/settings.json");
$json_update = $_POST;

foreach ($json_update as $key => $value) {
	$json_file[$key] = $value;
	echo $json_file[$key];
}
?>
