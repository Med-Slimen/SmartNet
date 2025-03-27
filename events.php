<?php
include 'connect.php';

session_start();
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
  <link rel="icon" type="image/png" href="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" />
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
  <div class="events">
    <div class="main-heading">
      <h2>Events</h2>
    </div>
    <a id="backButton" href="index.php#Help">
      Back
    </a>
    <div class="container">
      <?php
      $query = $conn->prepare("SELECT * FROM events");
      $query->execute();
      $result = $query->get_result();
      if ($result->num_rows <= 0) {
      ?><div class="no-event">
          <h1>There is no event at the moment</h1>
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
                  <a href="eventform.php">I'm in !</a>
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