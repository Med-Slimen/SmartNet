
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SmartNet</title>
  <!--Render all elements normally-->
  <link rel="stylesheet" href="css/normalize.css" />
  <!--Font Awseome-->
  <link rel="stylesheet" href="css/all.min.css" />
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
        <li><a class="les-liens" href="#home">Home</a></li>
        <li><a class="les-liens" href="#About">About</a></li>
        <li><a class="les-liens" href="#Impact">Impact</a></li>
        <li><a class="les-liens" href="#Help">Help us</a></li>
        <li><a class="les-liens" href="#App">Our App</a></li>
        <li><a class="les-liens" href="#Contact">Contact us</a></li>
      </ul>


    </div>

  </div>
  <ul id="menu" class="menu">
    <li><a href="#home">Home</a></li>
    <li><a href="#About">About</a></li>
    <li><a href="#Impact">Impact</a></li>
    <li><a href="#Help">Help us</a></li>
    <li><a href="#App">Our App</a></li>
    <li><a href="#Contact">Contact us</a></li>
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
        <h1>Protecting Our Valleys, Saving Our Seas</h1>
        <p>
          Smart Net stops waste in valleys before it pollutes the ocean.
          Together, we can protect marine life and create a cleaner planet
        </p>
      </div>
      <div class="buttons">
        <a href="#Help">Get Involved</a>
        <a href="#About">Lear More</a>
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
      <h2>About us</h2>
    </div>
    <div class="container">
      <div class="text">
        <h3>Our Mission</h3>
        <p>
          Smart Net is an innovative solution designed to stop waste from
          reaching the ocean. Using advanced net technology, Smart Net
          intercepts garbage in valleys and waterways, preventing pollution at
          its source. Our goal is simple: protect marine ecosystems and keep
          our waters clean through smart, efficient, and sustainable
          solutions.
        </p>
        <a href="team.html">Check Our Team !</a>
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
      <h2>Impact</h2>
    </div>
    <div class="container">
      <div class="stats-list">
        <div class="box">
          <i class="fa-solid fa-water"></i>
          <h4 unit="" number="150">0</h4>
          <p>Valleys Cleaned</p>
        </div>
        <div class="box">
          <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
            <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
          </svg>
          <h4 number="135">0</h4>
          <span>kg</span>
          <p>Garbage Collected</p>
        </div>
        <div class="box">
          <i class="fa-solid fa-people-group"></i>
          <h4 number="50">0</h4>
          <p>People Voluntered</p>
        </div>
        <div class="box">
          <i class="fa-solid fa-droplet"></i>
          <h4 unit="L" number="500">0</h4>
          <span>L</span>
          <p>Water Saved</p>
        </div>
      </div>
    </div>
  </div>
  <!-- End stats -->
  <!-- Start help us -->
  <div id="Help" class="help">
    <div class="main-heading">
      <h2>Help Us</h2>
    </div>
    <div class="container">
      <div class="box">
        <div class="image">
          <img loading="lazy" src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/ecxnnvjqcpjoqgivjfyt" alt="" />
        </div>
        <div class="text">
          <h3>Volunteer</h3>
          <p>
            Help protect our environment by joining cleanup events and making
            a difference in our valleys.
          </p>
        </div>
        <div class="button"><a href="events.php">Get Involved</a></div>
      </div>
      <div class="box">
        <div id="image-donate" class="image">
          <img loading="lazy" src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/pxkeitacgkh3uellux6p" alt="" />
        </div>
        <div class="text">
          <h3>Donate</h3>
          <p>
            Your donation supports projects to protect valleys and promote
            environmental awareness.
          </p>
        </div>
        <div class="button">
          <a id="button-donate" href="donation.php">Donate</a>
        </div>
      </div>
      <div class="box">
        <div id="image-report" class="image">
          <img loading="lazy" src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/cgtfejw3sreqrlitclzg" alt="" />
        </div>
        <div class="text">
          <h3>Report A Valley</h3>
          <p>
            Report pollution or concerns in valleys to help us take quick
            action for restoration.
          </p>
        </div>
        <div class="button">
          <a id="button-report" href="report.php">Report</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End help us -->
  <!-- Start app -->
  <div id="App" class="app">
    <div class="main-heading">
      <h2>Our App</h2>
    </div>
    <div class="container">
      <div class="text">
        <h3>Try Our App !</h3>
        <p>
          Experience Smart Net on the go! Download our app and stay connected
          to real-time updates, environmental initiatives, and innovative
          solutions to protect our valleys. Join us in making a lasting impact
          with just a tap.
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
      <h2>Contact Us</h2>
    </div>
    <div class="container">
      <div class="part1">
        <div class="text">
          <h3>Get In Touch With Us</h3>
          <p>
            We'd love to hear from you! Whether you have questions,
            suggestions, or just want to share your thoughts, feel free to
            reach out. Our team is here to help and connect with you.
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
            <p>Hammamet</p>
          </div>
          <div class="dt">
            <i class="fa-solid fa-clock"></i>
            <p>Business Hours: From 9:00 To 18:00</p>
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
          <input type="submit" value="Send" name="" id="" />
        </form>
      </div>
    </div>
    <div class="contact-sent">
      <span>Feedback sent !</span>
      <i class="fa-solid fa-circle-check"></i>
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