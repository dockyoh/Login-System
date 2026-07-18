import { signup } from "./signup.js";
import { login } from "./login.js";
// import { sessionSecurity } from "./userSessions.js";

const signupForm = document.querySelector(".signup-form");
const loginForm = document.querySelector(".login-form");
const isLogedin = JSON.parse(localStorage.getItem("isLogedin"));

if (isLogedin) {
  console.log("hello login");
  window.location.href = "./public/dashboard.public.html";
}

// sessionSecurity();

// SIGNUP FORM
if (signupForm) {
  signupForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(signupForm);

    const username = formData.get("username");
    const password = formData.get("password");
    const confirmPassword = formData.get("confirmPassword");
    const email = formData.get("email");

    signup(username, password, confirmPassword, email);
  });
}

// LOGIN FORM
if (loginForm) {
  loginForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(loginForm);

    const email = formData.get("email");
    const password = formData.get("password");

    login(email, password);
  });
}

// ADD PRODUCT FORM
// if (addForm) {
//   addForm.addEventListener("submit", (e) => {
//     e.preventDefault();

//     const formData = new FormData(addForm);

//     const productDetails = {
//       prodName: formData.get("productName"),
//       prodPrice: formData.get("productPrice"),
//       prodQuantity: formData.get("stockQuantity"),
//     };

//     console.log(productDetails);

//     addProdToAPI(productDetails);
//   });
// }

// if (logoutButton) {
//   logoutButton.addEventListener("click", (e) => {
//     logoutUser();
//   });
// }
