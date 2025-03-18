<?php session_start(); ?>
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
  <link rel="stylesheet" href="css/eventform.css" />
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
        <li><a class="les-liens" href="index.html#home">Home</a></li>
        <li><a class="les-liens" href="index.html#About">About</a></li>
        <li><a class="les-liens" href="index.html#Impact">Impact</a></li>
        <li><a class="les-liens" href="index.html#Help">Help us</a></li>
        <li><a class="les-liens" href="index.html#App">Our App</a></li>
        <li><a class="les-liens" href="index.html#Contact">Contact us</a></li>
      </ul>
    </div>
  </div>
  <ul id="menu" class="menu">
    <li><a href="index.html#home">Home</a></li>
    <li><a href="index.html#About">About</a></li>
    <li><a href="index.html#Impact">Impact</a></li>
    <li><a href="index.html#Help">Help us</a></li>
    <li><a href="index.html#App">Our App</a></li>
    <li><a href="index.html#Contact">Contact us</a></li>
  </ul>
  <!-- End Header -->
  <div class="eventform">
    <a id="backButton" href="events.php">
      Back
    </a>
    <div class="details">

      <div class="event">
        <div class="image">
          <img loading="lazy" src="" alt="" />
        </div>
        <h3></h3>
      </div>
      <div class="form">
        <h3>Enter Your Information</h3>

        <form method="post" id="register_event_form" action="registerEvent.php" onsubmit="showLoad()">
          <input type="hidden" id="register_eventId" name="register_eventId" />
          <input type="text" placeholder="First Name here" name="register_fname" id="register_fname" required />
          <input type="text" placeholder="Last Name here" name="register_lname" id="register_lname" required />
          <input type="email" placeholder="Email Here" name="register_email" id="register_email" required />
          <label for="">Gender : </label>
          <input type="radio" value="male" name="gender" id="male" required />
          <label for="">Male</label>
          <input type="radio" value="female" name="gender" id="female" required />
          <label for="">Female</label>
          <input type="submit" value="Register" name="" id="" />
        </form>
      </div>
      <div class="event_register">
        <span>fff</span>
        <i class="fa-solid fa-circle-check"></i>
      </div>
    </div>
  </div>
  <div id="overlay" class="overlay">
  </div>
  <dotlottie-player id="load" class="loading" src="https://lottie.host/8537750e-cf40-4409-8695-27939803c585/IlI4yC2YtN.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
  <script src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    let messageText = "<?= $_SESSION['status'] ?? '' ?>";
    console.log(messageText);
    if (messageText == 'inserted') {
      Swal.fire({
        title: "Thank you",
        text: "Thank you for registring",
        icon: "success"
      });
    } else if (messageText == 'duplicate') {
      Swal.fire({
        title: "Oops...",
        text: "You already registred in this event",
        icon: "warning"
      });
    } else if (messageText == 'error') {
      Swal.fire({
        title: "Oops...",
        text: "Something went wrong",
        icon: "error"
      });
    }
    <?php unset($_SESSION['status']); ?>
  </script>
</body>

</html>