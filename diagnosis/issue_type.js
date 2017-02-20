function IssueType(type_string, resolution_string) {
	this.type = type_string;
	this.resolution = resolution_string;
	
	this.output_resolution = function(thing) {
		return this.resolution.replace("_thing_", thing.toLowerCase())
	}
}