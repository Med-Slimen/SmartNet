<?php
$language = $_COOKIE["language"] ?? "en";
include $language . '.php';
include 'connect.php';
$settings = $conn->prepare("SELECT setting_value as Logo FROM settings WHERE setting_name='Logo'");
$settings->execute();
$logo = (($settings->get_result())->fetch_assoc())['Logo'];
session_start(); ?>
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
  <link rel="icon" type="image/png" href="<?= $logo ?>" />
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</head>

<body onload="menu()">
  <form id="selectLang" action="updateLang.php" method="post">
    <select name="lang" onchange="this.form.submit()">
      <option value="<?= $language ?>"><?= $language == "en" ? "English 🇺🇸" : "Arabic 🇸🇦" ?></option>
      <option value="<?= $language == "en" ? "ar" : "en" ?>"><?= $language == "en" ? "Arabic 🇸🇦" : "English 🇺🇸" ?></option>
    </select>
  </form>
  <!-- Start Header -->
  <div id="header" class="header">
    <div class="container">
      <div class="logo">
        <a href="index.php"><img src="<?= $logo ?>" alt="" /></a>
      </div>
      <div onclick="showMenu()" id="bars" class="bars">
        <i class="fa-solid fa-bars"></i>
      </div>
      <ul class="links">
        <li><a class="les-liens" href="index.php#home"><?= $lang["Home"] ?></a></li>
        <li><a class="les-liens" href="index.php#About"><?= $lang["About"] ?></a></li>
        <li><a class="les-liens" href="index.php#Impact"><?= $lang["Impact"] ?></a></li>
        <li><a class="les-liens" href="index.php#Help"><?= $lang["Help"] ?></a></li>
        <li><a class="les-liens" href="index.php#App"><?= $lang["App"] ?></a></li>
        <li><a class="les-liens" href="index.php#Contact"><?= $lang["Contact"] ?></a></li>
      </ul>
    </div>
  </div>
  <ul id="menu" class="menu">
    <li><a class="les-liens" href="index.php#home"><?= $lang["Home"] ?></a></li>
    <li><a class="les-liens" href="index.php#About"><?= $lang["About"] ?></a></li>
    <li><a class="les-liens" href="index.php#Impact"><?= $lang["Impact"] ?></a></li>
    <li><a class="les-liens" href="index.php#Help"><?= $lang["Help"] ?></a></li>
    <li><a class="les-liens" href="index.php#App"><?= $lang["App"] ?></a></li>
    <li><a class="les-liens" href="index.php#Contact"><?= $lang["Contact"] ?></a></li>
  </ul>
  <!-- End Header -->
  <div class="donate">
    <a id="backButton" href="index.php#Help">
      <?= $lang["Back"] ?>
    </a>
    <div class="main-heading">
      <h2><?= $lang["Donation"] ?></h2>
    </div>

    <div class="container">
      <div class="details">
        <h3><?= $lang["Enter the required information"] ?></h3>
        <form action="donate.php" method="post" onsubmit="showLoad()">
          <input type="text" placeholder="<?= $lang["Full Name"] ?>" name="full_name" id="" required />
          <input type="email" placeholder="<?= $lang["Email"] ?>" name="email" id="" required />
          <p><?= $lang["Select Donation Amount :"] ?></p>
          <div class="amounts">
            <span onclick="setdonate('5')">5dt</span>
            <span onclick="setdonate('10')">10dt</span>
            <span onclick="setdonate('50')">50dt</span>
            <span onclick="setdonate('100')">100dt</span>
          </div>
          <p><?= $lang["Or enter amount"] ?></p>
          <input type="number" name="amount" id="dt" required />

          <p><?= $lang["Payment Method"] ?></p>
          <input type="radio" onclick="check()" name="rd" id="cr" value="Credit Card" required />
          <img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/ejvsftjqtmbmsdhcfzjm" alt="" />
          <input type="radio" onclick="check()" name="rd" id="tel" value="Solde" required />
          <img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/kurmgjpvs4o16zu4rnql" alt="" />
          <div id="phone" class="phone">
            <input type="text" placeholder="<?= $lang["Your Phone Number"] ?>" name="" id="" required />
          </div>
          <div id="credit-card" class="credit-card">
            <input type="text" placeholder="<?= $lang["Card Number"] ?>" name="card_number" id="" />
            <input type="text" placeholder="<?= $lang["Card Holder's Name"] ?> " name="holder_name" id="" /><br />
            <input type="month" name="" id="" />
            <input type="password" placeholder="CVC/CVV" name="card_cvc" id="" />
          </div>
          <input type="submit" value="<?= $lang["Donate"] ?>" name="" id="" />
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
    if (messageText == 'done') {
      Swal.fire({
        title: "<?= $lang["Done"] ?>",
        text: "<?= $lang["Because of your kindness, we can continue our mission and make a real difference , Thank you !"] ?>",
        icon: "success"
      });
    } else if (messageText == "error") {
      Swal.fire({
        title: "<?= $lang["Oops..."] ?>",
        text: "<?= $lang["Something went wrong"] ?>",
        icon: "error",
      })
    }
    <?php unset($_SESSION['status']); ?>
  </script>
</body>

</html>