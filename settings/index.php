<?php $title="Settings"; $extra_head="<script src='/hydroponics/scripts/settings.js'></script>"; include("../templates/head.php"); ?>

<body>
	<?php include("../templates/header.php"); ?>
	<form>
		<table class="level-2">
			<thead>
				<tr>
					<td>Name</td>
					<td>Value<i class="material-icons right">mode_edit</i></td>
					<td>Units</td>
				</tr>
			</thead>
			<tbody>

				<?php

				$settings_object = get_json("../data/settings.json");

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
					echo nice_text($setting_name);
					echo "</td><td contenteditable='true'>";
					echo $setting_value;
					echo "</td><td>";
					echo $unit;
					echo "</td></tr>";
				};
				?>
			</tbody>
		</table>

		<div id="save-container">
			<a class="mdc-button mdc-button--raised mdc-button--accent
			mdc-ripple-upgraded mdc-ripple-upgraded--background-active-fill
			mdc-ripple-upgraded--foreground-activation" id="save">Save</a>
			<a class="mdc-button mdc-button--raised mdc-button--accent
			mdc-ripple-upgraded mdc-ripple-upgraded--background-active-fill
			mdc-ripple-upgraded--foreground-activation" id="save">Cancel</a>
		</div>
	</form>
</body>

<?php include("../templates/foot.php"); ?>
<!-- fun lets do this-->
