<?php
$title = "Diagnosis"
$extra_head = "<script src="enable_get.js"></script>" .
"<script src="issue_type.js"></script>" .
"<script src="issue.js"></script>" .
"<script src="question.js"></script>" .
"<script src="diagnose.js"></script>" .
?>
		<script src="enable_get.js"></script>
		<script src="issue_type.js"></script>
		<script src="issue.js"></script>
		<script src="question.js"></script>
		<script src="diagnose.js"></script>
	</head>

	<body>
		<?php
		require_once("../functions.php");

		$plant_type = htmlspecialchars($_GET["plant-type"]);
		$plant_file_path = "../plants/$plant_type";
		$plant_file = fopen($plant_file_path, "r") or die("Unable to open the file at $plant_file_path."
														  . "Try again and make sure the file exists!");
		$plant_json = fread($plant_file, filesize($plant_file_path));
		fclose($plant_file);
		$plant_object = json_decode($plant_json);
		?>

		<h1>Plant Diagnosis</h1>

		<form id="questions-form" action="get_results.php" method="get">
			<input type="text" name="plant-type" value="<?php echo $plant_type ?>" hidden="hidden" />
			<label for="symptom-selector" class="centered">Select the symptoms that your plant is showing.</label>
			<ul id="symptom-selector">
				<?php
				//                                                            key is the name of the symptom
				//                                                            value is the description of the symptom
				foreach (get_object_vars($plant_object->{"symptoms-list"}) as $key => $value) {
					$symptom_nice = nice_text($key);

					echo "<li><fieldset class='question-group'>" .
						"<input type='checkbox' name='$key' value='on' />" .
						"<span class='description'><h2 class='symptom'>$symptom_nice-</h2>$value</span>" .
						"</fieldset></li>";
				}
				?>
			</ul>

			<input id="submit" type="submit" value="Submit" />
		</form>

		<p id="response"></p>

		<div id="diagnosis" class="hidden">
			<h2>Current Diagnosis:</h2><span class="result_0">None</span>

			<h3>Other Possibilities:</h3>
			<ul id="result_other"></ul>
		</div>
	</body>
</html>
