export function signup(username, password, confirmPassword, email) {
  const userDetails = {
    username: username,
    pwd: password,
    conPass: confirmPassword,
    email: email,
  };

  regUser(userDetails);
}

async function regUser(userDetails) {
  try {
    const response = await fetch("pure/signupAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(userDetails),
    });

    const data = await response.json();

    if (response.ok && data.status === "success") {
      console.log(data.user.username);
      console.log(data.user.password);
      console.log(data.user.confirmPass);
      console.log(data.user.email);
    } else {
      alert("Error" + data.message);
    }
  } catch (error) {
    console.log("connection failed ", error);
    alert("Could not reach the backend server");
  }
}
