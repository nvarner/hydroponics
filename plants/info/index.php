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
	<p><?php echo $plant_json->{"description"} ?></p>

	<div class="card level-2 full-cell expand-panel">
		<div class="expand-panel-top">
			<p class="expand-panel-title">Symptoms</p>
			<p class="expand-panel-description">The name and description of all
				symptoms this plant may experience.</p>
		</div>
		<div class="expand-panel-content">
			<table class="full-size">
				<thead>
					<tr>
						<td>Name</td>
						<td>Description</td>
					</tr>
				</thead>
				<tbody>
					<?php

					foreach ($plant_json->{"symptoms-list"} as$symptom_key => $symptom_value) {
						echo "<tr>";
						echo "<td>" . nice_text($symptom_key) . "</td><td>$symptom_value</td>";
						echo "</tr>";
					}

					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="card level-2 full-cell expand-panel">
		<div class="expand-panel-top">
			<p class="expand-panel-title">Issues</p>
			<p class="expand-panel-description">All of the issues that a plant may experience.</p>
		</div>
		<div class="expand-panel-content">
			<ul class="list">
				<?php

				foreach ($plant_json->{"issues-list"} as $issue) {
					$issue_unnice = $issue[0];
					$issue_name = nice_text($issue[0]);
					$issue_symptoms = $issue[1];
					$issue_resources = $issue[2];

					echo "<li>";
					echo "<div class='card full-cell expand-panel'>";

						echo "<div class='expand-panel-top'>";
							echo "<p class='expand-panel-title'>$issue_name</p>";
							echo "<p class='expand-panel-description'></p>";
						echo "</div>";

						echo "<div class='expand-panel-content'>";
						echo "<ul>";
						foreach ($issue_symptoms as $symptom) {
							echo "<li>" . nice_text($symptom) . "</li>";
						}
						echo "</ul>";
						echo "</div>";

					echo "</div>";
					echo "</li>";
				}

				?>
			</ul>
		</div>
	</div>
</body>

<?php include("../../templates/foot.php"); ?>
