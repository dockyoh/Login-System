updateForm();

function updateForm() {
  const productToUpdate = JSON.parse(localStorage.getItem("productToUpdate"));
  const product = productToUpdate[0];

  const containerElement = document.querySelector(".template-container");
  const template = document.querySelector(".update-template");
  const fragment = document.createDocumentFragment();

  const clone = template.content.cloneNode(true);

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
    console.log("no");
  }

  fragment.appendChild(clone);

  containerElement.appendChild(fragment);

  console.log(product);
}

export async function updateProductAPI(productId) {
  try {
    prodDetails = {
      prodId: productId,
      update: true,
    };

    const response = await fetch("../pure/deleteUpdateAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(prodDetails),
    });

    if (!response.ok) {
      throw new Error(`Response failed, status: ${response.status}`);
    }

    const data = await response.json();
  } catch (error) {
    console.log(`Failed to fetch server: ${error}`);
  }
}
