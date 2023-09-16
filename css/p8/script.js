const div = document.querySelector(".jaja");
const alerts = document.querySelector(".alerts");
const area = document.querySelector(".press-area");
const circle = document.querySelector(".circle");
const h4 = document.querySelector("h4");
let i = 0;

div.style.display = "none";

circle.addEventListener("click", function () {
  if (div.style.display == "none") div.style.display = "block";
  else div.style.display = "none";

  i++;

  h4.style.display = "none";
  alerts.style.display = "none";
  area.classList.remove("delayed-area");
  circle.classList.remove("delayed-circle");
  document.body.style.backgroundColor = "#F0F0F0";
});

setTimeout(function () {
  if (i == 0) {
    alerts.style.display = "block";
    area.classList.add("delayed-area");
    circle.classList.add("delayed-circle");
    document.body.style.backgroundColor = "#0F0F0F";
  }
  
}, 4000);
