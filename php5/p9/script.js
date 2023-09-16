const select = document.querySelector('#select');

const load = async () => {
      select.innerHTML = "<option value='0'>Select an Employee</option>"

      let response = await fetch('back.php');
      response = await response.json();

      response.forEach(emp => {
            let {empID, empName} = emp;

            select.innerHTML += `
                  <option value="${empID}" class="select-option text-capitalize">${empName}</option>
            `
      })

}

load();

document.querySelector('form').onsubmit = async (e) => {
      e.preventDefault();

      let id = document.querySelector('option:checked').value;

      if(id == 0)
            {
                  alert('Select an Employee to Delete.');
                  return false;
            }

      fetch('del.php', {
            headers: {
                  'Content-Type': "application/json"
            },
            method: "POST",
            body: JSON.stringify({'id': id})
      })
      .then (response => response.json())
      .then (response => alert(response))
}