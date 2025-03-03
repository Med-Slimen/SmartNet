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
function showEditEvent(idEvent) {
  document.getElementById("edit-event").style.visibility = "visible";
  document.getElementById("edit-event").style.transform =
    "scale(1) translate(-50%,-50%)";
  document.getElementById("edit-event").style.opacity = "1";
  let id_event = document.querySelector(".edit-event #idEvent");
  id_event.setAttribute("value", idEvent);
  tr = document.getElementById(idEvent);
  inputs = document.querySelectorAll(".edit-event form .inputs");
  for (let index = 0; index < 4; index++) {}
}
function hideEditEvent() {
  let editEvent = document.querySelector(".edit-event");
  editEvent.style.visibility = "hidden";
  editEvent.style.transform = "scale(0.6) translate(-50%,-50%)";
  editEvent.style.opacity = "0";
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
  document.getElementById("reports").style.display = "none";
  document.getElementById("contact").style.display = "none";
  document.getElementById("dashBtn").classList.add("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showEvents() {
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("events").style.display = "block";
  document.getElementById("donations").style.display = "none";
  document.getElementById("reports").style.display = "none";
  document.getElementById("contact").style.display = "none";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.add("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showDonations() {
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("events").style.display = "none";
  document.getElementById("donations").style.display = "block";
  document.getElementById("reports").style.display = "none";
  document.getElementById("contact").style.display = "none";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.add("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showReports() {
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("events").style.display = "none";
  document.getElementById("donations").style.display = "none";
  document.getElementById("reports").style.display = "block";
  document.getElementById("contact").style.display = "none";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.add("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showContact() {
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("events").style.display = "none";
  document.getElementById("donations").style.display = "none";
  document.getElementById("reports").style.display = "none";
  document.getElementById("contact").style.display = "block";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.add("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showImg(imgUrl) {
  let showImgDiv = document.querySelector(".reports .imgShow");
  showImgDiv.style.visibility = "visible";
  showImgDiv.style.opacity = "1";
  showImgDiv.style.transform = "scale(1) translate(-50%,-50%)";
  if (imgUrl != "No Image Attached") {
    document.getElementById("attachedPhoto").src = imgUrl;
    document.getElementById("noimg").innerHTML = "";
  } else {
    document.getElementById("noimg").innerHTML = "No Image Attached";
    document.getElementById("attachedPhoto").src = "";
  }
}
function hideImg() {
  let showImgDiv = document.querySelector(".reports .imgShow");
  showImgDiv.style.visibility = "hidden";
  showImgDiv.style.opacity = "0";
  showImgDiv.style.transform = "scale(0.7) translate(-50%,-50%)";
}
function showFeedback(fullname,email,description) {
  let box_details=document.querySelector(".contact .contact-list .box-details");
  box_details.style.visibility="visible";
  box_details.style.opacity="1";
  box_details.style.transform="scale(1) translate(-50%,-50%)";
  document.getElementById("contact_fullname").innerHTML=fullname;
  document.getElementById("contact_email").innerHTML=email;
  document.getElementById("contact_description").innerHTML=description;
}
function hideFeedback() {
  let box_details=document.querySelector(".contact .contact-list .box-details");
  box_details.style.visibility="hidden";
  box_details.style.opacity="0";
  box_details.style.transform="scale(0.7) translate(-50%,-50%)";
}