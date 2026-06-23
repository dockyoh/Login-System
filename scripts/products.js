export async function deleteProduct(id) {
  try {
    const prodDetails = {
      prodId: id,
    };

    console.log(`product.js id: ${prodDetails.prodId}`);

    const response = await fetch("../pure/deleteAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(prodDetails),
    });

    if (!response.ok) {
      throw new Error(`Response failed, status: ${response.status}`);
    }

    const data = await response.json();

    console.log(data);
  } catch (error) {
    console.log(`Failed to fetch server: ${error}`);
  }
}
