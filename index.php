<?php $language = $_COOKIE["language"] ?? "en";
include $language . '.php';
?>
<!DOCTYPE html>
<html dir=<?= $language == "en" ? "ltr" : "rtl" ?> lang="<?= $language ?>">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SmartNet</title>
  <!--Render all elements normally-->
  <link rel="stylesheet" href="css/normalize.css" />
  <!--Font Awseome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- Common CSS -->
  <link rel="stylesheet" href="css/commonCSS.css" />
  <!--Main template css file-->
  <link rel="stylesheet" href="css/smartNet.css" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+IN:wght@100..400&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" />
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</head>

<body onload="menu()">
  <?php
  if (!isset($_COOKIE["language"])) {
  ?>
    <div class="language-popup">
      <div class="text">
        <h3>Chose Your prefered language</h3>
      </div>
      <div class="choose">
        <p>Chose what language you want to browse the website with ( you can switch the language later if you want )</p>
        <form action="updateLang.php" method="post">
          <select name="lang">
            <option value="en">English 	&#x1f1fa;</option>
            <option value="ar">Arabic</option>
          </select>
          <input type="submit" value="Choose">
        </form>
      </div>
    </div>
  <?php
  }
  ?>
  <form id="selectLang" action="updateLang.php" method="post">
    <select name="lang">
      <option value="en">English 🇺🇸</option>
      <option value="ar">Arabic 🇸🇦</option>
    </select>
    <input type="submit" value="Choose">
  </form>
  <!-- Start Header -->
  <div id="header" class="header">
    <div class="container">
      <div class="logo">
        <a href="index.html"><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" alt="" /></a>
      </div>
      <div onclick="showMenu()" id="bars" class="bars">
        <i class="fa-solid fa-bars"></i>
      </div>
      <ul class="links">
        <li><a class="les-liens" href="#home"><?= $lang["Home"] ?></a></li>
        <li><a class="les-liens" href="#About"><?= $lang["About"] ?></a></li>
        <li><a class="les-liens" href="#Impact"><?= $lang["Impact"] ?></a></li>
        <li><a class="les-liens" href="#Help"><?= $lang["Help"] ?></a></li>
        <li><a class="les-liens" href="#App"><?= $lang["App"] ?></a></li>
        <li><a class="les-liens" href="#Contact"><?= $lang["Contact"] ?></a></li>
      </ul>


    </div>

  </div>
  <ul id="menu" class="menu">
    <li><a href="#home"><?= $lang["Home"] ?></a></li>
    <li><a href="#About"><?= $lang["About"] ?></a></li>
    <li><a href="#Impact"><?= $lang["Impact"] ?></a></li>
    <li><a href="#Help"><?= $lang["Help"] ?></a></li>
    <li><a href="#App"><?= $lang["App"] ?></a></li>
    <li><a href="#Contact"><?= $lang["Contact"] ?></a></li>
  </ul>
  <!-- End Header -->
  <!-- Start landing -->
  <div id="home" class="landing">
    <video preload="auto" autoplay muted loop>
      <source src="https://video.gumlet.io/679a2fd0590dd63677c5670f/679a3075590dd63677c56c1a/download.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <div class="container">
      <div class="text">
        <h1><?= $lang["heroText"] ?></h1>
        <p>
          <?= $lang["heroTextp"] ?>
        </p>
      </div>
      <div class="buttons">
        <a href="#Help"><?= $lang["landingBtn1"] ?></a>
        <a href="#About"><?= $lang["landingBtn2"] ?></a>
      </div>
    </div>
  </div>
  <!-- Top Arrow -->
  <a href="#home">
    <div class="arrow">
      <i class="fa-solid fa-arrow-up"></i>
    </div>
  </a>
  <!-- End Top Arrow -->
  <!-- End landing -->
  <!-- About section -->
  <div id="About" class="about">
    <div class="main-heading">
      <h2><?= $lang["About"] ?></h2>
    </div>
    <div class="container">
      <div class="text">
        <h3><?= $lang["mission"] ?></h3>
        <p>
          <?= $lang["missionP"] ?>
        </p>
        <a href="team.html"><?= $lang["team"] ?></a>
      </div>
      <div class="image">
        <img loading="lazy" src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/zratzoydcpm8txecwejl" alt="" />
      </div>
    </div>
  </div>
  <!-- End about section -->
  <!-- Start stats -->
  <div id="Impact" class="stats">
    <div class="main-heading">
      <h2><?= $lang["Impact"] ?></h2>
    </div>
    <div class="container">
      <div class="stats-list">
        <div class="box">
          <i class="fa-solid fa-water"></i>
          <h4 unit="" number="150">0</h4>
          <p><?= $lang["Valleys Cleaned"] ?></p>
        </div>
        <div class="box">
          <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
            <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
          </svg>
          <h4 number="135">0</h4>
          <span>kg</span>
          <p><?= $lang["Garbage Collected"] ?></p>
        </div>
        <div class="box">
          <i class="fa-solid fa-people-group"></i>
          <h4 number="50">0</h4>
          <p><?= $lang["People Voluntered"] ?></p>
        </div>
        <div class="box">
          <i class="fa-solid fa-droplet"></i>
          <h4 unit="L" number="500">0</h4>
          <span>L</span>
          <p><?= $lang["Water Saved"] ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- End stats -->
  <!-- Start help us -->
  <div id="Help" class="help">
    <div class="main-heading">
      <h2><?= $lang["Help"] ?></h2>
    </div>
    <div class="container">
      <div class="box">
        <div class="image">
          <img loading="lazy" src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/ecxnnvjqcpjoqgivjfyt" alt="" />
        </div>
        <div class="text">
          <h3><?= $lang["Volunteer"] ?></h3>
          <p>
            <?= $lang["VolunteerP"] ?>
          </p>
        </div>
        <div class="button"><a href="events.php"><?= $lang["landingBtn1"] ?></a></div>
      </div>
      <div class="box">
        <div id="image-donate" class="image">
          <img loading="lazy" src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/pxkeitacgkh3uellux6p" alt="" />
        </div>
        <div class="text">
          <h3><?= $lang["Donate"] ?></h3>
          <p>
            <?= $lang["DonateP"] ?>
          </p>
        </div>
        <div class="button">
          <a id="button-donate" href="donation.php"><?= $lang["Donate"] ?></a>
        </div>
      </div>
      <div class="box">
        <div id="image-report" class="image">
          <img loading="lazy" src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/cgtfejw3sreqrlitclzg" alt="" />
        </div>
        <div class="text">
          <h3><?= $lang["Report"] ?></h3>
          <p>
            <?= $lang["ReportP"] ?>
          </p>
        </div>
        <div class="button">
          <a id="button-report" href="report.php"><?= $lang["ReportBtn"] ?></a>
        </div>
      </div>
    </div>
  </div>
  <!-- End help us -->
  <!-- Start app -->
  <div id="App" class="app">
    <div class="main-heading">
      <h2><?= $lang["App"] ?></h2>
    </div>
    <div class="container">
      <div class="text">
        <h3><?= $lang["Try Our App !"] ?></h3>
        <p>
          <?= $lang["TryP"] ?>
        </p>
        <div class="download">
          <a href=""><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/tpxi0pkrbat62sbtfvvm" alt="" /></a>
          <a href=""><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mjfrlwidhbwgnzlhii5q" alt="" /></a>
        </div>
      </div>
      <div class="phone">
        <img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/w29frk8elbk0sfflxr97" alt="" />
        <img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/tusfzxhcto2bp2f6setz" alt="" />
      </div>
    </div>
  </div>
  <!-- End app -->
  <!-- Start contact us -->
  <div id="Contact" class="contact">
    <div class="main-heading">
      <h2><?= $lang["Contact"] ?></h2>
    </div>
    <div class="container">
      <div class="part1">
        <div class="text">
          <h3><?= $lang["Get In Touch With Us"] ?></h3>
          <p>
            <?= $lang["TouchP"] ?>
          </p>
        </div>
        <div class="socials">
          <a href=""><i class="fa-brands fa-square-facebook"></i></a>
          <a href=""><i class="fa-brands fa-square-twitter"></i></a>
          <a href="mailto: mohamedamineslimene01@gmail.com"><i class="fa-solid fa-envelope"></i></a>
        </div>
        <div class="details">
          <div class="dt">
            <i class="fa-solid fa-location-dot"></i>
            <p><?= $lang["Hammamet"] ?></p>
          </div>
          <div class="dt">
            <i class="fa-solid fa-clock"></i>
            <p><?= $lang["Business Hours"] ?></p>
          </div>
          <div class="dt">
            <i class="fa-solid fa-phone"></i>
            <p>+216 xxxxxxxx</p>
          </div>
        </div>
      </div>
      <div class="part2">
        <form id="contact_form" onsubmit="return sendFeedback(event);">
          <input type="text" placeholder="Full Name" name="fullname" id="contact_fullname" required />
          <input type="email" placeholder="Email" name="email" id="contact_email" required />
          <textarea name="description" placeholder="Message" id="contact_description" cols="30" rows="10" required></textarea>
          <input type="submit" value="<?= $lang["Send"] ?>" name="" id="" />
        </form>
      </div>
    </div>
  </div>
  <!-- end contact us -->
  <div id="overlay" class="overlay"></div>
  <dotlottie-player id="load" class="loading" src="https://lottie.host/8537750e-cf40-4409-8695-27939803c585/IlI4yC2YtN.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
  <script src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>