
let elemS = document.querySelector(".search");

function editRedirect(ID){
  viewEdit(ID);
  document.querySelector(".edit-link").click();
}


const load = async () => {
  let response = await fetch("db.php");
  let stds = await response.json();

  let val = elemS.value;

  val = String(val).toLowerCase();
  let gender = document.querySelector(`input[name="gender"]:checked`).value;

  if(gender != "A"){
    stds = stds.filter(std => std.stdGender == gender);
  }
  if (val.length > 0) {
    stds = stds.filter(
      (std) => std.stdID.includes(val) || std.stdName.toLowerCase().includes(val)
    );
  }




  let container = document.querySelector(".std-Container");

  container.innerHTML = "";
  stds.forEach((std) => {
    let { stdID, stdName, stdGender, stdPay, stdFees } = std;

    stdPay = Number(stdPay);
    stdFees = Number(stdFees);
    stdID = String(stdID);
    let formattedNumber = stdID.substring(0, 4) + "-" + stdID.substring(4);
    container.innerHTML += `
      


          <div class="container row mt-3 py-2">
            <div class="col-10 text-start ms-auto border-start border-top border-dark px-0">
              <button class="btn-sm d-block w-50 btn-success" onclick="editRedirect(${stdID})">
                Edit
              </button>
            </div>

            <div class="col-2 bg-warning text-end border-top border-end border-dark text-light">${formattedNumber} ${stdGender}</div>
            <div class="col-12 border border-dark">&nbsp;</div>

            <div class="col-2 border-top border-start border-dark text-center bg-warning text-light border-bottom  border-end pe-2">Name :</div>
            <div class="col-10  text-start border-top border-dark border-bottom border-end">${stdName}</div>
            <div class="col-2 border-start border-dark  text-center bg-warning text-light border-bottom  border-end pe-2">Payed :</div>

            <div class="col-10 border-dark text-start border-bottom border-end">${stdPay.toLocaleString()} $</div>

            <div class="col-2 border-start border-bottom border-end border-dark text-center bg-warning text-light">Fees : </div>
            <div class="col-10 border-end border-bottom border-dark text-start ">${stdFees.toLocaleString()} $</div>
            
            
            <div class="col-2 border-start border-bottom border-dark  text-center bg-warning text-light border-end pe-2">Rem &nbsp;&nbsp;:</div>
            <div class="col-10 border-bottom border-end border-dark text-start">${(
              stdFees - stdPay
            ).toLocaleString()} $</div>
        </div>
        `;
  });
};

load();
