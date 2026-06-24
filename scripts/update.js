updateForm();

function updateForm() {
  const productToUpdate = JSON.parse(localStorage.getItem("productToUpdate"));
  console.log(productToUpdate);
}

export async function updateProductAPI(id) {
  try {
    prodDetails = {
      prodId: id,
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
