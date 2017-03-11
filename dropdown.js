var test;

$().ready(function () {
	var headers = $("h2, h3, h4, h5, h6");

	headers.prepend("<span class='dropdown-button dropdown-button-down'></span>");
	var dropdown_buttons = $(".dropdown-button");

	dropdown_buttons.on("click", function () {
		$(this).toggleClass("dropdown-button-down");
		$(this).toggleClass("dropdown-button-up");
		$(this).parent().next().toggle("blind", 200);

		test = $(this);
	});
});
