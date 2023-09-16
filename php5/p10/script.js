document.addEventListener('DOMContentLoaded', function () {
    rm();
    listen();
    if (isLoggedIn()) {
        redir(".main-link");
    } else {
        document.querySelector('.log-link').click();
    }

    document.querySelector(".log-link").addEventListener("click", function () {
        if (isLoggedIn()) {
            alert("You're already logged in.");
            redir(".main-link");
        }
    });

    document.querySelector(".reg-link").addEventListener("click", function () {
        if (isLoggedIn()) {
            alert("You're already logged in.");
            redir(".main-link");
        }
    });
});

function redir(quer) {
    document.querySelector(quer).click();
}

const logout = async () => {
    try {
        localStorage.removeItem("email");
        const response = await fetch("destroy.php");
        if (response.ok) {
            redir(".log-link");
        } else {
            throw new Error("Logout failed.");
        }
    } catch (error) {
        console.error(error);
    }
};

function isLoggedIn() {
    return !!localStorage.getItem("email");
}

const delAcc = async () => {
    if (!isLoggedIn()) {
        return;
    }
    
    try {
        let email = localStorage.getItem("email");
        const response = await fetch("delete.php", {
            headers: {
                "Content-Type": "application/json",
            },
            method: "POST",
            body: JSON.stringify({ "email": email }),
        });
        if (response.ok) {
            redir(".log-link");
        } else {
            throw new Error("Deletion failed.");
        }
    } catch (error) {
        console.error(error);
    }
};
