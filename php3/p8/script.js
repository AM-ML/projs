const load = async () => {
  const response = await fetch("conn.php");
  stds = await response.json();
  const elemB = document.querySelector(".tbody");
  const elemT = document.querySelector(".rem");
  const elemP = document.querySelector(".pay");
  const elemF = document.querySelector(".fees");
  const elemC = document.querySelector(".cap");
  const target = document.querySelector(".search").value;

  if (target.length != 0) {
    stds = stds.filter(
      (std) =>
        std.stdName.toLowerCase().includes(target.toLowerCase()) ||
        String(std.stdID).includes(String(target))
    );
  }

  elemB.innerHTML = "";

  const radio = document.querySelector("input[name=gender]:checked");
  const gender = radio.value;

  if (gender != "A") {
    stds = stds.filter((std) => std.stdGender == gender);
  }

  stds.forEach((std) => {
    let { stdID, stdName, stdGender, stdFees, pay } = std;

    stdFees = Number(stdFees);
    pay = Number(pay);
    elemB.innerHTML += `
            <tr>
                <td class="text-end">${stdID}</td>
                <td class="text-start text-capitalize">${stdName}</td>
                <td class="text-start">${
                  stdGender == "M" ? "Male" : "Female"
                }</td>
                <td class="text-center">${stdFees.toLocaleString("en-US", {
                  style: "currency",
                  currency: "USD",
                })}</td>
                <td class="text-center">${pay.toLocaleString("en-US", {
                  style: "currency",
                  currency: "USD",
                })}</td>
                <td class="text-end">${Math.abs(stdFees - pay).toLocaleString(
                  "en-US",
                  { style: "currency", currency: "USD" }
                )}</td>
            </tr>
        `;
  });

  let rem = stds.reduce(
    (acc, std) => acc + Math.abs(Number(std.stdFees)) - Number(std.pay),
    0
  );
  elemT.innerHTML = rem.toLocaleString("en-US", {
    style: "currency",
    currency: "USD",
  });

  let fees = stds.reduce((x, y) => x + Number(y.stdFees), 0);
  elemF.innerHTML = fees.toLocaleString("en-US", {
    style: "currency",
    currency: "USD",
  });

  let pay = stds.reduce((x, y) => x + Number(y.pay), 0);
  elemP.innerHTML = pay.toLocaleString("en-US", {
    style: "currency",
    currency: "USD",
  });

  elemC.innerHTML = `There ${stds.length} students in the table.`;
};

load();
