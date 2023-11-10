// const $ = (element) => document.querySelector(element);
const $$ = (element) => document.querySelectorAll(element);

// ? WHen the use TRUE/FALSE is checked Display TRUE?FALSE OPTIONS AND WHEN IT IS UNCHECKED DISPLAY OPTIONS AGAIN

$("#bool").onchange = (e) => {
	let checked = e.target.checked;
	if (checked) {
		$$(".option").forEach((option) => {
			option.classList.add("hide");
		});
		$$(".bool").forEach((bool) => {
			bool.classList.remove("hide");
		});
	} else {
		$$(".option").forEach((option) => {
			option.classList.remove("hide");
		});
		$$(".bool").forEach((bool) => {
			bool.classList.add("hide");
		});
	}

	// !INITIALIZING ALL BACK TP DEFAULT
	$$(".bool").forEach((bool) => {
		bool.children[0].children[0].checked = false;
	});
	$$(".option").forEach((option) => {
		option.children[0].children[0].checked = false;
		option.children[1].children[1].value = "";
	});
	$("input[id='answer']").value = "";
};

$("#submit").onclick = (e) => {
	// e.preventDefault();
	if ($("#bool").checked) {
		$$(".bool").forEach((bool) => {
			if (bool.children[0].children[0].checked)
				$("input[id='answer']").value = bool.children[0].children[0].value;
		});
	} else {
		$$(".option").forEach((option) => {
			option.children[0].children[0].value =
				option.children[1].children[1].value;

			if (option.children[0].children[0].checked)
				$("input[id='answer']").value = option.children[1].children[1].value;
		});
	}
};
// 	let xhr = new XMLHttpRequest();
// 	xhr.open("POST", "./includes/custom_questions.inc.php", true);
// 	xhr.onload = () => {
// 		if (xhr.readyState === 200 && XMLHttpRequest.DONE === xhr.status) {
// 		}
// 	};

// 	let formData = new FormData($("#custom_question_form"));
// 	xhr.send(formData);
// };
