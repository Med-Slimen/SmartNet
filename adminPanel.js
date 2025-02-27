function onload() {
  let arrow = document.querySelector(".mobile-menu .icon");
  let mbMenu = document.querySelector(".mobile-menu");
  let profileImg = document.querySelector(".header .profile");
  let profileSettings = document.querySelector(
    ".header .profile .profile-settings"
  );
  document.addEventListener("click", function (event) {
    if (mbMenu.contains(event.target)) {
      mbMenu.style.height = "280px";
    } else if (
      document.body.contains(event.target) &&
      !mbMenu.contains(event.target)
    ) {
      mbMenu.style.height = "40px";
    }
    if (profileImg.contains(event.target)) {
      profileSettings.style.height = "160px";
      profileSettings.style.padding = "5px";
    } else if (
      document.body.contains(event.target) &&
      !profileImg.contains(event.target)
    ) {
      profileSettings.style.height = "0px";
      profileSettings.style.padding = "0px";
    }
  });
}
function showConf(idEvent) {
  document.getElementById("delete-conf").style.visibility = "visible";
  document.getElementById("delete-conf").style.transform =
    "scale(1) translate(-50%,-50%)";
  document.getElementById("delete-conf").style.opacity = "1";
  let yes = document.getElementById("idEvent");
  let no = document.getElementById("no");
  yes.setAttribute("value", idEvent);
  document.addEventListener("click", (event) => {
    if (no.contains(event.target)) {
      document.getElementById("delete-conf").style.visibility = "hidden";
      document.getElementById("delete-conf").style.transform =
        "scale(0.6) translate(-50%,-50%)";
      document.getElementById("delete-conf").style.opacity = "0";
      yes.setAttribute("value", "");
    }
  });
}
function showAddEvent() {
  let addEvent = document.querySelector(".add-event");
  addEvent.style.visibility = "visible";
  addEvent.style.transform = "scale(1) translate(-50%,-50%)";
  addEvent.style.opacity = "1";
}
function hideAddEvent() {
  let addEvent = document.querySelector(".add-event");
  addEvent.style.visibility = "hidden";
  addEvent.style.transform = "scale(0.6) translate(-50%,-50%)";
  addEvent.style.opacity = "0";
}
function showDash() {
  document.getElementById("dashboard").style.display = "block";
  document.getElementById("events").style.display = "none";
  document.getElementById("donations").style.display = "none";
}
function showEvents() {
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("events").style.display = "block";
  document.getElementById("donations").style.display = "none";
}
function showDonations() {
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("events").style.display = "none";
  document.getElementById("donations").style.display = "block";
}
