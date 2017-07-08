<?php

class text_transform {
	public static function nice (string $text) {
		$text_fixed = str_replace("-", " ", $text);
		$text_fixed = ucwords(str_replace("_", " ", $text_fixed));
		$text_fixed = ucwords($text_fixed);
		return $text_fixed;
	}
	public static function un_nice (string $text, char $char) {
		$char = isSet($char) ? $char : "-";

		$text_fixed = strtolower(str_replace(" ", $char, $text));
		return $text_fixed;
	}
}

class json_ops {
	public static function get (string $url) {
		$file = fopen($url, "r") or die("Unable to open the JSON file at $url."
		. "Try again and make sure the file exists!");
		$json = fread($file, filesize($url));
		fclose($file);
		return json_ops::parse($json);
	}
	public static function parse (string $json) {
		$json_object = json_decode($json);

		return $json_object;
	}
	public static function create (string $url, string $json) {
		file_put_contents($url, json_encode($json));
	}
}

class data_ops {
	public static function get_publisher (string $url, string $publisher_list_url) {
		$publishers = json_ops::get($publisher_list_url);

		foreach ($publishers as $publisher) {
			if (stripos($url, $publisher[0])) {
				return $publisher[1];
			}
		}
	}
}

?>
