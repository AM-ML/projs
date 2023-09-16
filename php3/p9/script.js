const load = async () => {
	const response = await fetch("db.php");
	let blogs = await response.json();


	const body = document.querySelector(".cont");

	body.innerHTML = "";

	const target = document.querySelector(".search").value;

	if (target.length != 0){
		blogs = blogs.filter(blog => 
			blog.blogTitle.toLowerCase().includes(target.toLowerCase())
					||
			String(blog.blogID).includes(String(target))
					||
			blog.blogAuthor.toLowerCase().includes(target.toLowerCase())
			);
	}


	blogs.forEach(blog => {
		const {blogID, blogTitle, blogBody, blogAuthor} = blog;

		body.innerHTML += `
			<div class="blog">
				<span class="id">${blogID}</span>
				<h3 class="title">${blogTitle}</h3>
				<p class="body">${blogBody}</p>
				<small class="author"><b>-${blogAuthor}</b></small>
			</div>
		`
	})
}
load();