const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


function checkPasswords() {
  var password = document.getElementById("mPassword").value; // Get Password value
  var confirmPassword = document.getElementById("confirmPassword").value; // Get Confirm password value
  var passwordError = document.getElementById("passwordError"); 

  if (password !== confirmPassword) {
      passwordError.innerHTML = "Passwords do not match!";
      return false; // Prevent form submission
  } else {
      passwordError.innerHTML = "";
      return true; // Allow form submission
  }
}


