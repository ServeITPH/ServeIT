document.addEventListener("DOMContentLoaded", function () {
  var isLight = localStorage.getItem("isLight") === "false" ? false : true;
  toggleDarkModeUI(isLight);

  var btn = document.querySelector(".dark-mode-toggle");
  if (btn) {
    btn.onclick = function () {
      toggleDarkMode();
    };
  }
});

function toggleDarkMode() {
  var isLight = localStorage.getItem("isLight") === "false" ? false : true;
  var newMode = !isLight;
  localStorage.setItem("isLight", newMode);
  toggleDarkModeUI(newMode);
}

function toggleDarkModeUI(isLight) {
  var body = document.body;
  var container1 = document.getElementById("container1");
  var btn = document.querySelector(".dark-mode-toggle");
  var modeIcon = document.getElementById("mode-icon");

  if (!isLight) {
    body.classList.add("dark-mode");
    body.style.backgroundColor = "black";
    body.style.color = "white";
    if (container1) {
      container1.style.backgroundColor = "black";
      container1.style.color = "white";
    }
    if (btn) {
      btn.innerHTML =
        '<i id="mode-icon" class="fa-solid fa-sun"></i> Light Mode';
    }
    if (modeIcon) {
      modeIcon.classList.remove("fa-moon");
      modeIcon.classList.add("fa-sun");
    }
  } else {
    // Switch to light mode
    body.classList.remove("dark-mode");
    body.style.backgroundColor = "white";
    body.style.color = "black";
    if (container1) {
      container1.style.backgroundColor = "rgb(255, 255, 255)";
      container1.style.color = "black";
    }
    if (btn) {
      btn.innerHTML =
        '<i id="mode-icon" class="fa-solid fa-moon"></i> Dark Mode';
    }
    if (modeIcon) {
      modeIcon.classList.remove("fa-sun");
      modeIcon.classList.add("fa-moon");
    }
  }
}
