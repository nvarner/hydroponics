var save_button;
var changed;
var content_editables;

$().ready(function () {
	content_editables = $("[contenteditable=true]");
	save_button = $("#save");

	changed = {};

	content_editables.on("input", function () {
		changed[un_nice_text($(this).prev().text(), "_")] = $(this).text();
	});

	save_button.on("click", function () {
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/hydroponics/settings/save.php",
			data: changed,
			success: function (data) {
				// alert("Sucess: " + data);
			},
			error: function (jqXHR, textStatus) {
				// alert("Error: " + textStatus + jqXHR.responseText);
			}
		});
		changed = {};
	})
});

$(document).ready(function() {
    $("[contenteditable]").on("input", function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
