var link = document.querySelector(".buttonBuyBasket");
var popup = document.querySelector(".sendingMail");
var close_feedback = document.querySelector(".buttonCansel");

	link.addEventListener("click", function (evt){
		evt.preventDefault();
		popup.classList.add("sendingMailShow");
	});

	close_feedback.addEventListener("click", function (evt){
		evt.preventDefault();
		popup.classList.remove("sendingMailShow");
	});
