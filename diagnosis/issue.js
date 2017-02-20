function Issue(name, type, thing) {
	this.name = name;
	this.type = type;
	
	this.questions_support = 0;
	
	if (arguments.length >= 3) {
		this.solution = type.output_resolution(thing);
	} else {
		this.solution = type.output_resolution(name);
	}
}