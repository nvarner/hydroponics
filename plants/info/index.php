<?php

$plant_type;

if (isset($_GET["plant-type"])) {
	$plant_type = $_GET["plant-type"];
} else {
	header("Location: /hydroponics/plants");
}

$title = "Plant Info";
include("../../templates/head.php");

$plant_type_nice = nice_text($plant_type);

$plant_json = get_json("../$plant_type.json");

?>

<body>
	<?php include("../../templates/header.php"); ?>
	<h1><?php echo $plant_type_nice ?></h1>

	<h2>Description</h2>
	<p><?php echo $plant_json->{"description"} ?></p>

	<h2>Symptoms</h2>
	<ul class="nice level-2">
		<?php

		foreach ($plant_json->{"symptoms-list"} as $symptom_key => $symptom_value) {
			echo "<li><span class='bold'>" . nice_text($symptom_key) . "</span>- $symptom_value</li>";
		}

		?>
	</ul>

	<h2>Issues</h2>
	<ul class="nice level-2">
		<?php

		foreach ($plant_json->{"issues-list"} as $issue) {
			$issue_name = nice_text($issue[0]);
			$issue_symptoms = $issue[1];
			$issue_resources = $issue[2];

			echo "<h3>$issue_name</h3>";
			echo "<ul class='nice level-2'>";
			foreach ($issue_symptoms as $symptom) {
				echo "<li>" . nice_text($symptom) . "</li>";
			}
			echo "</ul>";
		}

		?>
	</ul>

</body>

<?php include("../../templates/foot.php"); ?>
