var plant;

$().ready(function () {
	plant = $_GET["plant-type"];
	
	$("#questions-form").ajaxForm({target: "#response"});
});