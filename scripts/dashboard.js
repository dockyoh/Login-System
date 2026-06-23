import { deleteProduct } from "./products.js";

dashboard();

// FETCH PRODUCTS FROM DATABASE
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

// RENDER PRODUCTS LIST
function renderProducts(products) {
  const container = document.querySelector(".product-list");
  const template = document.querySelector(".product-list-template");
  const fragment = document.createDocumentFragment();

  products.forEach((product) => {
    const clone = template.content.cloneNode(true);

    clone.querySelector(".prod-name").textContent = product.product_name;
    clone.querySelector(".prod-price").textContent = product.price;
    clone.querySelector(".prod-quantity").textContent = product.stock_quantity;
    clone.querySelector(".prod-is-active").textContent = product.is_active;
    clone.querySelector(".prod-created-at").textContent = product.created_at;

    clone.querySelector(".delete-button").dataset.prodId = product.product_id;
    clone.querySelector(".update-button").dataset.prodId = product.product_id;

    fragment.appendChild(clone);
  });
  container.appendChild(fragment);
}

// DELETE PRODUCT
document.querySelector(".product-list").addEventListener("click", (event) => {
  if (event.target.classList.contains("delete-button")) {
    const id = event.target.closest(".delete-button").dataset.prodId;
    console.log(`dashboard.js ID: ${id}`);

    deleteProduct(id);
    event.target.closest(".product-item").remove();
  }
});
