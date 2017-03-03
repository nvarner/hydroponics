<?php

function nice_text ($text) {
	$text_fixed = ucwords(str_replace("-", " ", $text));
	$text_fixed = ucwords(str_replace("_", " ", $text_fixed));
	return $text_fixed;
}

function get_json ($url) {
	$file = fopen($url, "r") or die("Unable to open the JSON file at $url."
													  . "Try again and make sure the file exists!");
	$json = fread($file, filesize($url));
	fclose($file);				
	$json_object = json_decode($json);
	
	return $json_object;
}

function get_publisher ($url, $publisher_list_url) {
	$publishers = get_json($publisher_list_url);
	
	foreach ($publishers as $publisher) {
		if (stripos($url, $publisher[0])) {
			return $publisher[1];
		}
	}
}

?>