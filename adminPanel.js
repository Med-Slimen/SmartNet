function onload() {
  let arrow = document.querySelector(".mobile-menu .icon");
  let mbMenu = document.querySelector(".mobile-menu");
  let profileImg = document.querySelector(".header .profile img");
  let profileSettings = document.querySelector(
    ".header .profile .profile-settings"
  );
  let overlay = document.querySelector(".overlay");
  document.addEventListener("click", function (event) {
    if (mbMenu.contains(event.target)) {
      mbMenu.style.height = "280px";
      overlay.style.display = "block";
    } else if (!mbMenu.contains(event.target)) {
      mbMenu.style.height = "40px";
      overlay.style.display = "none";
    }
    if (profileImg.contains(event.target)) {
      profileSettings.style.height = "160px";
      profileSettings.style.padding = "5px";
      overlay.style.display = "block";
    } else if (
      !profileImg.contains(event.target) &&
      !mbMenu.contains(event.target)
    ) {
      profileSettings.style.height = "0px";
      profileSettings.style.padding = "0px";
      overlay.style.display = "none";
    }
  });
  setInterval(notificationShow, 5000);
}
function notificationShow() {
  fetch("notification.php")
    .then((response) => response.json())
    .then((data) => {
      document.querySelectorAll(".menu_links").forEach((link) => {
        link.setAttribute(
          "notification",
          data[link.getAttribute("tabName")] || 0
        );
      });
      document.querySelectorAll(".mobile-menu ul li").forEach((link) => {
        link.setAttribute(
          "notification",
          data[link.getAttribute("tabName")] || 0
        );
      });
    });
}
function showConf(idEvent, id) {
  document.getElementById("delete-conf").style.visibility = "visible";
  document.getElementById("delete-conf").style.transform =
    "scale(1) translate(-50%,-50%)";
  document.getElementById("delete-conf").style.opacity = "1";
  let hidden_id = document.getElementById(id);
  let no = document.getElementById("no");
  hidden_id.setAttribute("value", idEvent);
  document.addEventListener("click", (event) => {
    if (no.contains(event.target)) {
      document.getElementById("delete-conf").style.visibility = "hidden";
      document.getElementById("delete-conf").style.transform =
        "scale(0.6) translate(-50%,-50%)";
      document.getElementById("delete-conf").style.opacity = "0";
      hidden_id.setAttribute("value", "");
    }
  });
}
function showEditEvent() {
  // Showing Edit box
  document.getElementById("edit-event").style.visibility = "visible";
  document.getElementById("edit-event").style.transform =
    "scale(1) translate(-50%,-50%)";
  document.getElementById("edit-event").style.opacity = "1";
  // Setting the id to the hidden input
  let idEvent = document.getElementById("event_id_events").innerHTML;
  let id_event = document.querySelector(".edit-event #idEvent");
  id_event.setAttribute("value", idEvent);
  // Setting the old values in the inputs
  let eventName = document.getElementById("old_event_name").innerHTML;
  let eventDesc = document.getElementById("old_event_desc").innerHTML;
  let eventDate = document.getElementById("old_event_date").innerHTML;
  let eventImg = document.getElementById("old_event_img").innerHTML;
  let eventLocation = document.getElementById("old_event_location").innerHTML;
  document.getElementById("edit_eventName").value = eventName;
  document.getElementById("edit_eventDate").value = eventDate;
  document.getElementById("edit_eventDesc").value = eventDesc;
  document.getElementById("edit_eventImg").value = eventImg;
  document.getElementById("edit_eventLocation").value = eventLocation;
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
function showDash(element) {
  element.setAttribute("notification", 0);
  fetch("updateNotification.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `tabName=${element.getAttribute("tabName")}`,
  }).catch((error) => console.error("Error:", error));
  document.getElementById("iframe_dashboard").src = "dashboardPanel.php";
  document.getElementById("iframe_dashboard").style.display = "block";
  document.getElementById("iframe_events").style.display = "none";
  document.getElementById("iframe_donations").style.display = "none";
  document.getElementById("iframe_reports").style.display = "none";
  document.getElementById("iframe_contact").style.display = "none";
  document.getElementById("dashBtn").classList.add("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showEvents(element) {
  element.setAttribute("notification", 0);
  fetch("updateNotification.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `tabName=${element.getAttribute("tabName")}`,
  }).catch((error) => console.error("Error:", error));
  document.getElementById("iframe_events").src = "eventPanel.php";
  document.getElementById("iframe_dashboard").style.display = "none";
  document.getElementById("iframe_events").style.display = "block";
  document.getElementById("iframe_donations").style.display = "none";
  document.getElementById("iframe_reports").style.display = "none";
  document.getElementById("iframe_contact").style.display = "none";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.add("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showDonations(element) {
  element.setAttribute("notification", 0);
  fetch("updateNotification.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `tabName=${element.getAttribute("tabName")}`,
  }).catch((error) => console.error("Error:", error));
  document.getElementById("iframe_donations").src = "donationsPanel.php";
  document.getElementById("iframe_dashboard").style.display = "none";
  document.getElementById("iframe_events").style.display = "none";
  document.getElementById("iframe_donations").style.display = "block";
  document.getElementById("iframe_reports").style.display = "none";
  document.getElementById("iframe_contact").style.display = "none";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.add("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showReports(element) {
  element.setAttribute("notification", 0);
  fetch("updateNotification.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `tabName=${element.getAttribute("tabName")}`,
  }).catch((error) => console.error("Error:", error));
  document.getElementById("iframe_reports").src = "reportPanel.php";
  document.getElementById("iframe_dashboard").style.display = "none";
  document.getElementById("iframe_events").style.display = "none";
  document.getElementById("iframe_donations").style.display = "none";
  document.getElementById("iframe_reports").style.display = "block";
  document.getElementById("iframe_contact").style.display = "none";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.add("clicked");
  document.getElementById("contactBtn").classList.remove("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showContact(element) {
  element.setAttribute("notification", 0);
  fetch("updateNotification.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `tabName=${element.getAttribute("tabName")}`,
  }).catch((error) => console.error("Error:", error));
  document.getElementById("iframe_contact").src = "contactPanel.php";
  document.getElementById("iframe_dashboard").style.display = "none";
  document.getElementById("iframe_events").style.display = "none";
  document.getElementById("iframe_donations").style.display = "none";
  document.getElementById("iframe_reports").style.display = "none";
  document.getElementById("iframe_contact").style.display = "block";
  document.getElementById("dashBtn").classList.remove("clicked");
  document.getElementById("eventBtn").classList.remove("clicked");
  document.getElementById("donationBtn").classList.remove("clicked");
  document.getElementById("reportBtn").classList.remove("clicked");
  document.getElementById("contactBtn").classList.add("clicked");
  document.getElementById("settingBtn").classList.remove("clicked");
}
function showImg() {
  let imgUrl = document.getElementById("showimg").getAttribute("img_src");
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
function showReport(fullname, email, location, type, description, img) {
  let box_details = document.querySelector(
    ".reports .reports-list .box-details"
  );
  box_details.style.visibility = "visible";
  box_details.style.opacity = "1";
  box_details.style.transform = "scale(1) translate(-50%,-50%)";
  document.getElementById("report_fullname").innerHTML = fullname;
  document.getElementById("report_email").innerHTML = email;
  document.getElementById("report_location").innerHTML = location;
  document.getElementById("report_issue_type").innerHTML = type;
  document.getElementById("report_description").innerHTML = description;
  document.getElementById("showimg").setAttribute("img_src", img);
}
function hideReport() {
  let box_details = document.querySelector(
    ".reports .reports-list .box-details"
  );
  box_details.style.visibility = "hidden";
  box_details.style.opacity = "0";
  box_details.style.transform = "scale(0.7) translate(-50%,-50%)";
}
function showFeedback(fullname, email, description) {
  let box_details = document.querySelector(
    ".contact .contact-list .box-details"
  );
  box_details.style.visibility = "visible";
  box_details.style.opacity = "1";
  box_details.style.transform = "scale(1) translate(-50%,-50%)";
  document.getElementById("contact_fullname").innerHTML = fullname;
  document.getElementById("contact_email").innerHTML = email;
  document.getElementById("contact_description").innerHTML = description;
}
function hideFeedback() {
  let box_details = document.querySelector(
    ".contact .contact-list .box-details"
  );
  box_details.style.visibility = "hidden";
  box_details.style.opacity = "0";
  box_details.style.transform = "scale(0.7) translate(-50%,-50%)";
}
function showEventDetails(
  name,
  description,
  date,
  idEvent,
  eventImg,
  eventLocation,
  registration_count
) {
  let box_details = document.querySelector(".events .events-list .box-details");
  box_details.style.visibility = "visible";
  box_details.style.opacity = "1";
  box_details.style.transform = "scale(1) translate(-50%,-50%)";
  document.getElementById("event_id_events").innerHTML = idEvent;
  document.getElementById("old_event_name").innerHTML = name;
  document.getElementById("old_event_desc").innerHTML = description;
  document.getElementById("old_event_date").innerHTML = date;
  document.getElementById("old_event_img").innerHTML = eventImg;
  document.getElementById("old_event_location").innerHTML = eventLocation;
  document.getElementById("registration_count").innerHTML =
    registration_count +
    document.getElementById("registration_count").innerHTML;
}
function hideEventDetails() {
  let box_details = document.querySelector(".events .events-list .box-details");
  box_details.style.visibility = "hidden";
  box_details.style.opacity = "0";
  box_details.style.transform = "scale(0.7) translate(-50%,-50%)";
}
function event_msg(color, text, className) {
  let sent = document.querySelector(".event_msg");
  let span = document.querySelector(".event_msg span");
  let i = document.querySelector(".event_msg i");
  i.setAttribute("class", className);
  i.style.color = color;
  span.innerHTML = text;
  sent.style.visibility = "visible";
  sent.style.opacity = "1";
  sent.style.transform = "scale(1) translateX(-50%)";
  sent.style.setProperty("--beforeWidth", "100%");
  sent.style.setProperty("--beforeColor", color);
  setTimeout(() => {
    sent.style.visibility = "hidden";
    sent.style.opacity = "0";
    sent.style.transform = "scale(0.8) translateX(-50%)";
    sent.style.setProperty("--beforeWidth", "0%");
  }, 3000);
}
