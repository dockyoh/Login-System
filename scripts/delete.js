export async function deleteProduct(id) {
  try {
    const prodDetails = {
      prodId: id,
    };

    console.log(prodDetails);

    const response = await fetch("../pure/deleteAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(prodDetails),
    });

    if (!response.ok) {
      throw new Error(`Response failed, status: ${response.status}`);
    }
  } catch (error) {
    console.log(`Failed to fetch server: ${error}`);
  }
}
