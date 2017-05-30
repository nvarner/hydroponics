<?php

$title = "Home";
include("templates/head.php");

?>

<body>
	<?php include("templates/header.php"); ?>
	<h1 class="mdc-typography--headline mdc-typography--adjust-margin">Koi Hydroponics System</h1>
	<div class="photoalbum">
		<div class="mdc-card">
			<img class="mdc-card__media" src="" alt="tomato" />
			<section class="mdc-card__primary">
				<h1 class="mdc-card__title mdc-card__title--large">Tomato</h1>
				<h2 class="mdc-card__subtitle"></h2>
			</section>
			<section class="mdc-card__actions">
				<button class="mdc-button mdc-button--compact mdc-card__action">View</button>
				<button class="mdc-button mdc-button--compact mdc-card__action">Delete</button>

			</section>
		</div>
	</div>
</body>
<?php include("templates/foot.php"); ?>
