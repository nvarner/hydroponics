var scrim;
var drawer;
var drawer_button;

$().ready(function () {
	scrim = $("#md-scrim");
	drawer = $("#md-drawer");
	drawer_button = $("#md-drawer-button");

	drawer_button.on("click", function (event) {
		drawer.removeClass("md-drawer-hidden");
		drawer.addClass("md-drawer-showing");
		scrim.removeClass("md-scrim-hidden");
		scrim.addClass("md-scrim-showing");
		scrim.removeClass("md-z-index-zero");
	});

	scrim.on("click", function (event) {
		drawer.addClass("md-drawer-hidden");
		drawer.removeClass("md-drawer-showing");
		scrim.addClass("md-scrim-hidden");
		scrim.removeClass("md-scrim-showing");
		setTimeout(scrim_z_index, 150);
	});
});

function scrim_z_index () {
	scrim.addClass("md-z-index-zero");
}
