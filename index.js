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
    const targetDate = new Date(event.getAttribute("date"));
    const daysSpan = event.querySelector(".days");
    const hoursSpan = event.querySelector(".hours");
    const minutesSpan = event.querySelector(".minutes");
    const secondsSpan = event.querySelector(".secondes");

    setInterval(() => {
      const now = new Date();
      const diff = targetDate - now;

      if (diff <= 0) {
        daysSpan.innerHTML = "00";
        hoursSpan.innerHTML = "00";
        minutesSpan.innerHTML = "00";
        secondsSpan.innerHTML = "00";
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor(
        (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
      const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((diff % (1000 * 60)) / 1000);

      daysSpan.innerHTML = days < 10 ? "0" + days : days;
      hoursSpan.innerHTML = hours < 10 ? "0" + hours : hours;
      minutesSpan.innerHTML = minutes < 10 ? "0" + minutes : minutes;
      secondsSpan.innerHTML = seconds < 10 ? "0" + seconds : seconds;
    }, 1000);
  });
}
