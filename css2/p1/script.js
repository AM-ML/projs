rm();
listen();

document.addEventListener("DOMContentLoaded", function(){
  // Add JavaScript to manually control the navigation bar state
  document.addEventListener("DOMContentLoaded", function () {
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navbarCollapse = document.querySelector(".navbar-collapse");

    navbarToggler.addEventListener("click", function () {
      // Toggle the 'show' class to control visibility
      if (navbarCollapse.classList.contains("show")) {
        navbarCollapse.classList.remove("show");
      } else {
        navbarCollapse.classList.add("show");
      }
    });
  });

      document.querySelector("#view").style.display = "block";
      loadBlogs();
      loadSelect();
      loadDelete();
})

