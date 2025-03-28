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
  <link rel="stylesheet" href="css/events.css" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+IN:wght@100..400&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="<?= $logo ?>" />
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
  <div class="events">
    <div class="main-heading">
      <h2><?= $lang["Events"] ?></h2>
    </div>
    <a id="backButton" href="index.php#Help">
      <?= $lang["Back"] ?>
    </a>
    <div class="container">
      <?php
      $query = $conn->prepare("SELECT * FROM events");
      $query->execute();
      $result = $query->get_result();
      if ($result->num_rows <= 0) {
      ?><div class="no-event">
          <h1><?= $lang["There is no event at the moment"] ?></h1>
        </div><?php
            } else {
              while ($event = $result->fetch_assoc()) {
              ?>
          <div class="box">
            <div class="image">
              <img src="<?php echo ($event["event_img"]) ?>" alt="" />
            </div>
            <div class="text">
              <h3><?php echo ($event["event_name"]) ?></h3>
              <p><?php echo ($event["event_date"]) ?></p>
              <div class="countdown">
                <div class="timer" date="<?php echo ($event["event_date"]) ?>">
                  <span class="days"></span>
                  <span>|</span>
                  <span class="hours"></span>
                  <span>|</span>
                  <span class="minutes"></span>
                  <span>|</span>
                  <span class="secondes"></span>
                </div>
                <div imgUrl="<?php echo ($event["event_img"]) ?>" eventName="<?php echo ($event["event_name"]) ?>" eventId="<?php echo ($event["id_events"]) ?>" class="button">
                  <a href="eventform.php"><?= $lang["I'm in !"] ?></a>
                </div>
              </div>
            </div>
          </div>
      <?php }
            }
      ?>
    </div>
  </div>
  <script src="index.js"></script>
</body>

</html>