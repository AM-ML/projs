function rm(){
	document.querySelectorAll("section").forEach(section => {
		section.style.display = "none";
	})

      document.querySelectorAll('a').forEach(li => {
            li.style.textDecoration = 'none';
            li.style.color = "#333f"
      });
}

function listen() {
	document.querySelectorAll("a").forEach(ahref => {
		ahref.addEventListener("click", function() {
			let val = ahref.getAttribute("value");
			if(val == null)
				return false;
			rm();
			document.querySelector(val).style.display="block";
                  ahref.style.textDecoration = 'overline';
                  ahref.style.color = "#333a";
		});
	})
}

rm();
listen();


document.querySelector('.link-appet').click();