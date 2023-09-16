rm();
listen();

document.addEventListener("DOMContentLoaded", function(){
    closeNav();
    
    
    
    if(!localStorage.getItem("username")){
        document.querySelector(".openLoginForm").click();
    } else {
        document.querySelector(".click").click();
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
