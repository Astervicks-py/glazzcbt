function $$(element) {
	return document.querySelectorAll(element);
}

$$(".comment-btn").forEach((btn) => {
	btn.onclick = (e) => {
		let parent = e.target.parentNode.parentNode.parentNode;
		$$(".comments-section").forEach((comment) => {
			comment.classList.add("hide");
		});
		parent.children[6].classList.toggle("hide");
	};
});

// ? Voting System

// ? When a answer is picked, ajax is called adding the users vote to the database
// ?GETTING PCUSTIM QUESTION ROM THE DATABASE
window.onload = () => {
	get_questions();
};

function get_questions() {
	let filter = $("#filter").value;
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./includes/get_questions.inc.php", true);
	xhr.onload = () => {
		if (xhr.status === 200 && XMLHttpRequest.DONE === xhr.readyState) {
			let res = xhr.response;
			$("#custom_question_cont").innerHTML = res;
		}
	};
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("course=" + filter);
}
setInterval(() => {
	get_questions();
}, 3000);

function showVotes(e) {
	e.target.parentNode.classList.toggle("show-votes");
	e.target.innerHTML =
		e.target.innerHTML === "Show Votes" ? "Hide Votes" : "Show Votes";
}

function insertVote(e) {
	let option = e.target.getAttribute("data-option");
	let my_answer = e.target.value;
	let questionId =
		e.target.parentNode.parentNode.parentNode.getAttribute("data-questionId");
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./includes/vote.inc.php", true);
	xhr.onload = () => {
		if (xhr.status === 200 && XMLHttpRequest.DONE === xhr.readyState) {
			let res = xhr.response;
			if (res == "Voted") {
				e.target.parentNode.parentNode.parentNode.classList.toggle(
					"show-votes"
				);
			}
		}
	};
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(
		"my_answer=" +
			my_answer +
			"&question_id=" +
			questionId +
			"&selected_option=" +
			option
	);
}

function likeQuestion(e) {
	let question_id =
		e.target.parentNode.parentNode.getAttribute("data-questionId");

	// like_question.inc.php;
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./includes/like_question.inc.php", true);
	xhr.onload = () => {
		if (xhr.status === 200 && XMLHttpRequest.DONE === xhr.readyState) {
			let res = xhr.response;
			console.log(res);
			if (res == "Liked") {
				let parent = e.target.parentNode;
				let prev = Number(parent.children[2].innerHTML);

				if (parent.classList.contains("heart-active")) {
					parent.children[2].innerHTML = prev - 1;
				} else {
					parent.children[2].innerHTML = prev + 1;
				}

				parent.classList.toggle("heart-active");
			}
		}
	};

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("question_id=" + question_id);
}

$("#filter").onchange = (e) => {
	get_questions();
};
