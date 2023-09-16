const output = document.querySelector(".output");

const reverse = async (e) => {
	const txt = e.target.value;
	const response = await fetch("index.php", {
		headers: {
			"Content-Type" : "json/application"
		},
		method: "POST",
		body: JSON.stringify({"txt": txt})
	})

	const data = await response.json();

	output.innerHTML  = data;
}