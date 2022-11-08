const burger = document.getElementById("burger");
const navActionsContainer = document.getElementById("nav-actions-container");
const profileAction = document.getElementById("profile-action");
const profileActionLinks = document.getElementById("profile-action-links");
const arrrowDown = document.getElementById("arrow-down");
const arrowUp = document.getElementById("arrow-up");

burger.addEventListener("click", () => {
  burger.classList.toggle("active");
  navActionsContainer.classList.toggle("active");
});

profileAction.addEventListener("click", () => {
  profileAction.classList.toggle("active");
  profileActionLinks.classList.toggle("active");
  arrrowDown.classList.toggle("hidden");
  arrowUp.classList.toggle("hidden");
});
