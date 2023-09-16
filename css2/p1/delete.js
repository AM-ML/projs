const delContainer = document.querySelector('.del-holder');
const delSearch = document.querySelector('.del-input');

const loadDelete = async () => {
      const response = await fetch("deleteLoad.php");
      let blogs = await response.json();

      if(delSearch.value.length > 0) {
            let val = delSearch.value;

            blogs = blogs.filter(blog => blog.blogID.toLowerCase().includes(val) || blog.blogTitle.toLowerCase().includes(val));
      }

      delContainer.innerHTML = "";

      blogs.forEach(blog => {
            let {blogID, blogTitle} = blog;

            delContainer.innerHTML += `
                  <div class="container del-blog shadow-lg">
                        <span class="span del-id">${blogID}</span>
                        <button class="btn btn-lg btn-danger del-btn" value="${blogID}" onclick="blogDel(event)">Delete</button>
                        <h3 class="header del-title">${blogTitle}</h3>
                  </div>
            `
      })
}


const blogDel = async (e) => {
      const id = e.target.value;
      
      const response = await fetch("delete.php", {
            headers: {
                  "Content-Type": "application/json"
            },
            method: "POST",
            body: JSON.stringify({'id': id})
      });
      const status = await response.json();

      if(status == 0) {
            alert('Deletion unsuccessfull');
            return false;
      }

      alert("Deletion successful");
      return true;
}