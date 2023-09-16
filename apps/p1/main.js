rm();
listen();

document.addEventListener("DOMContentLoaded", function(){
    document.querySelector(".click").click();
    closeNav();



    if(!localStorage.getItem("email")){
        document.querySelector(".openLoginForm").click();
    }
})
function openNav() {
    document.getElementById("sideNav").style.width = "200px";
    document.querySelector(".closebtn").style.display = "block";
}

function closeNav() {
    document.querySelector(".closebtn").style.display = "none";
    document.getElementById("sideNav").style.width = "0";
}
