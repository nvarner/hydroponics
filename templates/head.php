<!doctype html>

<html>
	<head>
		<title><?php echo "Koi: " . $title; ?></title>
		<link rel="stylesheet" href="/hydroponics/styles/style.css" />
		<link rel="stylesheet" href="/hydroponics/styles/typography.css" />
		<link rel="stylesheet" href="/hydroponics/styles/levels.css" />
		<link rel="stylesheet" href="/hydroponics/styles/dropdown.css" />
		<link rel="stylesheet" href="/hydroponics/styles/header-levels.css" />
		<link rel="stylesheet" href="/hydroponics/styles/header.css" />
		<link rel="stylesheet" href="/hydroponics/styles/common-classes.css" />

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

		<script src="/hydroponics/jquery.js"></script>
		<script src="/hydroponics/jquery-ui.min.js"></script>

		<script src="/hydroponics/scripts/functions.js"></script>
		<script src="/hydroponics/dropdown.js"></script>
		<script src="/hydroponics/scripts/ink.js"></script>

		<?php

		if (isset($extra_head)) {
			echo $extra_head;
		}

		?>

		<?php
		require_once(__DIR__ . "/../functions.php");
		?>
	</head>
