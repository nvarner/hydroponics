function nice_text (text) {
	var text_fixed;
	text_fixed = ucwords(str_replace("-", " ", text));
	text_fixed = ucwords(str_replace("_", " ", text_fixed));
	return text_fixed;
}

function un_nice_text (text, char) {
	char = (typeof(char) === "undefined" ? "-" : char);
	var text_fixed = text.replace(/ /g, char).toLowerCase();

	return text_fixed;
}
