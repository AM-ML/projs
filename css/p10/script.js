const first = document.querySelector('.first');
const last = document.querySelector(".last");
const seconds = document.querySelector(".second");
const don = document.querySelector('.don');

const load = async () => {
	const response = await fetch("db.php");
	const data = await response.json();

	let {hour, minute, second, a} = data;

	first.innerHTML = hour;
	last.innerHTML = minute;
	seconds.innerHTML = second;
	don.innerHTML = a;
}

load();

window.setInterval(load, 1000)
