const load = async () => {
	const response = await fetch("conn.php");
	let blogs = await response.json();

	const elemB = document.querySelector("body")

	blogs.forEach(blog => {
		const {blogID, blogTitle, blogBody, blogAuthor} = blog;

		elemB.innerHTML += `

			<div class="blog">
				<span class="id">${blogID}</span>
				<h3 class="title">${blogTitle}</h3>
				<p class="body">${blogBody}</p>
				<small class="author text-capitalize">&nbsp;&nbsp;&nbsp;<i>-${blogAuthor}</i></small>
			</div>
		`

	});
};
load();