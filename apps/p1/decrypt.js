const logForm = document.querySelector(".loginForm");

logForm.onsubmit = async (e) => {
    e.preventDefault();
    const formData = new FormData(logForm);
    const formObj = Object.fromEntries(formData.entries());
    const formJson = JSON.stringify(formObj);

    let resp = await fetch("decrypt.php", {
        headers: {
            "Content-Type": "application/json"
        },
        method: "POST",
        body: formJson
    });

    let {stat, msg} = await resp.json();

    if(stat > 0){
        document.querySelector(".openLoginForm").click();
        alert("Login Successful");
        document.querySelector(".click").click();
        localStorage.setItem("username", formJson.username);
    } else {
        alert(msg);
    }
}