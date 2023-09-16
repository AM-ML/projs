document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.col').forEach(div => {
            div.className = "col bg-primary text-light mx-3 text-center";
      })

      for(i = 1; i <= 12; i++){
            document.querySelectorAll(`.col-${i}`).forEach(div => {
                  div.className = `col-${i} bg-primary text-light text-center`;
            })
      }
})

function que() {
     document.querySelector('.holder').innerHTML = `${document.querySelector("#range").value}`
}