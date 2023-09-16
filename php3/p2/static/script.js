const getData = async (url) => {
	const response = await fetch(url)

	.then(async response => {
		let movies = await response.json()
		movies = movies.Search
		return movies;
	})
	.then(movies => {
		const elemc = document.querySelector(".container");
		elemc.innerHTML = "";
		movies.forEach(movie => {
			const {imdbID, Title, Poster, Year, Type} = movie;
			elemc.innerHTML += `
				<div class="movie">
					<h3>${Title}</h3>
					<img src="${Poster}" />
				</div>
			`
		})
	})
	.catch(err => {console.log(err)})
}


const search = (e) => {
	let txt = e.target.value;
	console.log(txt);
	getData(`https://www.omdbapi.com/?apikey=a5f89f0e&s=${txt}`)
}