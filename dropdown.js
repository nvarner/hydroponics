$().ready(function () {
	var expanders = $(".expand-panel");
	//                 position after: expanding panel's first child
	var expander_button_location = $(".expand-panel > *:nth-child(1) > *:nth-child(2)");

	expander_button_location.after(	"<i class='material-icons dropdown-button'>expand_more</i>");
	var dropdown_buttons = $(".dropdown-button");

	dropdown_buttons.on("click", function () {
		if ($(this).text() == "expand_less") {
			$(this).text("expand_more");
		} else {
			$(this).text("expand_less");
		}
		$(this).parent().next().toggle("blind", 200);
	});

	dropdown_buttons.parent().next().toggle("blind", 200);
});
