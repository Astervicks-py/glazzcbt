function $(element) {
	return document.querySelector(element);
}

let toggle = false;
$("#show-more").onclick = () => {
	if (
		(document.querySelector(".course-sect").style.height = "400px !important")
	) {
		if (toggle) {
			$(".course-sect").classList.remove("show");
			$("#show-more").innerHTML = "Show More";
			toggle = !toggle;
		} else {
			$(".course-sect").classList.add("show");
			$("#show-more").innerHTML = "Show Less";
			toggle = !toggle;
		}
	}

	// console.log($(".course-sect").style.height)
};
