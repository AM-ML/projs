const updateC = document.querySelector(".update-container");
let updateSearchs = document.querySelector('.usi');
let updateSearch;
const loadSelect = async () => {
      updateC.innerHTML = "";
      
    const response = await fetch('loadSelect.php');
    let blogs = await response.json();

    if(updateSearchs.length != 0) {
      updateSearch = updateSearchs.value.toLowerCase();
      blogs = blogs.filter(blog => blog.blogID.toLowerCase().includes(updateSearch) || blog.blogTitle.toLowerCase().includes(updateSearch))
    }
    console.log(updateSearch);

    blogs.forEach(blog => {
        let { blogID, blogTitle } = blog;

        updateC.innerHTML += `
            <div class="update-blog shadow-lg">
                <button type="button" value="${blogID}" onclick="updateBlog(event)" class="btn btn-lg btn-primary update-btn disabled">
                    update
                </button>

                <button type="button" value="${blogID}" onclick="editBlog(event)" class="btn btn-lg btn-primary update-editbtn">
                    Edit
                </button>

                <span class="update-id-text">${blogID}</span>
                <textarea class="form-input form-control update-title bg-primary disabled" cols="20" rows="5" value="${blogID}" onkeyup="changeUpdateDisabled(event)" spellcheck="false"> ${blogTitle}</textarea>
            </div>
        `;
    })
}

function changeUpdateDisabled(e){
      document.querySelectorAll('.update-btn').forEach(btn => {
            if(btn.value == e.target.getAttribute('value'))
                  btn.classList.remove('disabled');
      })
}

function editBlog(e) {
      const clickedButtonValue = e.target.value;
      const textareas = document.querySelectorAll('.update-title');
      let targetTextarea = '';
      textareas.forEach(textarea => {
          textarea.classList.add('disabled'); // Disable all textareas
          if(textarea.getAttribute('value') == e.target.value) {
            targetTextarea = textarea;
          }
      });
      document.querySelectorAll('.update-btn').forEach(btn => {
            btn.classList.add('disabled');
      })
      if (targetTextarea) {
          targetTextarea.classList.remove('disabled'); // Remove the 'disabled' class from the specific textarea
          targetTextarea.focus = true;
      }
  }


function get_title(target){
      let titles = document.querySelectorAll('.update-title');
      
      titles.forEach(title => {
            if (title.getAttribute('value') == target)
                  {return title;}
      })
}

const updateBlog = async (e) => {
      let title;
      document.querySelectorAll('.update-title').forEach(titling => {
            if(titling.getAttribute('value') == e.target.value) {
                  title = titling.value
            }
      })

      const response = await fetch('update.php', {
            headers: {
                  'Content-Type': "application/json"
            },
            method: "POST",
            body: JSON.stringify({'id': e.target.value, 'title': title})
      });

      const status = await response.json();

      if(status == 0) {
            alert('Update unsuccessful.');
            return false;
      }

      loadBlogs();

      alert('Update successful.');
      return                 true;
}