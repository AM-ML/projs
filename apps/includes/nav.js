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
			document.querySelectorAll("a").forEach(allElem => {
				allElem.classList.remove("link-active");
			});
			ahref.classList.add("link-active");
		});
	})
}

ftch = async (name, body)  => {
    let resp = await fetch(name, {
        headers: {
            "Content-Type": "application/json"
        },
        method: "POST",
        body: body
    })

    resp = await resp.json();
    return resp;
}
