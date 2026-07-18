import { logoutUser } from "./logout.js";
import { sessionSecurity } from "./userSessions.js";

sessionSecurity();

const addForm = document.querySelector(".add-form");

// ADD PRODUCT FORM
addForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(addForm);

  const productDetails = {
    prodName: formData.get("productName"),
    prodPrice: formData.get("productPrice"),
    prodQuantity: formData.get("stockQuantity"),
  };

  console.log(productDetails);

  addProdToAPI(productDetails);
});

document.querySelector(".logout-button").addEventListener("click", (e) => {
  logoutUser();
});

export async function addProdToAPI(productDetails) {
  try {
    const response = await fetch("../pure/addAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(productDetails),
    });

    if (!response.ok) {
      throw new Error(`Fetch error: ${response.status}`);
    }

    const addData = await response.json();

    if (response.ok && addData.ok) {
      renderAddNotification(addData.errors);
    } else {
      renderAddNotification(addData.errors);
    }
  } catch (error) {
    console.error(`FAILED TO FETCH addData: ${error}`);
  }
}

function renderAddNotification(errors) {
  let container = document.querySelector(".add-error-container");
  container.innerHTML = "";
  const errorList = [
    errors.empty,
    errors.numericQuantity,
    errors.numericPrice,
    errors.positiveNum,
    errors.prodIsTaken,
    errors.added,
  ];

  errorList.forEach((error) => {
    const pElement = document.createElement("p");

    pElement.classList.add(".error-notification");

    pElement.textContent = error;

    container.appendChild(pElement);

    console.log(error);
  });
}
