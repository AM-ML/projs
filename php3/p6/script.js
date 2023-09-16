const load = async () => {
	const response = await fetch("conn.php");
	let stds = await response.json();
	const tb = document.querySelector(".tbody");
	const elemC = document.querySelector(".cap");

	tb.innerHTML = "";

	let check = document.querySelector("input[name=gender]:checked");
	let gender = check.value;

	if(gender != 'A'){
		stds = stds.filter(std => std.stdGender == gender);
	}




	stds.forEach(std => {
		const {stdID, stdName, stdGender, stdFees} = std;

		tb.innerHTML += `
			<tr>
				<td class="text-end">${stdID}</td>
				<td class="text-start text-capitalize">${stdName}</td>
				<td class="text-start">${stdGender == "M" ? "Male" : "Female"}</td>
				<td class="text-end">$${stdFees.toLocaleString()}</td>
			</tr>
		`

	});
	let elT = document.querySelector(".total");
	let total = stds.reduce((x, y) => x + Number(y.stdFees), 0);

	elT.innerHTML = "$" + total.toLocaleString();
	elemC.innerHTML = `There are currently ${stds.length} students.`;
}
load();