function onload() {
  let arrow = document.querySelector(".mobile-menu .icon");
  let mbMenu = document.querySelector(".mobile-menu");
  let profileImg = document.querySelector(".panel .dashboard .header .profile");
  let profileSettings = document.querySelector(
    ".panel .dashboard .header .profile .profile-settings"
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
      profileSettings.style.height = "145px";
    } else if (
      document.body.contains(event.target) &&
      !profileImg.contains(event.target)
    ) {
      profileSettings.style.height = "0px";
    }
  });
}
