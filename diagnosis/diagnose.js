var issue_types = {
	"deficiency": new IssueType("Nutrient Deficiency", "Add _thing_ to your nutrient solution."),
	"excess": new IssueType("Nutrient Excess", "Remove some _thing_ from your nutrient solution.")
};

var issues = [
	new Issue("Boron", issue_types.deficiency, "borax or borate"), //0
	new Issue("Boron", issue_types.excess), //1
	
	new Issue("Calcium", issue_types.deficiency, "calcium or gypsum"), //2
	new Issue("Calcium", issue_types.excess), //3
	
	new Issue("Chlorine", issue_types.deficiency), //4
	new Issue("Chlorine", issue_types.excess), //5
	
	new Issue("Copper", issue_types.deficiency, "copper, cupric, or cuprous"), //6
	new Issue("Copper", issue_types.excess), //7
	
	new Issue("Iron", issue_types.deficiency, "iron chelate"), //8
	new Issue("Iron", issue_types.excess), //9
	
	new Issue("Maganese", issue_types.deficiency, "magnese or manganous"), //10
	new Issue("Maganese", issue_types.excess), //11
	
	new Issue("Magnesium", issue_types.deficiency, "magnesium or Epsom salts"), //12
	new Issue("Magnesium", issue_types.excess), //13
	
	new Issue("Molybdenum", issue_types.deficiency, "molybdate or molybdic"), //14
	new Issue("Molybdenum", issue_types.excess), //15
	
	new Issue("Nitrogen", issue_types.deficiency, "ammonium, nitrate, or urea"), //16
	new Issue("Nitrogen", issue_types.excess), //17
	
	new Issue("Phosphorus", issue_types.deficiency, "phosphate"), //18
	new Issue("Phosphorus", issue_types.excess), //19
	
	new Issue("Potassium", issue_types.deficiency, "potassium or potash"), //20
	new Issue("Potassium", issue_types.excess), //21
	
	new Issue("Sulfur", issue_types.deficiency, "sulfate"), //22
	new Issue("Sulfur", issue_types.excess), //23
	
	new Issue("Zinc", issue_types.deficiency), //24
	new Issue("Zinc", issue_types.excess) //25
];

var questions = [
	new Question("Are roots affected?", [
		issues[17],
		issues[18],
		issues[2],
		issues[4],
		issues[0],
		issues[7]
	]),
	new Question("Are old leaves (leaves grown before the plant had a problem) affected?", [
		issues[16],
		issues[18],
		issues[20],
		issues[12],
		issues[10],
		issues[14]
	]),
	new Question("Are leaves yellowing?", [
		issues[16],
		issues[22],
		issues[23],
		issues[5],
		issues[1]
	]),
	new Question("Are parts of the plant turning purple?", [
		issues[16],
		issues[18]
	]),
	new Question("Are leaves turning dark green?", [
		issues[17],
		issues[6]
	]),
	new Question("Are leaves drying up?", [
		issues[17],
		issues[0]
	])
];

var current_question_index = 0;

function advance_question() {
	current_question_index++;
	$("#question").text(questions[current_question_index].question_string);
}

$().ready(function() {
	$("#question").text(questions[current_question_index].question_string);
	
	$("#answer-yes").on("click", function () {
		if (current_question_index < questions.length - 1) {
			var issues_yes = questions[current_question_index].issues_yes;

			for (var i = 0; i < issues_yes.length; i++) {
				issues_yes[i].questions_support++;
			}
			
			advance_question();
		} else {
			var issues_copy = issues.slice();
			issues_copy.sort(function(a,b) {return (a.questions_support > b.questions_support) ? 1 : ((b.questions_support > a.questions_support) ? -1 : 0);} ); 
			
			$(".result_0").text(issues_copy[0].type.type + ": " + issues_copy[0].name + " (Corroborated by )";
		}
	});
	
	$("#answer-no").on("click", function () {
		advance_question();
	});
});