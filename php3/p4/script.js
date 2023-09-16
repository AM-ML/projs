const load = async () => {
	const response = await fetch("conn.php");
	let emps = await response.json();
	const elemB = document.querySelector(".tb");
	elemB.innerHTML = "";
	elemR = document.querySelector("input[name=gender]:checked");

	const gend = elemR.value;

	if (gend != 'A'){
		emps = emps.filter(emp => emp.gender == gend);
	}

	const elemT = document.querySelector(".total");
	const elemC = document.querySelector(".caption");
	let total = 0;
	emps.sort((a, b) => {
	  // First priority: Compare first letters of names
	  const firstLetterComparison = a.name[0].localeCompare(b.name[0]);
	  if (firstLetterComparison !== 0) {
	    return firstLetterComparison;
	  }

	  // Second priority: Compare name lengths
	  return a.name.length - b.name.length;
	});
	emps.forEach(emp => {
		const {name, gender, sal} = emp;
		elemB.innerHTML += `
			<td class="text-center text-capitalize">${name}</td>
			<td class="text-center text-capitalize">${gender == "M" ? "Male" : "Female"}</td>
			<td class="text-center text-capitalize">$${sal.toLocaleString()}</td>
		`
	});
	total = emps.reduce((sum, emp) => sum + emp.sal, 0);
	elemT.innerHTML = "$" + total.toLocaleString();
	elemC.innerHTML = `There are ${emps.length} employees currently displayed.`;
}
load();

