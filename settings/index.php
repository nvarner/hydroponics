<?php
$title="Settings";
$extra_head="<script src='/hydroponics/scripts/settings.js'></script>";
include("../templates/head.php");
?>

<body>
	<?php include("../templates/header.php"); ?>
	<form>
		<table class="md-table">
			<thead>
				<tr>
					<td>Name</td>
					<td>Value<i class="material-icons right">mode_edit</i></td>
					<td>Units</td>
				</tr>
			</thead>
			<tbody>

				<?php

				$settings_object = json_ops::get("../data/settings.json");

				/***********************
				* Display table values *
				***********************/
				foreach (get_object_vars($settings_object) as $setting_name => $setting_value) {
					$unit = "units";

					preg_match_all(
						"/(length|width|height|distance|volume|weight|mass)/",
						strtolower($setting_name),
						$unit_possibilities
					);

					switch ($unit_possibilities[0][0]) {
						case "length":
						case "width":
						case "height":
						case "distance":
							$unit = "m";
							break;
						case "weight":
						case "mass":
							$unit = "kg";
							break;
						case "volume":
							$unit = "m^3";
							break;
						default:
							$unit = "units";
							break;
					}

					echo "<tr><td>";
						echo text_transform::nice($setting_name);
					echo "</td><td class='md-editable'>";
						echo $setting_value;
					echo "</td><td>";
						echo $unit;
					echo "</td></tr>";
				};
				?>
			</tbody>
		</table>

		<div id="save-container">
			<a class="md-button md-button-raised" id="save">Save</a>
			<a class="md-button md-button-raised" id="cancel">Cancel</a>
		</div>
	</form>
</body>

<?php include("../templates/foot.php"); ?>
<!-- fun lets do this-->
