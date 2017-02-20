// This is an object that represents a question that can be asked
//
// Inputs:
//     question_string: This is the text of the yes or no question
//     issues_yes: This is a list of issues that are supported if the question's answer is yes
function Question(question_string, issues_yes) {
	this.question_string = question_string;
	this.issues_yes = issues_yes;
}