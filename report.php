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
  <link rel="stylesheet" href="css/report.css" />
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
  <div class="report">
    <a id="backButton" href="index.php#Help">
      <?= $lang["Back"] ?>
    </a>
    <div class="main-heading">
      <h2> <?= $lang["Report A Valley"] ?></h2>
    </div>

    <p>
      <?= $lang["Help us keep our environment clean by reporting valley pollution or hazards."] ?>
    </p>
    <div class="container">
      <div class="form">
        <form action="reports.php" method="post" id="form" onsubmit="return checkReport()" enctype="multipart/form-data">
          <label for=""><?= $lang["Full Name"] ?></label>
          <input type="text" placeholder="<?= $lang["Full Name"] ?>" name="fullname" id="fullname" required />
          <label for=""><?= $lang["Email"] ?></label>
          <input type="email" placeholder="<?= $lang["Email"] ?>" name="email" id="email" required />
          <label for=""><?= $lang["Valley Location"] ?></label>
          <input type="text" placeholder="<?= $lang["Valley Location"] ?>" name="location" id="" required />
          <label for=""><?= $lang["Type of Issue"] ?></label>
          <select name="issue" id="" required>
            <option value="Littering"><?= $lang["Littering"] ?></option>
            <option value="Water Polluting"><?= $lang["Water Polluting"] ?></option>
            <option value="Blockage/Debris"><?= $lang["Blockage/Debris"] ?></option>
            <option value="Other"><?= $lang["Other"] ?></option>
          </select>
          <label for=""><?= $lang["Description"] ?></label>
          <textarea name="description" placeholder="<?= $lang["Provide additional details"] ?>" id="" cols="30" rows="10" required></textarea>
          <label for=""><?= $lang["Attach a photo ( optional )"] ?></label>
          <input type="file" name="report_img" id="report_img" accept="image/*" />
          <input type="hidden" name="fileimg" id="fileimg" />
          <input type="submit" value="<?= $lang["Send"] ?>" name="" id="" />
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
        text: "<?= $lang["Your report has been sent successfully !"] ?>",
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