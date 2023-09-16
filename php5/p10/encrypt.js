const registerForm = document.querySelector('.register');

registerForm.onsubmit = async (e) => {
    e.preventDefault()

    let formData = new FormData(registerForm)
    let formObject = Object.fromEntries(formData.entries())
    let formJson = JSON.stringify(formObject)

    let response = await fetch('encrypt.php', {
        headers: {
            "Content-Type": "application/json"
        },
        method: "POST",
        body: formJson
    })

    alert("Registration successful!");
    
    document.querySelector("#login-section").click()
}