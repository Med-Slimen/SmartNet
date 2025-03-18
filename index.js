function showMenu() {
  document.getElementById("menu").style.left = "0px";
  document.getElementById("menu").style.opacity = "1";
  document.getElementById("menu").style.zIndex = "100";
}

function closeMenu() {
  document.getElementById("menu").style.left = "-250px";
  document.getElementById("menu").style.opacity = "0";
  document.getElementById("menu").style.zIndex = "-100";
}
function menu() {
  let header = document.getElementById("header");
  let logo = document.getElementById("smartnet-title");
  let bars = document.getElementById("bars");
  let lesLiens = document.getElementsByClassName("les-liens");
  document.addEventListener("click", function (event) {
    var menu = document.getElementById("menu");
    var menuButton = document.getElementById("bars");
    if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
      closeMenu();
    }
  });
  document.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      header.classList.add("header-scrolled");
      bars.classList.add("bars-scrolled");
      for (let lien of lesLiens) {
        lien.classList.add("les-liens-scrolled");
      }
    } else {
      header.classList.remove("header-scrolled");
      bars.classList.remove("bars-scrolled");
      for (let lien of lesLiens) {
        lien.classList.remove("les-liens-scrolled");
      }
    }
  });
  startCountdown();
  countingNumbers();
  showAbout();
  savingData();
  setEventImage();
}
function setdonate(ch) {
  document.getElementById("dt").value = ch;
}
function check() {
  let cr = document.getElementById("cr").checked;
  if (cr) {
    document.getElementById("credit-card").style.display = "block";
    document.getElementById("phone").style.display = "none";
  } else {
    document.getElementById("credit-card").style.display = "none";
    document.getElementById("phone").style.display = "block";
  }
}
function startCountdown() {
  const events = document.querySelectorAll(".timer");

  events.forEach((event) => {
    const targetDate = new Date(event.getAttribute("date")).getTime();
    const daysSpan = event.querySelector(".days");
    const hoursSpan = event.querySelector(".hours");
    const minutesSpan = event.querySelector(".minutes");
    const secondsSpan = event.querySelector(".secondes");

    setInterval(() => {
      const now = new Date();
      const diff = targetDate - now;

      if (diff <= 0) {
        daysSpan.innerHTML = "00 D";
        hoursSpan.innerHTML = "00 H";
        minutesSpan.innerHTML = "00 M";
        secondsSpan.innerHTML = "00 S";
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor(
        (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
      const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((diff % (1000 * 60)) / 1000);

      daysSpan.innerHTML = days < 10 ? "0" + days + " D" : days + " D";
      hoursSpan.innerHTML = hours < 10 ? "0" + hours + " H" : hours + " H";
      minutesSpan.innerHTML =
        minutes < 10 ? "0" + minutes + " M" : minutes + " M";
      secondsSpan.innerHTML =
        seconds < 10 ? "0" + seconds + " S" : seconds + " S";
    }, 1000);
  });
}
function countingNumbers() {
  let section = document.getElementById("Impact");
  let statsList = document.querySelectorAll(".stats-list .box");
  let started = false;
  if (section) {
    window.onscroll = function () {
      if (window.scrollY >= section.offsetTop - 220) {
        if (!started) {
          statsList.forEach((stat) => {
            let number = stat.querySelector("h4");
            let count = setInterval(() => {
              number.textContent++;
              if (number.textContent == number.getAttribute("number")) {
                clearInterval(count);
              }
            }, 1000 / number.getAttribute("number"));
          });
        }
        started = true;
      }
    };
  }
}
function showAbout() {
  let homeSection = document.getElementById("home");
  let aboutSection = document.getElementById("About");
  let helpSection = document.getElementById("Help");
  let appSection = document.getElementById("App");
  let contactSection = document.getElementById("Contact");
  let aboutText = document.querySelector(".about .container .text");
  let aboutImage = document.querySelector(".about .container .image");
  let helpBoxes = document.querySelectorAll(".help .container .box");
  let appText = document.querySelector(".app .container .text");
  let appPhone = document.querySelector(".app .container .phone");
  let contactText = document.querySelector(".contact .container .part1");
  let contactForm = document.querySelector(".contact .container .part2");
  let arrow = document.querySelector(".arrow");
  if (aboutSection) {
    document.addEventListener("scroll", () => {
      if (window.scrollY > homeSection.offsetTop) {
        arrow.classList.add("arrow-visible");
      } else {
        arrow.classList.remove("arrow-visible");
      }
      if (window.scrollY >= aboutSection.offsetTop - 600) {
        aboutText.style.left = "0";
        aboutText.style.opacity = "1";
        aboutImage.style.right = "0";
        aboutImage.style.opacity = "1";
      } else {
        aboutText.style.left = "-80%";
        aboutText.style.opacity = "0";
        aboutImage.style.right = "-70%";
        aboutImage.style.opacity = "0";
      }
      if (window.scrollY >= helpSection.offsetTop - 350) {
        helpBoxes.forEach((box) => {
          box.style.bottom = "0";
          box.style.opacity = "1";
        });
      } else {
        helpBoxes.forEach((box) => {
          box.style.bottom = "-20%";
          box.style.opacity = "0";
        });
      }
      if (window.scrollY >= appSection.offsetTop - 470) {
        appText.style.left = "0";
        appText.style.opacity = "1";
        appPhone.style.right = "0";
        appPhone.style.opacity = "1";
      } else {
        appText.style.left = "-40%";
        appText.style.opacity = "0";
        appPhone.style.right = "-40%";
        appPhone.style.opacity = "0";
      }
      if (window.scrollY >= contactSection.offsetTop - 400) {
        contactText.style.left = "0";
        contactText.style.opacity = "1";
        contactForm.style.right = "0";
        contactForm.style.opacity = "1";
      } else {
        contactText.style.left = "-80%";
        contactText.style.opacity = "0";
        contactForm.style.right = "-70%";
        contactForm.style.opacity = "0";
      }
    });
  }
}
function savingData() {
  let allButtons = document.querySelectorAll(
    ".events .container .box .text .button"
  );
  allButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      localStorage.setItem("eventId", button.getAttribute("eventId"));
      localStorage.setItem("imgUrl", button.getAttribute("imgUrl"));
      localStorage.setItem("eventName", button.getAttribute("eventName"));
    });
  });
}
function setEventImage() {
  let imgg = document.querySelector(".eventform .details .event .image img");
  let eventName = document.querySelector(".eventform .details .event h3");
  if (imgg) {
    imgg.setAttribute("src", localStorage.getItem("imgUrl"));
    document.getElementById("register_eventId").value =
      localStorage.getItem("eventId");
    eventName.innerHTML = localStorage.getItem("eventName");
  }
}
function reportCheck() {
  showLoad();
  let file = document.getElementById("file").files[0];
  let fileimg = document.getElementById("fileimg");
  if (file) {
    const reader = new FileReader();
    reader.onload = function (event) {
      fileimg.value = event.target.result;
      document.getElementById("form").submit();
    };
    reader.readAsDataURL(file);
    return false;
  }
}
function sendFeedback(event) {
  event.preventDefault();
  let fullname = document.getElementById("contact_fullname").value;
  let email = document.getElementById("contact_email").value;
  let description = document.getElementById("contact_description").value;
  showLoad();
  setTimeout(() => {
    let form = new FormData();
    form.append("fullname", fullname);
    form.append("email", email);
    form.append("description", description);
    fetch("contact.php", {
      method: "POST",
      body: form,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data === "done") {
          Swal.fire({
            title: "Thank you",
            text: "Your feedback has been sent successfully !",
            icon: "success",
          });
          document.getElementById("contact_form").reset();
        } else {
          console.log("bra or9od");
        }
        unShowLoad();
      });
  }, 2000);
}
// function registerEvent(event) {
//   event.preventDefault();
//   let register_eventId = document.getElementById("register_eventId").value;
//   let register_fname = document.getElementById("register_fname").value;
//   let register_lname = document.getElementById("register_lname").value;
//   let register_email = document.getElementById("register_email").value;
//   let male = document.getElementById("male").checked;
//   let gender = male ? "Male" : "Female";
//   let form = new FormData();
//   form.append("register_eventId", register_eventId);
//   form.append("register_fname", register_fname);
//   form.append("register_lname", register_lname);
//   form.append("register_email", register_email);
//   form.append("gender", gender);
//   fetch("registerEvent.php", {
//     method: "POST",
//     body: form,
//   })
//     .then((response) => response.text())
//     .then((data) => {
//       if (data === "duplicate") {
//         Swal.fire({
//           title: "Whoops...",
//           text: "You already registered to this event",
//           icon: "warning",
//         });
//       } else if (data == "inserted") {
//         Swal.fire({
//           title: "Thank you",
//           text: "Your've been registered to this event ! Check your email for more details (make sure to check the spam) !",
//           icon: "success",
//         });
//         document.getElementById("register_event_form").reset();
//       } else if (data == "error") {
//         Swal.fire({
//           icon: "error",
//           title: "Oops...",
//           text: "Something went wrong!",
//           footer: '<a href="#">Why do I have this issue?</a>',
//         });
//       }
//     });
// }
function showLoad() {
  let load = document.getElementById("load");
  let ovelray = document.getElementById("overlay");
  load.style.display = "block";
  ovelray.style.display = "block";
  ovelray.style.opacity = "0.3";
}
function unShowLoad() {
  let load = document.getElementById("load");
  let ovelray = document.getElementById("overlay");
  load.style.display = "none";
  ovelray.style.opacity = "0";
  ovelray.style.display = "none";
}
