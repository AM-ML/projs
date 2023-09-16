function handle(e){
	console.log(e.target.innerHTML);
}
const change = (e) => {
	document.querySelector("h1").innerHTML = "Hello, " + e.target.value + "!";
}