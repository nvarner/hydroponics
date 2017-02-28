<!doctype html>

<html>
	<head>
		<title>Diagnosis- Plant Type</title>
		
		<link rel="stylesheet" href="../../style.css" />
	</head>
	
	<body>
		<h1>Plant Type</h1>
		
		<form action="../">
			<label for="plant-type">Plant Type:</label>
			<select id="plant-type" name="plant-type">
				<?php
				$plant_file_path = "../../plants/plants.json";
				$plant_file = fopen($plant_file_path, "r") or die("Unable to open the file at $plant_file_path."
																			. "Try again and make sure the file exists!");
				$plant_json = fread($plant_file, filesize($plant_file_path));
				fclose($plant_file);				
				$plant_list = json_decode($plant_json);
				
				foreach ($plant_list as $plant) {
					echo "<option value='$plant.json'>". ucwords($plant) . "</option>";
				}
				?>
			</select>
			
			<input type="submit" />
		</form>
	</body>
</html>