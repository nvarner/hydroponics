<?php $title="Overview"; include("../templates/head.php"); ?>

<body>
	<?php include("../templates/header.php"); ?>
	
	<table>
		<thead>
			<tr>
				<td>Name</td>
				<td>Value</td>
			</tr>
		</thead>
		<tbody>
			
			<?php
			
			require_once("../functions.php");
			require_once("../eos/src/Stack.php");
			require_once("../eos/src/Math.php");
			require_once("../eos/src/AdvancedFunctions.php");
			require_once("../eos/src/Parser.php");
			use jlawrence\eos\Parser;
			
			function get_value($variable, $overview_object, $variable_map) {
				$variable_value = 0;
				
				if (strpos($variable, ".")) {
					$filename = substr($variable, 0, strpos($variable, "."));
					$object = get_json("../data/$filename.json");

					$variable_value = $object->{substr($variable, strpos($variable, ".") + 1, strlen($variable))};
				} else {
					$variable_value = $variable_map[$overview_object->{$variable}[0]];
				}
				
				return $variable_value;
			}
			
			$overview_object = get_json("../data/overview.json");
			
			/*************************
			* Get external variables *
			*************************/
			$variables = array();
			
			foreach (get_object_vars($overview_object->{"external-variables"}) as $variable_name => $variable_location) {				
				if (strpos($variable_location, ".")) {
					$filename = substr($variable_location, 0, strpos($variable_location, "."));
					$object = get_json("../data/$filename.json");

					$variable_value = $object->{substr($variable_location, strpos($variable_location, ".") + 1, strlen($variable_location))};
				} else {
					die("External variables need to be in the form of location.name!");
				}
				
				$variable_name_clean = str_replace("_", "", $variable_name);
				
				$variables = array_merge($variables, array($variable_name_clean => $variable_value));
			};
			
			/**********************
			* Set local variables *
			**********************/
			foreach (get_object_vars($overview_object->{"local-variables"}) as $variable_name => $variable_calculations) {
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
			foreach ($overview_object->{"table-values"} as $value) {
				$value_clean = str_replace("_", "", $value);
				
				echo "<tr><td>";
				echo nice_text($value);
				echo "</td><td>";
				echo $variables[$value_clean];
				echo "</td></tr>";
			};
			?>
		</tbody>
	</table>
</body>

<?php include("../templates/foot.php"); ?>
