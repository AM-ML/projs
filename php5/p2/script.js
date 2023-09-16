document.querySelector("form").onsubmit = async (e) => {
      e.preventDefault();
      
      const gender = document.querySelector(`input[name="gender"]:checked`).value;

      const name = document.querySelector('#name').value;

      const fees = Number(document.querySelector('#fees').value);

      const resp =  window.confirm('Are you sure you want to add a new student?');

      if(!resp)
            return false;

      const response = await  fetch('back.php', {
            headers: {
                  "Content-Type": "application/json"
            },
            method: "POST",
            body: JSON.stringify({'name': name, 'fees': fees, 'gender': gender})
      })

      const msg = await response.json();

      alert(msg);
}