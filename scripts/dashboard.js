async function dashboard() {
  try {
    const response = await fetch("../pure/productsAPI.pure.php");

    if (!response.ok) {
      throw new Error(`http error status: ${response.status}`);
    }

    const products = await response.json();

    renderProducts(products);
  } catch (error) {
    console.error("failed to fetch server ", error);
  }
}

function renderProducts(products) {
  const list = document.querySelector(".product-list");
  const template = document.querySelector(".product-list-template");
  const fragment = document.createDocumentFragment();

  products.forEach((product) => {
    const clone = template.content.cloneNode(true);

    clone.querySelector(".prod-name").textContent = product.name;
    clone.querySelector(".prod-price").textContent = product.price;
    clone.querySelector(".prod-quantity").textContent = product.quantity;
    clone.querySelector(".prod-is-active").textContent = product.isActive;
    clone.querySelector(".prod-created-at").textContent = product.createdAt;

    fragment.appendChild(clone);
  });
  list.appendChild(fragment);
}

dashboard();
