<?php $title="Overview"; include("../templates/head.php"); ?>

<body>
	<?php include("../templates/header.php"); ?>

	<table class="md-table">
		<thead>
			<tr>
				<td>Name</td>
				<td>Value</td>
				<td>Units</td>
			</tr>
		</thead>
		<tbody>

			<?php

			require_once("../eos/src/Stack.php");
			require_once("../eos/src/Math.php");
			require_once("../eos/src/AdvancedFunctions.php");
			require_once("../eos/src/Parser.php");
			use jlawrence\eos\Parser;

			$display_data = get_json("../data/overview.json");
			$external_variable_names = get_object_vars($display_data->{"external-variables"});

			foreach ($external_variable_names as $variable_name => $variable_value) {
				$dot_location = strpos($variable_value, ".");

				// Check for the period to indicate correct notation
				if (strpos($dot_location) === true) {
					$variable_location = substr($variable_value, 0, strpos($variable_value, "."));
					$variable_location_object = get_json("../data/$variable_location.json");

					$variable_value = $variable_location_object->{substr($variable_value, strpos($variable_value, ".") + 1, strlen($variable_value))};
				} else {
					die("External variables need to be in the form of location.name");
				}

				$variable_name_clean = str_replace("_", "", $variable_name);

				$variables = array_merge($variables, array($variable_name_clean => $variable_value));
			};

			/**********************
			* Set local variables *
			**********************/
			foreach (get_object_vars($display_data->{"local-variables"}) as $variable_name => $variable_calculations) {
				$dependant_variables = array();

				foreach ($variable_calculations[1] as $dependant_variable) {
					$dependant_variable_clean = str_replace("_", "", $dependant_variable);
					$dependant_variables = array_merge($dependant_variables, array($dependant_variable_clean => $variables[$dependant_variable_clean]));
				}

				$variable_calc_clean = str_replace("_", "", $variable_calculations[0]);

				$variable_value = Parser::solveIF($variable_calc_clean, $dependant_variables);

				$variable_name_clean = str_replace("_", "", $variable_name);
				$variables = array_merge($variables, array($variable_name_clean => $variable_value));
			};

			/***********************
			* Display table values *
			***********************/
			foreach ($display_data->{"table-values"} as $value) {
				$value_clean = str_replace("_", "", $value);

				$unit = "units";
				preg_match_all(
					"/(length|width|height|distance|volume|weight|mass)/",
					strtolower($value),
					$unit_possibilities
				);

				if (sizeof($unit_possibilities[0]) == 0) {
					$unit = "units";
				} else {
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
				}

				echo "<tr><td>";
				echo nice_text($value);
				echo "</td><td>";
				echo $variables[$value_clean];
				echo "</td><td>";
				echo $unit;
				echo "</td></tr>";
			};
			?>
		</tbody>
	</table>
	<?php
	include("../templates/foot.php");
	?>
</body>
