const editC = document.querySelector(".editContainer");

const viewEdit = async (ID) => {
  const response = await fetch("edit.php", {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify({ id: ID }),
  });

  const std = await response.json();

  let { stdName, stdFees, stdGender } = std[0];
  editC.innerHTML = `
   <div class="container mt-3 m-auto w-75">
			<form class="form editForm">
				<fieldset class="p-5 border border-dark">
					<legend style="all: initial; font-family: 'League Spartan';">Edit Student: ${ID}</legend>

                    <div class="float-end">
                        <button class="btn btn-danger float-end" type="button" onclick="delStd(${ID})">Delete</button>
                    </div>
						<input type="text" class="form-control" name="name" autocomplete="off" id="eName" placeholder="Student Name" value="${stdName}">
                    <div style="margin-bottom: 1rem;"></div>
                    <div class="mt-2 input-group">
                        <span class="input-group-text fas fa-plus"></span>
						<input type="number" name="payment" placeholder="Add Student Payment" id="ePay" class="form-control d-inline w-50">
					</div>
                    <div class="mtp"></div>
					<div class="d-inline input-group">
                        <span class="input-group-text fas fa-plus"></span>
						<input type="number" name="fees" placeholder="Add Student Fees" id="eFees" class="form-control d-inline w-50">
					</div>

                    <input class="d-none" name="originalFees" value="${Number(
                      stdFees
                    )}">
                    <input class="d-none" name="originalID" value="${Number(
                      ID
                    )}">
                    <input name="egender" value="${stdGender}" class="d-none">

					<button type="submit" class="btn d-block btn-dark ms-5 float-end">Submit</button>
				</fieldset>
			</form>
		</div>
   `;
  let editFRM = document.querySelector(".editForm");

  editFRM.onsubmit = async (e) => {
    e.preventDefault();

    const formData = new FormData(editFRM);
    const formObj = Object.fromEntries(formData.entries());
    const formJson = JSON.stringify(formObj);

    /* {
            "name":     "Ali Abdallah",
            "payment":            "11",
            "fees":                "1",
            "egender":             "M",
            "originalFees":     "90000"
        } */

    const resp = await fetch("modify.php", {
      headers: {
        "Content-Type": "application/json",
      },
      method: "POST",
      body: formJson,
    });

    document.querySelector(".click").click();
  };
};

const delStd = async (ID) => {
  let resp = window.confirm("Are you sure you want to delete this Student?");
  if (!resp) return;
  resp = await fetch("del.php", {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify({ id: ID }),
  });

  if (resp == 0) alert("Unsuccessful deletion");
  else alert("Deletion Successful");

  document.querySelector(".click").click();
};
