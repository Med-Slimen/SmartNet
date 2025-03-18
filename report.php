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
  <link rel="stylesheet" href="css/report.css" />
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
  <div class="report">
    <a id="backButton" href="index.html#Help">
      Back
    </a>
    <div class="main-heading">
      <h2>Report A Valley</h2>
    </div>

    <p>
      Help us keep our environment clean by reporting valley pollution or
      hazards.
    </p>
    <div class="container">
      <div class="form">
        <form action="reports.php" method="post" id="form" onsubmit="return reportCheck()">
          <label for="">Full Name</label>
          <input type="text" placeholder="Enter Your Full Name" name="fullname" id="fullname" required />
          <label for="">Email </label>
          <input type="email" placeholder="Enter Your Email" name="email" id="email" required />
          <label for="">Location</label>
          <input type="text" placeholder="Enter The Valley Location" name="location" id="" required />
          <label for="">Type of Issue </label>
          <select name="issue" id="" required>
            <option value="Littering">Littering</option>
            <option value="Water Polluting">Water Polluting</option>
            <option value="Blockage/Debris">Blockage/Debris</option>
            <option value="Other">Other</option>
          </select>
          <label for="">Description</label>
          <textarea name="description" placeholder="Profide additional details" id="" cols="30" rows="10" required></textarea>
          <label for="">Attach a photo</label>
          <input type="file" name="file" id="file" />
          <input type="hidden" name="fileimg" id="fileimg" />
          <input type="submit" name="" id="" />
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
        text: messageText,
        icon: "success"
      });
      <?php unset($_SESSION['status']); ?>
    }
  </script>
</body>

</html>