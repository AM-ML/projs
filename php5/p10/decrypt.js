const loginForm = document.querySelector('.login');

loginForm.onsubmit = async (e) => {
    e.preventDefault()

    const loginData = new FormData(loginForm)
    const loginObj = Object.fromEntries(loginData.entries())
    const loginJson = JSON.stringify(loginObj)

    let response = await fetch("decrypt.php", {
        headers: {
            "Content-Type": "application/json"
        },
        method: "POST",
        body: loginJson
    })

    response = await response.json()

    let {id, email, msg} = response;

    
    if(Number(id) == 0){
        alert(msg);
        return;
    }
 
    localStorage.setItem("email", email);

    getInfo();
    document.querySelector(".main-link").click();
}