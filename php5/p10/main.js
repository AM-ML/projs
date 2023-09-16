const getInfo = async () => {
    if(localStorage.getItem("email") == null){
        redir(".log-link");
    }

  document.querySelector(".info").innerHTML = `
        <div class="col bg-primary">
            <li class="text-white text-center">Email: ${localStorage.getItem(
              "email"
            )}</li>
        </div>
    `;
};
