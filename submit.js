//form validation for submit.php

$(document).ready(function() {
	$("#submit-form").submit(function(e) {
		//title and overview/acstract must be filled out
		if($("#name").val() == "") {
			e.preventDefault(); //prevent form submit
			alert("Please give your project a Title");
		}
		if($("#abs").val() == "") {
			e.preventDefault();
			alert("Please provide an Overview of your project");

			//just so name is focused first since its at the top
			if($("#name").val() == "") {
				$("#name").focus();
			}
			else $("#abs").focus();
		}
	});
});