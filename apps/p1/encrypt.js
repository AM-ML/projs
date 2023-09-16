const regFrm = document.querySelector(".registerForm");
regFrm.onsubmit = async (e) => {
    e.preventDefault();

    const formData = new FormData(regFrm);
    const formObj = Object.fromEntries(formData.entries());
    const formJson = JSON.stringify(formObj);

    let resp = await fetch("encrypt.php", {
        headers: {
            "Content-Type": "application/json"
        },
        method: "POST",
        body: formJson
    })

    let {stat, msg} = resp.json();
    if(stat != 0){
        document.querySelector(".closeRegisterForm").click();
        alert("Registration Successful");
        document.querySelector(".click").click();
        localStorage.setItem("username", formJson.username)
    } else {
        alert(msg);
    }

}