<?php
function isBadState() {
	return false;
}

function isAlertState() {
	return false;
}

$status = "Good";
$status_unnice = "good";

if (isBadState()) {
	$status = "Bad";
	$status_unnice = "bad";
} else if (isAlertState()) {
	$status = "Alert";
	$status_unnice = "alert";
}
?>

<header id="main-header" class="bar">
	<a href="/hydroponics"><h1 class="header-title">Koi</h1></a>
	<navigation>
		<ul id="navigation" class="header-content">
			<li><a href="/hydroponics/overview/" class="button">OVERVIEW</a></li>
			<li><a href="/hydroponics/settings/" class="button">SETTINGS</a></li>
			<li><a href="/hydroponics/control/" class="button">CONTROL</a></li>
			<li><a href="/hydroponics/plants/" class="button">PLANTS</a></li>
		</ul>
	</navigation>
	<div id="status" class="<?php echo "$status_unnice" ?>">Status: <span><?php echo "$status" ?></span></div>
</header>
<div id="placeholder"></div>
