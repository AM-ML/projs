const insertTitle = document.querySelector(".insert-title");
const insertBody = document.querySelector(".insert-body");
const insertAuthor = document.querySelector('.insert-author');

document.querySelector(".insert-form").onsubmit = async (e) => {
      e.preventDefault();

      const response = await fetch("insert.php", {
            headers: {
                  "Content-Type": "application/json"
            },
            method: "POST",
            body: JSON.stringify({'title': insertTitle.value, 'body': insertBody.value, 'author': insertAuthor.value})
      });

      console.log(insertTitle.value, insertBody.value, insertAuthor.value);

      const status = await response.json();

      if(status == 0){
            alert('Insertion unsuccessful.');
            return false;
      }

      alert('Insertion successful.');
 
      loadBlogs();

      return true;
}