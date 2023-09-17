const createFrm = document.querySelector(".createForm");
createFrm.onsubmit = async (e) => {
    e.preventDefault();
    
    const formData = new FormData(createFrm);
    const formObj = Object.fromEntries(formData.entries());
    const formJson = JSON.stringify(formObj);

    let resp = await ftch("insert.php", formJson);
    
    let {stat, msg} = resp;
    if(stat > 0){
        alert("Inserted Successfully, data: "+ formJson);
    } else {
        alert(msg);
    }
}