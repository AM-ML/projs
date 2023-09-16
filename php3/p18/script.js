const output = document.querySelector(".figure");
const breaker = 5;
let int = 500;
let prevN = null;

const setrand = async () => {
	const response = await fetch("index.php");
	const randint = await response.json();

	if(int % breaker == 0) {
		output.innerHTML += "<br>";
	}

	output.innerHTML += `<h1 class="inline">${randint}</h1>`;

	document.querySelectorAll(".inline").forEach(element => {
		element.addEventListener('click', () => {
			const content = element.innerHTML;
			copyToClipboard(content);
			showCopiedPopup(content);
		});
	});

	function copyToClipboard(text) {
		const tempTextArea = document.createElement('textarea');
		tempTextArea.value = text;
		document.body.appendChild(tempTextArea);
		tempTextArea.select();
		document.execCommand('copy');
		document.body.removeChild(tempTextArea);
	}

	function showCopiedPopup(text) {
		const popup = document.createElement('div');
		popup.className = 'popup';
		popup.textContent = 'Copied '+text+'!';
		document.body.appendChild(popup);
		setTimeout(() => {
			popup.style.opacity = '1';
		}, 10);
		setTimeout(() => {
			popup.style.opacity = '0';
			setTimeout(() => {
				document.body.removeChild(popup);
			}, 500);
		}, 2000);
	}

	if(prevN !== null && prevN == randint){
		clearInterval(interv);
		alert("Matching Numbers Found! Stopping Loop.")
	} else {
		prevN = randint;
	}

	int += 1;
}

const interv = setInterval(function(){
	setrand();
}, 200)	
