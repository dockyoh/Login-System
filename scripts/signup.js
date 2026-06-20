export function signup(username, password, repeatPassword, email) {
  const userDetails = {
    username: username,
    password: password,
    repeatPassword: repeatPassword,
    email: email,
  };

  signupAPI(userDetails);
}

async function signupAPI(userDetails) {
  try {
    const response = await fetch("pure/signupAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(userDetails),
    });

    const data = await response.json();

    if (response.ok && data.status === "failed") {
      // console.log(data.message);
      console.log(data.error.empty);
      console.log(data.error.passwordMatch);
      console.log(data.error.userTaken);
      console.log(data.error.emailTaken);
    }

    if (response.ok && data.status === "success") {
      console.log(data.message);
    }
  } catch (error) {
    alert(`failed to connect server ${error}`);
  }
}
