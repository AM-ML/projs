const select = document.querySelector(".std");
const load = async (e) => {
	const response = await fetch("db.php");
	const stds = await response.json();

	select.innerHTML = `<option value=0>Select Student</option>`;

	stds.forEach(std => {
		const {stdID, stdName} = std;

		select.innerHTML += `
			<option value="${stdID}" name="std" class="text-capitalize">${stdName}</option>
		`;
	});
}
load();

const delstd = async () => {
	const target = select.value;
	if(target == 0){
		alert("Enter a student to delete.")
	} else{
		const name = document.querySelector("option[name='std']:checked").innerText;
		const ans = window.prompt(`Are you sure you want to delete ${name} from students? (Yes / No)`);
		if (ans == null) {
			return false;
		}
		if(ans.toLowerCase() == "yes"){


			const response = await fetch("index.php", {
				headers: {
					"Content-Type": "json/application"
				},
				method: "POST",
				body: JSON.stringify({"id": target})
			});



			const data = await response.json();

			select.value = "0";
			load();

			
			if(Number(data) == 1){
				alert(`Student ${name} deleted.`);
			} else {
				alert(`Could not delete student ${name} from students.`);
			}
		}
	}

}