<?php
require_once("../functions.php");

$plant_type = htmlspecialchars($_GET["plant-type"]);
$plant_file_path = "../plants/$plant_type";			
$plant_object = get_json($plant_file_path);

$possible_issues = [];

foreach ($plant_object->{"issues-list"} as $issue) {
	$symptom_hits = 0;
	$not_symptom = 0;
	
	foreach ($issue[1] as $symptom) {
		if (isset($_GET[$symptom])) {
			$symptom_hits++;
		} else {
			$not_symptom++;
		}
	}
	
	array_push($possible_issues, [$issue, [$symptom_hits, $not_symptom, sizeof($issue[1])]]);
}

usort($possible_issues, function ($a, $b) {
	return ($b[1][0] / $b[1][2]) <=> ($a[1][0] / $a[1][2]);
});

foreach ($possible_issues as $issue) {
	echo "<div class='possible_issue'><ul>" .
		"<li>Issue: " . nice_text($issue[0][0]) . "</li>" .
		"<li>Symptoms Shown: " . $issue[1][0] . "</li>" .
		"<li>Symptoms Not Shown: " . $issue[1][1] . "</li>" .
		"<li>Percent of Symptoms Shown: " . round($issue[1][0] / $issue[1][2] * 100) . "%</li>" .
		"</ul>" .
		"<h2>Resources</h2><ul class='resources'>";
	
	foreach ($issue[0][2] as $link) {
		echo "<li><a href='$link' class='iframe-cover'>" . get_publisher($link, "../publishers.json") . "</a></li>";
	}
	
	echo "</ul></div>";
}
?>