function $$(element) {
	return document.querySelectorAll(element);
}

// ? Voting System

// ? When a answer is picked, ajax is called adding the users vote to the database
// ?GETTING PCUSTIM QUESTION ROM THE DATABASE
window.onload = () => {
	get_friend_questions();
};

function get_friend_questions() {
	let friend_id = $(".user-section").getAttribute("data-friend_id");
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./includes/get_friend_questions.inc.php", true);
	xhr.onload = () => {
		if (xhr.status === 200 && XMLHttpRequest.DONE === xhr.readyState) {
			let res = xhr.response;
			$("#custom_question_cont").innerHTML = res;
		}
	};
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("friend_id=" + friend_id);
}

setInterval(() => {
	get_friend_questions();
}, 3000);

function showVotes(e) {
	e.target.parentNode.classList.toggle("show-votes");
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

function follow(e) {
	let count = Number($(".followers-count").innerHTML);
	let friend_id = $(".user-section").getAttribute("data-friend_id");
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./includes/follow.inc.php", true);
	xhr.onload = () => {
		if (xhr.status === 200 && XMLHttpRequest.DONE === xhr.readyState) {
			let res = xhr.response;
			if (res) {
				count =
					$("#follow_btn").innerHTML == "Unfollow" ? count - 1 : count + 1;
				$(".followers-count").innerHTML = count;
				$("#follow_btn").innerHTML =
					$("#follow_btn").innerHTML == "Unfollow" ? "Follow" : "Unfollow";
			}
		}
	};
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("friend_id=" + friend_id);
}

function deleteQuestion(e) {
	let confirmation = confirm("Do you want to delete this question");
	if (confirmation) {
		let question_id =
			e.target.parentNode.parentNode.getAttribute("data-questionId");
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "./includes/delete_question.inc.php", true);
		xhr.onload = () => {
			if (xhr.status === 200 && XMLHttpRequest.DONE === xhr.readyState) {
				let res = xhr.response;
				console.log(res);
				if (res == true) {
					confirm("Deleted");
				}
			}
		};

		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send("question_id=" + question_id);
	}
}

$("form").onsubmit = (e) => {
	e.preventDefault();
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./includes/change_profile_pic.php", true);
	xhr.onload = () => {
		if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
			let res = xhr.response;
			if (res == true) {
				location.href = "user.php";
			} else if (res == "not premium") {
				location.href = "payment.php";
			} else {
				console.log(res);
			}
		}
	};
	let formdata = new FormData($("form"));
	xhr.send(formdata);
};
