import { signup } from "./signup.js";
import { login } from "./login.js";

const signupForm = document.querySelector(".signup-form");
const loginForm = document.querySelector(".login-form");

signupForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(signupForm);

  const username = formData.get("username");
  const password = formData.get("password");
  const confirmPassword = formData.get("confirmPassword");
  const email = formData.get("email");

  signup(username, password, confirmPassword, email);
});

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(loginForm);

  const email = formData.get("email");
  const password = formData.get("password");

  login(email, password);
});
