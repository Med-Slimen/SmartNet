<?php
include 'connect.php';

session_start();

if (!isset($_SESSION['logged'])) {
  header("Location: adminPanel.php");
}



?>
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
  <!--Main template css file-->
  <link rel="stylesheet" href="css/dashboard.css" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+IN:wght@100..400&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" />
  <script src="adminPanel.js"></script>
</head>

<body onload="onload()">
  <div class="overlay">
  </div>
  <div class="menu">
    <div class="links">
      <ul>
        <a><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul"></a>

        <li class="menu_links" tabName="dashboard" notification="0" onclick="showDash(this)" id="dashBtn" class="clicked"><i class="fa-solid fa-chart-simple"></i>
          Dashboard</li>
        <li class="menu_links" tabName="event" notification="0" onclick="showEvents(this)" id="eventBtn"><i class="fa-solid fa-calendar-days"></i>
          Events</li>
        <li class="menu_links" tabName="donation" notification="0" onclick="showDonations(this)" id="donationBtn"><i class="fa-solid fa-circle-dollar-to-slot"></i>
          Donations</li>
        <li class="menu_links" tabName="report" notification="0" onclick="showReports(this)" id="reportBtn"><i class="fa-solid fa-circle-exclamation"></i>
          Reports</li>
        <li class="menu_links" tabName="contact" notification="0" onclick="showContact(this)" id="contactBtn"><i class="fa-solid fa-envelope-open-text"></i>
          Contact Submissions</li>
        <li onclick="showSetting()" id="settingBtn"><i class="fa-solid fa-gear"></i>
          Settings</li>
      </ul>
    </div>
  </div>
  <div class="mobile-menu">
    <div class="icon"><i class="fa-solid fa-arrow-down"></i></div>
    <ul>
      <li onclick="showDash()"><i class="fa-solid fa-chart-simple"></i>
        Dashboard</li>
      <li onclick="showEvents()"><i class="fa-solid fa-calendar-days"></i>
        Events</li>
      <li notification="1" onclick="showDonations()"><i class="fa-solid fa-circle-dollar-to-slot"></i>
        Donations</li>
      <li onclick="showReports()"><i class="fa-solid fa-circle-exclamation"></i>
        Reports</li>
      <li onclick="showContact()"><i class="fa-solid fa-envelope-open-text"></i>
        Contact Submissions</li>
      <li onclick="showSetting()"><i class="fa-solid fa-gear"></i>
        Settings</li>
    </ul>
  </div>
  <div id="panel" class="panel">
    <div class="header">
      <h2>Welcome <?php echo ($_SESSION['firstname'] . " " . $_SESSION['lastname']); ?></h2>
      <div class="profile">
        <div class="notification">
          <i class="fa-solid fa-bell"></i>
          <span>1</span>
          <div class="notification-list">
            <div class="notification-box">
              <p>Donation From Mester Zan9alou</p>
            </div>
          </div>
        </div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Outdoors-man-portrait_%28cropped%29.jpg" alt="" />
        <div class="profile-settings">
          <ul>
            <a href="">
              <li>Profile</li>
            </a>
            <a href="">
              <li>Settings</li>
            </a>
            <a href="logout.php">
              <li>Log out</li>
            </a>
          </ul>
        </div>
      </div>
    </div>
    <iframe id="iframe_dashboard" src="dashboardPanel.php" style="width: 100%; height: calc( 100vh - 125px ); border: none; display:block ;"></iframe>
    
    <iframe id="iframe_events" src="eventPanel.php" style="width: 100%; height: calc( 100vh - 125px ); border: none; display:none ;"></iframe>
    <iframe id="iframe_donations" src="donationsPanel.php" style="width: 100%; height: calc( 100vh - 125px ); border: none; display:none"></iframe>

    <iframe id="iframe_reports" src="reportPanel.php" style="width: 100%; height: calc( 100vh - 125px ); border: none; display:none"></iframe>

    <iframe id="iframe_contact" src="contactPanel.php" style="width: 100%; height: calc( 100vh - 125px ); border: none; display:none"></iframe>
  </div>
</body>

</html>