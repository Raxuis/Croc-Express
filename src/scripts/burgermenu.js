const burgerMenu = document.getElementsByClassName("burger-menu")[0];
const burgerIcon = document.getElementById("burger-icon");
const navMenu = document.getElementsByClassName("nav-menu")[0];
const navLinks = document.querySelectorAll(".nav-links");
let currentState = "notClicked";

function myFunction() {
  burgerMenu.classList.toggle("active");
  navMenu.classList.toggle("active");

  if (currentState === "notClicked") {
    burgerIcon.classList.remove("fa-bars");
    burgerIcon.classList.add("fa-times");
    currentState = "clicked";
  } else {
    burgerIcon.classList.remove("fa-times");
    burgerIcon.classList.add("fa-bars");
    currentState = "notClicked";
  }
}

navLinks.forEach((link) =>
  link.addEventListener("click", () => {
    burgerMenu.classList.remove("active");
    navMenu.classList.remove("active");
  }),
);
