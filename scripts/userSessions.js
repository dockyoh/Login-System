export async function sessionSecurity() {
  try {
    const response = await fetch("../pure/sessionSecurityAPI.pure.php", {
      headers: { "Content-Type": "application/json" },
    });

    if (!response.ok) {
      throw new Error(`Failed to fetch data, status: ${response.status}`);
    }

    const session = await response.json();

    if (!session.ok) {
      window.location.href = "../index.html";
    } else {
      renderLogedUser(session.user);
    }
  } catch (error) {
    console.error(`Failed to fetch data: ${error}`);
  }
}

function renderLogedUser(user) {
  console.log(user);
}
