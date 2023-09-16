const urlParams = new URLSearchParams(window.location.search);
const stdID = urlParams.get("stdID");
// Fetch student information using AJAX
fetch(`back.php?stdID=${stdID}`)
  .then((response) => response.json())
  .then((data) => {
    const studentInfo = document.getElementById("student-info");
    studentInfo.innerHTML = `
                    <p><strong>Student ID:</strong> ${data.stdID}</p>
                    <p><strong>Name:</strong> ${data.stdName}</p>
                    <p><strong>Gender:</strong> ${
                      data.stdGender === "M" ? "Male" : "Female"
                    }</p>
                    <p><strong>Fees:</strong> ${data.stdFees}</p>
                    <p><strong>Left College:</strong> ${
                      data.stdLeave === "1" ? "Yes" : "No"
                    }</p>
                `;
  })
  .catch((error) => {
    console.error("Error fetching student data:", error);
  });
