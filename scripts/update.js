renderUpdateForm();
// RENDER DYNAMIC UPDATE FORM
function renderUpdateForm() {
  const productToUpdate = JSON.parse(localStorage.getItem("productToUpdate"));
  const product = productToUpdate[0];

  const containerElement = document.querySelector(".template-container");
  const template = document.querySelector(".update-template");
  const fragment = document.createDocumentFragment();

  const clone = template.content.cloneNode(true);

  clone.querySelector("#input-id").value = product.product_id;
  clone.querySelector("#input-name").value = product.product_name;
  clone.querySelector("#input-price").value = product.price;
  clone.querySelector("#input-quantity").value = product.stock_quantity;

  if (product.is_active === 1) {
    clone.querySelector("#is-active").options[0].text = "Yes";
    clone.querySelector("#is-active").options[0].value = true;

    clone.querySelector("#is-active").options[1].text = "No";
    clone.querySelector("#is-active").options[1].value = false;
    console.log("yes");
  } else {
    clone.querySelector("#is-active").options[0].text = "No";
    clone.querySelector("#is-active").options[0].value = false;

    clone.querySelector("#is-active").options[1].text = "Yes";
    clone.querySelector("#is-active").options[1].value = true;
  }

  fragment.appendChild(clone);

  containerElement.appendChild(fragment);

  // console.log(product);
}

// GET FORM DATA
const updateForm = document.querySelector(".update-form");

updateForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(updateForm);

  const prodDetails = {
    prodId: formData.get("prodId"),
    prodName: formData.get("prodName"),
    prodPrice: formData.get("prodPrice"),
    stockQuantity: formData.get("stockQuantity"),
    isActive: formData.get("isActive"),
  };

  console.log(prodDetails);

  updateProductAPI(prodDetails);
});

export async function updateProductAPI(prodDetails) {
  try {
    const response = await fetch("../pure/updateAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(prodDetails),
    });

    if (!response.ok) {
      throw new Error(`Response failed, status: ${response.status}`);
    }

    const data = await response.json();

    console.log(data);

    window.location.href = "../public/dashboard.public.html";
  } catch (error) {
    console.log(`Failed to fetch server: ${error}`);
  }
}
