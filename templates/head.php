<!doctype html>

<html>
	<head>
		<title><?php echo "Koi: " . $title; ?></title>
		<link rel="stylesheet" href="/hydroponics/style.css" />
		
		<?php
		
		if (isset($extra_head)) {
			echo $extra_head;
		}
		
		?>
		
		<?php
		require_once(__DIR__ . "/../functions.php");
		?>
	</head>