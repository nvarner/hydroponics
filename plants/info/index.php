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
	
	<div class="section">
		<p><span class="label">Description: </span><?php echo $plant_json->{"description"} ?></p>
	</div>
	
</body>

<?php include("../../templates/foot.php"); ?>