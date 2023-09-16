const dayOrNight = document.querySelectorAll(".tell");
const hour_top = document.querySelector(".hour-top");
const hour_bottom = document.querySelector(".hour-bottom");
const minute_top = document.querySelector(".minute-top");
const minute_bottom = document.querySelector(".minute-bottom");

const load = async () => {
      const response = await fetch("time.php");

      const data = await response.json();

      let {tell, hour, minute} = data;

      hour_top.innerHTML = hour_bottom.innerHTML = hour;
      minute_top.innerHTML = minute_bottom.innerHTML = minute;
      dayOrNight.forEach(don => {
            don.innerHTML = tell;
      })
}

window.setInterval(load, 1000);