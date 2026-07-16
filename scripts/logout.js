export async function logoutUser() {
  try {
    const response = await fetch("../pure/logoutAPI.pure.php", {
      headers: { "Content-Type": "application/json" },
    });

    if (!response.ok) {
      throw new Error(`Response failed! Status: ${response.status}`);
    }

    const logout = await response.json();

    if (response.ok && logout.ok) {
      localStorage.clear();
      window.location.href = "../index.html";
    }
  } catch (error) {
    console.log(`failed to fetch logout API: ${error}`);
  }
}
