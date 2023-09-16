const h2 = document.querySelector(".h2");


document.querySelector(".form").onsubmit = (e) => {
	e.preventDefault();

	let number = document.querySelector(".form-control").value;

	h2.innerHTML = number;
}