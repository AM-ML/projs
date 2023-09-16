const frm = document.querySelector('form');

frm.onsubmit = async (e) => {

      e.preventDefault();

      const formData = new FormData(frm);
      const formObject = Object.fromEntries(formData);
      const formJson = JSON.stringify(formObject);

      let response = await fetch('back.php', {
            headers: {
                  'Content-Type': "json/application"
            },
            method: "POST",
            body: formJson
      })

      response = await response.json();

      alert(response.msg);
      
      window.location.href = `http://localhost/php5/p5/index.html?stdID=${response.id}`
}