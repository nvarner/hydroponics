var save_button;
var changed;
var content_editables;

$().ready(function () {
	content_editables = $("[contenteditable=true]");
	save_button = $("#save");

	changed = {};

	content_editables.on("input", function () {
		changed[un_nice_text($(this).siblings().text(), "_")] = $(this).text();
	});

	save_button.on("click", function () {
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/hydroponics/settings/save.php",
			data: changed,
			success: function (data) {
				alert("Sucess: " + data);
			},
			error: function (jqXHR, textStatus) {
				alert("Error: " + textStatus + jqXHR.responseText);
			}
		});
		changed = {};
	})
});
