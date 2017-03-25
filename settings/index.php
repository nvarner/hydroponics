<?php $title="Settings"; $extra_head="<script src='/hydroponics/scripts/settings.js'></script>"; include("../templates/head.php"); ?>

<body>
	<?php include("../templates/header.php"); ?>
	<form>
		<table class="level-2">
			<thead>
				<tr>
					<td>Name</td>
					<td>Value</td>
				</tr>
			</thead>
			<tbody>

				<?php

				$settings_object = get_json("../data/settings.json");

				/***********************
				* Display table values *
				***********************/
				foreach (get_object_vars($settings_object) as $setting_name => $setting_value) {
					echo "<tr><td>";
					echo nice_text($setting_name);
					echo "</td><td contenteditable='true'>";
					echo $setting_value;
					echo "</td></tr>";
				};
				?>
			</tbody>
		</table>

		<a class="button" id="save">Save</a>
	</form>
</body>

<?php include("../templates/foot.php"); ?>
<!-- fun lets do this-->
