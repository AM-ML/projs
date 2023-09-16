const urlParams = new URLSearchParams(window.location.search);
const empID = urlParams.get("empID");
// Fetch student information using AJAX
fetch(`back.php?empID=${empID}`)
  .then((response) => response.json())
  .then((data) => {
    const empInfo = document.getElementById("emp-info");
    empInfo.innerHTML = `
                    <p><strong>Employee ID:</strong> ${data.empID}</p>
                    <p><strong>Name:</strong> ${data.empName}</p>
                    <p><strong>Gender:</strong> ${
                      data.empGender === "M" ? "Male" : "Female"
                    }</p>
                    <p><strong>Salary:</strong> ${data.empSal}</p>
                `;
  })
  .catch((error) => {
    console.error("Error fetching Employee data:", error);
  });
