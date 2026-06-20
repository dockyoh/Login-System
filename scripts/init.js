import { signup } from "./signup.js";

const signupForm = document.querySelector(".signup-form");

signupForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(signupForm);

  const username = formData.get("username");
  const password = formData.get("password");
  const confirmPassword = formData.get("confirmPassword");
  const email = formData.get("email");

  signup(username, password, confirmPassword, email);
});
