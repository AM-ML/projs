function rm(){
	document.querySelectorAll("section").forEach(section => {
				section.classList.add("none");
				section.classList.remove("block");
			})
}
rm();
document.querySelector("#secfees").classList.remove("none");
document.querySelector("#secfees").classList.add("block");
document.querySelectorAll("a").forEach(ahref => {
	ahref.addEventListener("click", function(){
		rm();
		let value = ahref.getAttribute("value");
		if (value == null){
			return false;
		} else {
			value = "#" + String(value);
			let elem = document.querySelector(value);
			if (elem.classList.contains("none")) {
			    elem.classList.remove("none");
			    elem.classList.add("block");
			} else {
			    elem.classList.remove("block");  // Add this line to remove the "block" class
			    elem.classList.add("none");
			}
		}
	})
})



const select = document.querySelector(".students");
let elemF = document.querySelector(".fees");


const select2 = document.querySelector(".student");
let elemF2 = document.querySelector(".pay")

const create = async () => {
	const response = await fetch("db.php");

	let stds = await response.json();

	select.innerHTML = `<option value="0" name="std">Select Student</option>`
	select2.innerHTML = `<option value="0" name="std">Select Student</option>`

	stds.forEach(std => {
		const {stdID, stdName} = std;
			select.innerHTML += `
				<option value="${stdID}">${stdName}</option>
			`
			select2.innerHTML += `
				<option value="${stdID}">${stdName}</option>
			`
	});
}
create();
const load = async () => {
	const id = select.value;

	if(id == 0)
		return false;

	const response = await fetch("index.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id": id})
	})
	const std = await response.json();

	const {stdFees} = std;
	const fees = stdFees;
	elemF.value = fees;
}


const update = async () => {
	const id = select.value;
	if (id == 0){
		alert("select a student.");
		return false;
	}

	const fees = elemF.value;
	
	if (fees < 0) {
		alert("invalid value.");
		return false;
	}

	const resp = window.confirm(`are you sure you want to update student fees?`);

	console.log(resp);
	
	if(!resp)
		return false;
	const response = await fetch("upFees.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id": id, "fees":fees})
	})

	const status = await response.json();

	if (status == 0){
		alert("could not update student fees.");
	} else{
		alert("update student fees successfully.");
	}

	create();
}




const load2 = async () => {
	const id = select2.value;
	if(id == 0){
		return false;
	}

	const response = await fetch("pay.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id": id})
	})

	let selectpay = await response.json();
	let {pay} = selectpay;

	elemF2.value = pay;
}

const add = async () => {
	const id = select2.value;
	const newpay = elemF2.value;

	if(id == 0)
		return false;
	if(newpay <= 0)
		return false;

	const resp = window.confirm("Are you sure you want to add student payment?");

	if(!resp)
		return false;

	const response = await fetch("upPay.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id":id, "pay":newpay})
	})
	const status = response.json;
	if(Number(status) == 0)
		alert("New payment not added successfully.");
	else {
		alert("New payment added successfully.");
	}
}