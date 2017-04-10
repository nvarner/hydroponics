$().ready(function () {
	var ink_buttons = $(".text-button");

	ink_buttons.on("click", function () {
		$(this).append($("<span class='ink'></span>"));
	})
});
