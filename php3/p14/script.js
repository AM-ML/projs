const chk = document.querySelector("#chk");
const ul = document.querySelector(".output");
const load = async () => {
	const is_checked = chk.checked;

	ul.innerHTML = "";

	const response = await fetch("db.php", {
		headers: {
			"Content-Type": "json/application"
		},
		method: "POST",
		body: JSON.stringify({"is_checked": is_checked})
	})

	const stds = await response.json();

	stds.forEach(std => {
		const {stdName} = std;

		ul.innerHTML += `
			<li class="list-group-item text-capitalize">${stdName}</li>
		`
	})
}
load();