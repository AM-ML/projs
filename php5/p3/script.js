const container = document.querySelector('.container');


const load = async () => {
      const response = await fetch('https://jsonplaceholder.typicode.com/todos');
      const data = await response.json();

      data.forEach(piece => {
            const {userId, id, title, completed} = piece

            if(container != null)
                  container.innerHTML += `
                        <div class="todo">
                              <span className="id">
                                    ${id}
                              </span>
                              <h1 class="title">
                                    ${title}
                              </h1>
                              <small class="comp">
                                    Completed: ${completed}
                              </small>
                        </div>
                  `
      })
}