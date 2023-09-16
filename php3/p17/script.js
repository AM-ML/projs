const showdate = async () => {
	const response = await fetch("index.php");

	const rawdata = await response.json();

	console.log(rawdata);
}
showdate();