<?php

$title = "Home";
include("templates/head.php");

?>

<body>
	<?php include("templates/header.php"); ?>
	<h1>Koi Hydroponics System</h1>
	<p>Congrats! You've sucessfully set up your Koi hydroponics web console. It
		should all be downhill from here. Anyway, you need to learn to use
		this thing.</p>
	<h2>Tutorial</h2>
	<div class="tutorial">
		<p>This tutorial will give you an overview of everything you can do and how to do it.</p>
		<ol class="nice">
			<li>The black "Koi" box at the top left is a link to get you back to this page.</li>
			<li>The links to the right of that box bring you to different sections.</li>
			<ol>
				<li>Overview lets you see what's happening inside your system right
					now, like seeing through cameras or monitoring water level.</li>
				<li>Settings lets you change things about your system, like the
					best water level for your plants to be at or the type of system
					you're using.</li>
				<li>Control lets you manualy control the functions of your system
					instead of the computer, like telling lights to turn on or to
					start cleaning the water.</li>
				<li>Plants lets you learn about plants that you are growing or
					might grow and also lets you diagnose problems with your
					plants.</li>
			</ol>
		</ol>
	</div>
</body>
<?php include("templates/foot.php"); ?>
