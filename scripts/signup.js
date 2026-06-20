export function signup(username, password, repeatPassword, email) {
  const userDetails = {
    username: username,
    password: password,
    repeatPassword: repeatPassword,
    email: email,
  };

  signupAPI(userDetails);
}

// FETCHING DATA TO SERVER
async function signupAPI(userDetails) {
  try {
    const response = await fetch("pure/signupAPI.pure.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(userDetails),
    });

    const data = await response.json();

    if (response.ok && data.failed) {
      const errorList = [
        data.error.empty,
        data.error.passwordMatch,
        data.error.userTaken,
        data.error.emailTaken,
      ];

      displaySignupResults(errorList);
    }

    if (response.ok && data.success) {
      displaySignupResults(data);
    }
  } catch (error) {
    alert(`failed to connect server ${error}`);
  }
}

// DISPLAY ERRORS FUNCTION
function displaySignupResults(resultsData) {
  let container = document.querySelector(".error-message-container");
  container.innerHTML = "";

  if (resultsData.success) {
    const textContent = `Welcom ${resultsData.user} please login`;
    createAppendElement(container, textContent, true);
  } else {
    resultsData.map((error) => {
      if (error !== false) {
        createAppendElement(container, error);
      }
    });
  }
}

// REUSE ELEMENT CREATOR
function createAppendElement(container, content, success) {
  const pElement = document.createElement("p");

  if (success) {
    pElement.classList.add("success-message");
  } else {
    pElement.classList.add("error-message");
  }

  pElement.textContent = content;

  container.appendChild(pElement);
}
