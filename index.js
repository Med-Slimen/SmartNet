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
      logo.classList.add("h2-scrolled");
      bars.classList.add("bars-scrolled");
      for (let lien of lesLiens) {
        lien.classList.add("les-liens-scrolled");
      }
    } else {
      header.classList.remove("header-scrolled");
      logo.classList.remove("h2-scrolled");
      bars.classList.remove("bars-scrolled");
      for (let lien of lesLiens) {
        lien.classList.remove("les-liens-scrolled");
      }
    }
  });
  startCountdown();
  countingNumbers();
  showAbout();
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
    // Now `event` is recognized as an HTMLElement
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
  window.onscroll = function () {
    if (window.scrollY >= section.offsetTop - 220) {
      if (!started) {
        console.log("wselt");
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
function showAbout() {
  let aboutSection = document.getElementById("About");
  let helpSection = document.getElementById("Help");
  let aboutText = document.querySelector(".about .container .text");
  let aboutImage = document.querySelector(".about .container .image");
  let helpBoxes = document.querySelectorAll(".help .container .box");
  document.addEventListener("scroll", () => {
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
    if (window.scrollY >= helpSection.offsetTop - 100) {
      helpBoxes.forEach((box) => {
        box.style.bottom = "0";
        box.style.opacity = "1";
      });
    } else {
      helpBoxes.forEach((box) => {
        box.style.bottom = "-35%";
        box.style.opacity = "0";
      });
    }
  });
}
