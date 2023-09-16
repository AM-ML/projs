const blogsC = document.querySelector(".blogs-holder");
const viewSearch = document.querySelector(".view-sec-input");

const loadBlogs = async () => {
      const response = await fetch("view.php");
      let blogs = await response.json();

      const target = viewSearch.value.toLowerCase(); // Convert the input value to lowercase

      const filteredBlogs = blogs.filter(blog => {
            // Check if any of the blog properties contain the target text
            return (
                  String(blog.blogID).toLowerCase().includes(target) ||
                  blog.blogTitle.toLowerCase().includes(target) ||
                  blog.blogBody.toLowerCase().includes(target) ||
                  blog.blogAuthor.toLowerCase().includes(target)
            );
      });

      blogsC.innerHTML = `<caption class="caption center ms-auto view-cap">Shown: ${filteredBlogs.length} Results.`;
      
      filteredBlogs.forEach(blog => {
            let {blogID, blogTitle, blogBody, blogAuthor} = blog;
            
            blogsC.innerHTML += `
                  <div class="container viewBlog shadow">
                        <span class="viewID">${blogID}</span>
                        <h3 class="viewTitle">${blogTitle}</h3>
                        <p class="viewBody">${blogBody}</p>
                        <small class="viewAuthor">-${blogAuthor}</small>
                  </div>
            `
      })
}

// loadBlogs();