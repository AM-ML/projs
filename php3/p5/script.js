const load = async () => {
	const response = await fetch("conn.php");
	let stds = await response.json();
	const elB = document.querySelector(".tbody");
	stds.forEach(std => {
		const {stdID, stdName, stdGender, stdFees} = std;

		elB.innerHTML += `
		<tr>
			<td class="text-end">${stdID}</td>
			<td class="text-start text-capitalize">${stdName}</td>
			<td class="text-start">${stdGender == "M" ? "Male" : "Female"}</td>
			<td class="text-end">$${stdFees}</td>
		</tr>
		`
	});


	let elT = document.querySelector(".total");
	let total = stds.reduce((x, y) => x + Number(y.stdFees), 0);

	elT.innerHTML += total;

}
load();