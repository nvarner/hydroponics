<?php
set_include_path("/var/www/html/hydroponics");
include_once("helper.php");
?>

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
		<link rel="stylesheet" href="/hydroponics/styles/material-design.css" />
		<link rel="stylesheet" href="/hydroponics/node_modules/material-components-web/dist/material-components-web.css" />

		<script src="/hydroponics/jquery.js"></script>
		<script src="/hydroponics/jquery-ui.min.js"></script>
		<script src="/hydroponics/node_modules/material-components-web/dist/material-components-web.js"></script>

		<script src="/hydroponics/scripts/functions.js"></script>
		<script src="/hydroponics/dropdown.js"></script>
		<script src="/hydroponics/scripts/ink.js"></script>
		<script src="/hydroponics/scripts/material-design.js"></script>
		<?php if (isset($extra_head)) {echo $extra_head;} ?>
	</head>
