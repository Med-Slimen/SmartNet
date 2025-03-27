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
  <link rel="stylesheet" href="css/donation.css" />
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
        <a href="index.php"><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" alt="" /></a>
      </div>
      <div onclick="showMenu()" id="bars" class="bars">
        <i class="fa-solid fa-bars"></i>
      </div>
      <ul class="links">
        <li><a class="les-liens" href="index.php#home">Home</a></li>
        <li><a class="les-liens" href="index.php#About">About</a></li>
        <li><a class="les-liens" href="index.php#Impact">Impact</a></li>
        <li><a class="les-liens" href="index.php#Help">Help us</a></li>
        <li><a class="les-liens" href="index.php#App">Our App</a></li>
        <li><a class="les-liens" href="index.php#Contact">Contact us</a></li>
      </ul>
    </div>
  </div>
  <ul id="menu" class="menu">
    <li><a href="index.php#home">Home</a></li>
    <li><a href="index.php#About">About</a></li>
    <li><a href="index.php#Impact">Impact</a></li>
    <li><a href="index.php#Help">Help us</a></li>
    <li><a href="index.php#App">Our App</a></li>
    <li><a href="index.php#Contact">Contact us</a></li>
  </ul>
  <!-- End Header -->
  <div class="donate">
    <a id="backButton" href="index.php#Help">
      Back
    </a>
    <div class="main-heading">
      <h2>Donation</h2>
    </div>

    <div class="container">
      <div class="details">
        <h3>Enter The nessecary informations</h3>
        <form action="donate.php" method="post" onsubmit="showLoad()">
          <input type="text" placeholder="Full Name" name="full_name" id="" required />
          <input type="email" placeholder="Email" name="email" id="" required />
          <p>Select Donation Amount :</p>
          <div class="amounts">
            <span onclick="setdonate('5')">5dt</span>
            <span onclick="setdonate('10')">10dt</span>
            <span onclick="setdonate('50')">50dt</span>
            <span onclick="setdonate('100')">100dt</span>
          </div>
          <p>Or enter amount</p>
          <input type="number" name="amount" id="dt" required />

          <p>Payment Method</p>
          <input type="radio" onclick="check()" name="rd" id="cr" value="Credit Card" required />
          <img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/ejvsftjqtmbmsdhcfzjm" alt="" />
          <input type="radio" onclick="check()" name="rd" id="tel" value="Solde" required />
          <img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/kurmgjpvs4o16zu4rnql" alt="" />
          <div id="phone" class="phone">
            <input type="text" placeholder="Your Phone Number" name="" id="" required />
          </div>
          <div id="credit-card" class="credit-card">
            <input type="text" placeholder="Card Number" name="card_number" id="" />
            <input type="text" placeholder="Card Holder's Name " name="holder_name" id="" /><br />
            <input type="month" name="" id="" />
            <input type="password" placeholder="CVC/CVV" name="card_cvc" id="" />
          </div>
          <input type="submit" value="Donate" name="" id="" />
        </form>
      </div>
    </div>
  </div>
  <div id="overlay" class="overlay"></div>
  <dotlottie-player id="load" class="loading" src="https://lottie.host/8537750e-cf40-4409-8695-27939803c585/IlI4yC2YtN.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
  <script src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    unShowLoad();
    let messageText = "<?= $_SESSION['status'] ?? '' ?>";
    if (messageText != '') {
      Swal.fire({
        title: "Thank you",
        text: "messageText",
        icon: "success"
      });
      <?php unset($_SESSION['status']); ?>
    }
  </script>
</body>

</html>