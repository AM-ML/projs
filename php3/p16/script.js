document.querySelector(".form").onsubmit =  async (event) => {
	event.preventDefault();
	let gender = document.querySelector("input[name=stdGender]:checked").value;
	let name = document.querySelector("#stdName").value;
	let fees = Number(document.querySelector("#stdFees").value);

	const response = await fetch("db.php", {
		headers: {
			"Content-Type": "json/application"
		},
		method: "POST",
		body: JSON.stringify({"name": name, "fees": fees, "gender": gender})
	})

	const status = await response.json();

	if(status == 0){
		alert("Unsuccessful");
		return false;
	} else{
		alert("Inserted student successfully");
	}



}