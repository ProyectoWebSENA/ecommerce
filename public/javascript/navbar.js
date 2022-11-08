const burger = document.getElementById("burger");
const navActionsContainer = document.getElementById("nav-actions-container");
const profileAction = document.getElementById("profile-action");
const mobileProfileActionLinks = document.getElementById(
  "mobile-profile-action-links"
);
const desktopProfileActionLinks = document.getElementById(
  "desktop-profile-action-links"
);
const arrrowDown = document.getElementById("arrow-down");
const arrowUp = document.getElementById("arrow-up");

burger.addEventListener("click", () => {
  burger.classList.toggle("active");
  navActionsContainer.classList.toggle("active");
});

profileAction.addEventListener("click", () => {
  profileAction.classList.toggle("active");
  if (window.innerWidth < 769) {
    mobileProfileActionLinks.classList.toggle("active");
    arrrowDown.classList.toggle("hidden");
    arrowUp.classList.toggle("hidden");
  } else {
    desktopProfileActionLinks.classList.toggle("active");
  }
});

window.addEventListener("resize", () => {
  profileAction.classList.remove("active");
  if (window.innerWidth < 769) {
    desktopProfileActionLinks.classList.remove("active");
  } else {
    mobileProfileActionLinks.classList.remove("active");
  }
});
