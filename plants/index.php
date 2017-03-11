<?php

$title = "Plants";
include("../templates/head.php");

?>

<body>
	<?php include("../templates/header.php"); ?>

	<table class="level-2">
		<thead>
			<tr>
				<td>Plant</td>
				<td>Description</td>
			</tr>
		</thead>
		<tbody>
			<?php

			foreach (get_json("plants.json") as $plant) {
				echo "<tr><td>";
				echo "<a href='info?plant-type=$plant'>" . nice_text($plant) . "</a>";
				echo "</td><td>";
				echo get_json("$plant.json")->{"description"};
				echo "</td></tr>";
			}

			?>
		</tbody>
	</table>


</body>

<?php include("../templates/foot.php"); ?>
