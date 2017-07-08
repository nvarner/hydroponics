var scrim;

var drawer;
var drawer_button;

var editable;
var textbox;

$().ready(function () {
	drawer = $("#md-drawer");

	drawer_button = $("#md-drawer-button");
	drawer_button.on("click", function (event) {
		drawer.removeClass("md-drawer-hidden");
		drawer.addClass("md-drawer-showing");
		scrim.removeClass("md-scrim-hidden");
		scrim.addClass("md-scrim-showing");
		scrim.removeClass("md-z-index-zero");
	});

	scrim = $("#md-scrim");
	scrim.on("click", function (event) {
		drawer.addClass("md-drawer-hidden");
		drawer.removeClass("md-drawer-showing");
		scrim.addClass("md-scrim-hidden");
		scrim.removeClass("md-scrim-showing");
		setTimeout(scrim_z_index, 150);
	});

	textbox = $("<input type='text' class='mdc-textbox' />");
	editable = $(".md-editable");
	editable.append($("<i class='material-icons right'>mode_edit</i>"));
	editable.on("click", function (event) {
		$(this).append(textbox);
		$(this).last().off("focus", function (event) {
			$(this).remove();
		})
	});
});

function scrim_z_index () {
	scrim.addClass("md-z-index-zero");
}
