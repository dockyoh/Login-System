export function login(email, password) {
  const userDetails = {
    userEmail: email,
    userPassword: password,
  };

  fetchLoginData(userDetails);
}

async function fetchLoginData(userDetails) {
  try {
    const response = await fetch("pure/loginAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(userDetails),
    });

    const data = await response.json();

    if (response.ok && data.empty) {
      const emptyError = [data.error.empty];

      renderLoginErrors(emptyError);
    }

    if (response.ok && data.invalidUser) {
      const invalidErrorList = [
        data.error.invalidEmail,
        data.error.invalidPassword,
      ];

      renderLoginErrors(invalidErrorList);
    }

    if (response.ok && data.success) {
      window.location = "public/dashboard.public.php";
      console.log(data.user);
    }
  } catch (error) {
    alert("FAILED TO FETCH SERVER! ".error);
  }
}

function renderLoginErrors(errorList) {
  const container = document.querySelector(".error-message-container");

  container.innerHTML = "";

  errorList.map((error) => {
    if (error !== false) {
      const pElement = document.createElement("p");

      pElement.classList.add("error-message");

      pElement.textContent = error;

      container.appendChild(pElement);
    }
  });
}
