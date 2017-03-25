var save_button;
var changed;
var content_editables;

$().ready(function () {
	content_editables = $("[contenteditable=true]");
	save_button = $("#save");

	content_editables.on("input", function () {
		changed[un_nice_text($(this).siblings().text()), "_"] = $(this).text();
		alert(JSON.stringify(changed));
	});

	save_button.on("click", function () {
		alert({'data':changed});
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/hydroponics/settings/save.php",
			data: changed,
			success: function (data) {
				alert("Sucess: " + data);
			},
			error: function (jqXHR, textStatus) {
				alert("Error: " + textStatus);
			}
		});
	})
});
