function rm(){
	document.querySelectorAll("section").forEach(section => {
		section.style.display = "none";
	})
}

function listen() {
	document.querySelectorAll("a").forEach(ahref => {
		ahref.addEventListener("click", function() {
			let val = ahref.getAttribute("value");
			if(val == null)
				return false;
			rm();
			document.querySelector(val).style.display="block";
		});
	})
}
