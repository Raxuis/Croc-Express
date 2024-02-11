let validEmailRegex =
  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

function verify(confirmPassword = null, confirmPasswordLabel = null) {
  const email = document.getElementById("email");
  const emailLabel = document.getElementById("email-label");
  emailLabel.style.transition = "0.3s";
  const password = document.getElementById("password");
  const passwordLabel = document.getElementById("password-label");
  passwordLabel.style.transition = "0.3s";
  const submit = document.getElementById("submit");
  email.addEventListener("input", (e) => {
    submit.hidden = true;
    if (!e.target.value.match(validEmailRegex)) {
      emailLabel.textContent = "Entrez une adresse mail valide";
      emailLabel.style.color = "red";
      email.style.color = "red";
    } else {
      emailLabel.textContent = "Email valide";
      emailLabel.style.color = "";
      email.style.color = "";
    }
  });
  password.addEventListener("input", (e) => {
    submit.hidden = true;
    if (e.target.value.length < 8) {
      passwordLabel.textContent =
        "Votre mot de passe doit contenir au moins 8 caractères";
      passwordLabel.style.color = "red";
      password.style.color = "red";
    } else {
      passwordLabel.textContent = "Mot de passe valide";
      passwordLabel.style.color = "";
      password.style.color = "";
      if (!(confirmPassword && confirmPasswordLabel)) {
        submit.hidden = !email.value.match(validEmailRegex);
      }
    }
  });
  if (confirmPassword && confirmPasswordLabel) {
    confirmPassword.addEventListener("input", (e) => {
      submit.hidden = true;
      if (e.target.value.length < 8) {
        confirmPasswordLabel.textContent =
          "Votre mot de passe doit contenir au moins 8 caractères";
        confirmPasswordLabel.style.color = "red";
        confirmPassword.style.color = "red";
      } else {
        if (password.value !== confirmPassword.value) {
          submit.hidden = true;
          confirmPasswordLabel.textContent =
            "Les mots de passe ne correspondent pas";
          passwordLabel.textContent = "Les mots de passe ne correspondent pas";
          confirmPasswordLabel.style.color = "red";
          confirmPassword.style.color = "red";
          password.style.color = "red";
          passwordLabel.style.color = "red";
        } else {
          confirmPasswordLabel.textContent = "Les mots de passe correspondent";
          passwordLabel.textContent = "Les mots de passe correspondent";
          confirmPasswordLabel.style.color = "";
          confirmPassword.style.color = "";
          password.style.color = "";
          passwordLabel.style.color = "";
          submit.hidden = false;
        }
      }
    });
  }
}
