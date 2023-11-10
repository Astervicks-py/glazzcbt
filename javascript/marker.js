const form = document.querySelector("form");
const submitbtn = document.querySelector(".btn");

form.onsubmit = (e) => {
	e.preventDefault();
};

submitbtn.onclick = () => {
	markQuestion();
};

function $(e) {
	return document.querySelector(e);
}

function closeAlert() {
	$(".darkCover").style.display = "none";
	$(".alert").style.display = "none";
}

const Minutes = $(".minute");
const Seconds = $(".second");
let sTime = 60;
let mTime = 10;
// ! OIJNCREMENT THESE TIMES
setInterval(() => {
	sTime--;
	if (sTime < 10) {
		sTime = "0" + sTime;

		if (sTime < 1) {
			if (mTime < 1 && sTime < 1) {
				alert("time up");
				markQuestion();
			} else {
				sTime = 60;
			}
		}
	}

	Seconds.innerHTML = sTime;
}, 1000);

setInterval(() => {
	mTime--;
	if (mTime < 10) {
		mTime = "0" + mTime;
	}
	Minutes.innerHTML = mTime;
}, 60000);

function markQuestion() {
	let xhr = new XMLHttpRequest();
	if (form.getAttribute("data-subjective") == 1) {
		xhr.open("POST", "./includes/marker_subjective.inc.php", true);
	} else {
		xhr.open("POST", "./includes/marker.inc.php", true);
	}
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			let data = xhr.response;
			console.log(data);
			if (data == "Saved") {
				location.href = "./score.php";
			} else {
				alert("Something Went Wrong.");
			}
		}
	};
	let formData = new FormData(form);
	xhr.send(formData);
}
