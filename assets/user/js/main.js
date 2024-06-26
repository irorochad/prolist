// Backdrop on all modals - pop up
const backdrop = document.querySelector(".backdrop");

// ENd Backdrop

// Dark Mode

// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
  localStorage.getItem("color-theme") === "dark" ||
  (!("color-theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  document.documentElement.classList.add("dark");
} else {
  document.documentElement.classList.remove("dark");
}

var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Change the icons inside the button based on previous settings
if (
  localStorage.getItem("color-theme") === "dark" ||
  (!("color-theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  themeToggleLightIcon.classList.remove("hidden");
} else {
  themeToggleDarkIcon.classList.remove("hidden");
}

var themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
  // toggle icons inside button
  themeToggleDarkIcon.classList.toggle("hidden");
  themeToggleLightIcon.classList.toggle("hidden");

  // if set via local storage previously
  if (localStorage.getItem("color-theme")) {
    if (localStorage.getItem("color-theme") === "light") {
      document.documentElement.classList.add("dark");
      localStorage.setItem("color-theme", "dark");
    } else {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("color-theme", "light");
    }

    // if NOT set via local storage previously
  } else {
    if (document.documentElement.classList.contains("dark")) {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("color-theme", "light");
    } else {
      document.documentElement.classList.add("dark");
      localStorage.setItem("color-theme", "dark");
    }
  }
});

// End DarkMode Toggle.

// code to show and hide edit password Modal

const showPasswordModal = document.getElementById("passwordBtn");
const editpasswordModal = document.getElementById("editpasswordModal");
const closePasswordModal = document.getElementById("hidepassModal");

if (showPasswordModal) {
  showPasswordModal.addEventListener("click", function () {
    editpasswordModal.style.display = "block";
    backdrop.style.display = "block";
  });
}

if (closePasswordModal) {
  closePasswordModal.addEventListener("click", function () {
    editpasswordModal.style.display = "none";
    backdrop.style.display = "none";
  });
}

// menuBTN.addEventListener("click", () => {

// });

// code to make the project action : to show the actions

const projectActions = document.querySelectorAll("button.pActions");
const thePActionsItems = document.querySelector("#pActionsItem");

if (projectActions) {
  projectActions.forEach((n) =>
    n.addEventListener("click", function () {
      document.getElementById("hidden_post_id").value =
        n.parentElement.getAttribute("id");
      // console.log(n.parentElement);
      // Toggle show and hide the edit,sponser, and remove items on the project
      if (thePActionsItems.style.display == "none") {
        thePActionsItems.style.display = "block";
      } else {
        thePActionsItems.style.display = "none";
      }
    })
  );
}
