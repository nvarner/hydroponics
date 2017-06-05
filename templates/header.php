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

<div id="md-scrim" class="md-scrim-hidden md-z-index-zero"></div>
<header class="md-toolbar">
	<i id="md-drawer-button" class="material-icons">menu</i>
	<h1 class="mdc-typography--headline">Koi Hydroponics System</h1>
</header>
<div id="md-drawer" class="md-drawer-hidden">
	<header id="md-drawer-header">
		<h1 class="md-title">Koi Hydroponics System</h1>
	</header>
	<nav id="md-drawer-nav">
		<ul>
			<li><a href="/hydroponics">Home</a></li>
			<li><a href="/hydroponics/overview">Overview</a></li>
			<li><a href="/hydroponics/settings">Settings</a></li>
			<li><a href="/hydroponics/control">Control</a></li>
			<li><a href="/hydroponics/plants">Plants</a></li>
		</ul>
	</nav>
</div>
