const output = document.querySelector(".output");

const send = async (e) => {
	const gender = e.target.value;
	const response = await fetch("index.php", {
		headers: {
			"Content-Type" : "json/application"
		},
		method: "POST",
		body: JSON.stringify({"gender": gender})
	})
	const data = await response.json();

	output.innerHTML = `You are a ${data}`;
}