const load = async () => {
      let search = document.querySelector('#search').value;
  const gender = document.querySelector(`input[name="gender"]:checked`).value;

  const response = await fetch('back.php');
  let emps = await response.json();

  if (gender !== "A") {
    emps = emps.filter(emp => emp.empGender === gender);
  }

  if (search.length > 0) {
    emps = emps.filter(emp =>
      emp.empID.toLowerCase().startsWith(search.toLowerCase()) ||
      emp.empName.toLowerCase().includes(search.toLowerCase()) ||
      emp.empSal.toString().toLowerCase().startsWith(search.toLowerCase())
    );
  }

  const tb = document.querySelector('.tbody');
  tb.innerHTML = "";

  emps.forEach(emp => {
    let { empID, empName, empGender, empSal } = emp;

    empSal = Number(empSal);

    tb.innerHTML += `
      <td class="text-end">${empID}</td>
      <td class="text-start">${empName}</td>
      <td class="text-end">${empSal.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
      })}</td>
    `;
  });

  let totalS = emps.reduce((x, y) => x + Number(y.empSal), 0);
  let total = document.querySelector('.total');
  total.innerHTML = totalS.toLocaleString('en-US', {
      style: 'currency',
      currency: 'USD',
    });

  document.querySelector('.caption').innerHTML = `Results Shown: ${emps.length} Row/Rows`
}

load();
