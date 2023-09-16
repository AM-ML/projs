const frm = document.querySelector('form');

frm.onsubmit = async (e) => {
      e.preventDefault();

      const formData = new FormData(frm);
      const formObject = Object.fromEntries(formData.entries());
      const formJson = JSON.stringify(formObject);

      let response = await fetch('back.php', {
            headers: {
                  'Content-Type': "application/json"
            },
            method: "POST",
            body: formJson
      })
      response = await response.json();
      let {id, msg} = response;
      alert(msg);

      window.location.href = `http://localhost/php5/p8/index.html?empID=${id}`;
}