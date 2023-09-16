function rm(){
	document.querySelectorAll("section").forEach(section => {
				section.classList.add("none");
			})
}
rm();
document.querySelector("#sec1").classList.remove("none");
document.querySelector("#sec1").classList.add("block");
document.querySelectorAll("a").forEach(ahref => {
	ahref.addEventListener("click", function(){
		rm();
		let value = ahref.getAttribute("value");
		if (value == null){
			return false;
		} else {
			value = "#" + String(value);
			let elem = document.querySelector(value);
			if (elem.classList.contains("none")) {
			    elem.classList.remove("none");
			    elem.classList.add("block");
			} else {
			    elem.classList.remove("block");  // Add this line to remove the "block" class
			    elem.classList.add("none");
			}
		}
	})
})