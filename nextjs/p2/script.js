function Navbar() {
	return (
		<nav className="nav">
			<li><a href="#" value="#a">A element</a></li>
			<li><a href="#" value="#b">B element</a></li>
			<li><a href="#" value="#c">C element</a></li>
		</nav>
	)
}


function MainContent() {
	return (
		<div>
		<h1 id="a">Hello, A</h1>
		<h1 id="b">Hello, B</h1>
		<h1 id="c">Hello, C</h1>
		</div>
		)
};

ReactDOM.render(
	<div>
	<Navbar />
	<MainContent />
	</div>,
	document.getElementById("root")
	)

listen();