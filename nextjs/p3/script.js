const element = (
	<nav>
		<img src="../src/apple-touch-icon.png" width="102" />
		<li><a href="#" value="#home">Home</a></li>
		<li><a href="#" value="#pricing">Pricing</a></li>
		<li><a href="#" value="#about">About</a></li>
		<li><a href="#" value="#contact">Contact</a></li>
	</nav>
)
const container = document.querySelector("#root");

console.log(element);
ReactDOM.render(element, container);

rm(); // these are predefined functions in another script file
listen(); // these are predefined functions in another script file

let home = document.querySelector("#home");
home.style.display = "block";
home.click();


let factsContainer = document.querySelector(".facts");

const getFacts = async () => {
	const response = await fetch("facts.json");
	const facts = await response.json();
	facts.forEach(arr => {
		let {fact} = arr;
		let content;
		content = (
			<div className="fact">
				<h1>{fact}</h1>
			</div>
		)
		ReactDOM.render(content, factsContainer);
	})
}
getFacts();