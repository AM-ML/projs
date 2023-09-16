let mainsection = document.querySelector("#f4");
let navSection = document.querySelector(".nav");

function remSec() {
	document.querySelectorAll("section").forEach(section => {
		section.classList.add("none");
		section.classList.remove("block");
	})

	navSection.classList.remove("none");
	navSection.classList.add("block");

}

remSec();

mainsection.classList.remove("none");
mainsection.classList.add("block");


document.querySelectorAll("a").forEach(ahref => {
	ahref.addEventListener("click", function(){
		let val = ahref.getAttribute("value");

		if(val == null)
			return false;

		let target = "#" + val;

		if(target == "#f4"){
			document.body.style.backgroundImage = "none";
		} else {
			document.body.style.backgroundImage = "url('lau.jpg')";
		}

		remSec();

		document.querySelector(target).classList.add("block")
		document.querySelector(target).classList.remove("none");
	})
})

/* TEMPLATE  */

let elemA = document.querySelector(".alogin");
elemA.classList.add("none");

document.querySelector(".form2").onsubmit = async (e) => {
	e.preventDefault();

	elemA.classList.add("none");
	elemA.classList.remove("block");

	const conf = window.confirm("Are you sure you want to insert a new student?");

	if(conf == false)
		return false;

	const name = document.querySelector(".f2name").value;
	const fees = Number(document.querySelector(".f2fees").value);
	const gender = document.querySelector(`input[name="gender"]:checked`).value;

	const response = await fetch("index.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"name": name, "fees":fees, "gender":gender})
	})

	const status = await response.json();

	elemA.classList.remove("none");
	elemA.classList.add("block");

	if(status == 0){
		elemA.classList.remove("alert-info");
		elemA.classList.add("alert-danger");
		elemA.innerHTML = "Unsuccessful insertion.";
		return false;
	}

	elemA.classList.add("alert-info");
	elemA.classList.remove("alert-danger");
	elemA.innerHTML = "Successful insertion.";
}

/* TEMPLATE */


const select = document.querySelector(".select");
const elemAP = document.querySelector(".alertP");

const create = async () => {
	select.innerHTML = `<option value="0">Select a student</option>`;

	const response = await fetch("load.php");
	const stds = await response.json();

	stds.forEach(std => {
		const {stdID, stdName} = std;

		select.innerHTML += `<option class="std text-capitalize" value="${stdID}">${stdName}</option>`
	})
}

create();

function alnone(x){

	x.classList.remove("alert-info");
	x.classList.remove("alert-danger");
	x.classList.remove("block");
	x.classList.add("none");
} function alblock(x) {

	x.classList.remove("alert-info");
	x.classList.remove("alert-danger");
	x.classList.remove("none");
	x.classList.add("block");
}

alnone(elemAP);

let payer = 0;

const dispInfo = async (id, pay) => {
	const response = await fetch("info.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id": id})
	});
	const info = await response.json();

	let {stdID, stdName, stdGender, stdFees} = info;

	stdFees = Number(stdFees);

	let display = document.querySelector(".display");

	display.innerHTML = `
		<h2 class="id bg-light">ID: ${stdID}</h2>
		<h2 class="name bg-light">Name: ${stdName}</h2>
		<h2 class="infgender bg-light">Gender: ${stdGender == "M"? "Male": "Female"}</h2>
		<h2 class="fees bg-light">Fees: ${stdFees.toLocaleString("en-US", {style : "currency", currency:"USD"})}</h2>
		<h2 class="remaining bg-light">Remaining Fees: ${(stdFees - pay).toLocaleString("en-US", {style : "currency", currency:"USD"})}</h2>
	`;
}

const getPay = async () => {
	const id = Number(select.value);
	const input = document.querySelector(".payment");

	const response = await fetch("getpay.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id": id})
	});

	const totalpayarray = await response.json();

	let {pay} = totalpayarray;
	payer = pay;
	input.value = "";

	dispInfo(id, pay.toLocaleString("en-US", {style : "currency", currency:"USD"}));

	input.placeholder = pay + " total";
}

document.querySelector(".form3").onsubmit = async (e) => {
	e.preventDefault();

	const conf = window.confirm("Are you sure you want to insert new payment?");

	if(conf == false)
		return false;

	alnone(elemAP);

	let payment = Number(document.querySelector(".payment").value);
	let id = Number(select.value);


	const response = await fetch("insert.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id":id, "payment":payment})
	})

	const status = await response.json();

	alblock(elemAP);

	if(status == 0){
		elemAP.classList.add("alert-danger");
		elemAP.innerHTML = "payment insertion unsuccessful.";
		return false;
	}

	elemAP.classList.add("alert-info");
	elemAP.innerHTML = "payment insertion successful.";

	console.log(payer);
	dispInfo(id, payer)

	return true;
}	





/* TEMPLATE */


const data = async () => {
	let gender = document.querySelector(`input[name="gend"]:checked`).value;

	const response = await fetch("table.php");
	let stds = await response.json();

	if(gender != "A"){
		stds = stds.filter(std => std.stdGender == gender);
	}

	let target = document.querySelector(".search").value;

	if(target.length != 0){
        stds = stds.filter(std => std.stdName.toLowerCase().includes(target.toLowerCase()) || String(std.stdID).includes(String(target)));
    }


	const elemB = document.querySelector(".tbody");

	elemB.innerHTML = "";

	stds.forEach(std => {
		let {stdID, stdName, stdGender, stdFees, stdPay} = std;

		stdFees = Number(stdFees);
		stdPay = Number(stdPay);
		elemB.innerHTML += `
			<td class="text-end">${stdID}</td>
			<td class="text-start text-capitalize">${stdName}</td>
			<td class="text-center">${stdFees.toLocaleString("en-US", {style : "currency", currency:"USD"})}</td>
			<td class="text-center">${stdPay.toLocaleString("en-US", {style : "currency", currency:"USD"})}</td>
			<td class="text-end">${(stdFees - stdPay).toLocaleString("en-US", {style : "currency", currency:"USD"})}</td>
		`
	})


	const totalfees = document.querySelector(".totalfees");
	const totalpay = document.querySelector(".totalpayment");
	const totalremaining = document.querySelector(".totalremaining");

	let tf = stds.reduce((x, y) => x + Number(y.stdFees), 0);
	let tp = stds.reduce((x, y) => x + Number(y.stdPay), 0);
	let tr = tf - tp;

	totalfees.innerHTML = tf.toLocaleString("en-US", {style : "currency", currency:"USD"});
	totalpay.innerHTML = tp.toLocaleString("en-US", {style : "currency", currency:"USD"});
	totalremaining.innerHTML = tr.toLocaleString("en-US", {style : "currency", currency:"USD"});

	const cap = document.querySelector(".cap");
	cap.innerHTML = `There are ${stds.length} students in the table`
}
data();


/* TEMPLATE */

const delselect = document.querySelector(".delselect");


const creates = async () => {
	delselect.innerHTML = `<option value="0">Select a student</option>`;

	const response = await fetch("load.php");
	const stds = await response.json();

	stds.forEach(std => {
		const {stdID, stdName} = std;

		delselect.innerHTML += `<option class="std text-capitalize" value="${stdID}">${stdName}</option>`
	})
}

creates();

const alerter = document.querySelector(".elemD");

document.querySelector(".form1").onsubmit = async (e) => {
	e.preventDefault();

	alnone(alerter);

	const id = delselect.value;

	if(id == 0)
		return false;

	const conf = window.confirm("Are you sure you want to delete this student?");

	if(conf == false)
		return false;


	const response = await fetch("del.php", {
		headers: {
			"Content-Type": "application/json"
		},
		method: "POST",
		body: JSON.stringify({"id": id})
	})

	const status = await response.json();

	alblock(alerter);

	if(status == 0){
		alerter.classList.add("alert-danger");
		alerter.innerHTML = "Deletion unsuccessful";
		return false;
	}

	alerter.classList.add("alert-info");
	alerter.innerHTML = "Deletion successful";
	return true;
}