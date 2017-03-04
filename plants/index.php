<?php

$title = "Plants";
include("../templates/head.php");

?>

<body>
	<?php include("../templates/header.php"); ?>
	
	<table>
	<thead>
		<tr>
			<td>Plant</td>
		</tr>
	</thead>
	<tbody>
		<?php

		foreach (get_json("plants.json") as $plant) {
			echo "<tr><td>";
			echo "<a href='info?plant-type=$plant'>" . nice_text($plant) . "</a>";
			echo "</td></tr>";
		}

		?>
	</tbody>
	</table>
	
	
</body>

<?php include("../templates/foot.php"); ?>