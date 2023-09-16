const load = async () => {

	const response = await fetch("db.php");
	let stds = await response.json();


	const tbody = document.querySelector(".tbody");
	tbody.innerHTML = "";

	 const target = document.querySelector(".search").value;

    if(target.length != 0){
        stds = stds.filter(std => 
        	std.stdName.toLowerCase().startsWith(target.toLowerCase()) 
        			||
        	String(std.stdID).startsWith(String(target))
        );
    }



	stds.forEach(std => {
		const {stdID, stdName, stdAbs} = std;

		tbody.innerHTML += `
			<td class="text-end">${stdID}</td>
			<td class="text-start text-capitalize">${stdName}</td>
			<td class="text-center">${stdAbs}</td>
		`
	});
}
load();