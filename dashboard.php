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
  <div class="menu">
    <div class="links">
      <ul>
        <a><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul"></a>
        <li onclick="showDash()" id="dashBtn" class="clicked"><i class="fa-solid fa-chart-simple"></i>
          Dashboard</li>
        <li onclick="showEvents()" id="eventBtn"><i class="fa-solid fa-calendar-days"></i>
          Events</li>
        <li onclick="showDonations()" id="donationBtn"><i class="fa-solid fa-circle-dollar-to-slot"></i>
          Donations</li>
        <li onclick="showReports()" id="reportBtn"><i class="fa-solid fa-circle-exclamation"></i>
          Reports</li>
        <li onclick="showContact()" id="contactBtn"><i class="fa-solid fa-envelope-open-text"></i>
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
      <li onclick="showDonations()"><i class="fa-solid fa-circle-dollar-to-slot"></i>
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
    <div id="dashboard" class="dashboard">
      <h2>Dashboard</h2>
      <div class="card-section">
        <div class="card">
          <p>100$</p>
          <h3>Total donation</h3>
          <i class="fa-solid fa-hand-holding-dollar"></i>
        </div>
        <div class="card">
          <p>360kg</p>
          <h3>Total garbage collected</h3>
          <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" style="fill: black">
            <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
          </svg>
        </div>
        <div class="card">
          <p>70</p>
          <h3>Active events</h3>
          <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="card">
          <p>15</p>
          <h3>Valleys Reports</h3>
          <i class="fa-solid fa-file-circle-exclamation"></i>
        </div>
      </div>
      <div class="activity-section">
        <div class="recent-activity">
          <h3>Recent Activiy</h3>
          <div class="activity">
            <table border="3" style="width: 100%; text-align: left">
              <thead>
                <tr>
                  <th>Activiy type</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tr>
                <td title="Activiy type :">Test</td>
                <td title="Description :">Test</td>
              </tr>
              <tr>
                <td title="Activiy type :">Test</td>
                <td title="Description :">Test</td>
              </tr>
              <tr>
                <td title="Activiy type :">Test</td>
                <td title="Description :">Test</td>
              </tr>
              <tr>
                <td title="Activiy type :">Test</td>
                <td title="Description :">Test</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- <div class="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7638.011914274737!2d10.608915358465138!3d36.399796709139025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2stn!4v1739750161883!5m2!1sen!2stn"
              width="600"
              height="380"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div> -->
      </div>
    </div>
    <div id="events" class="events">
      <h1>Events</h1>
      <div class="header-event">
        <h2>Events list</h2>
        <button onclick="showAddEvent()" id="addbt">Add Event</button>
        <div class="add-event">
          <i class="fa-solid fa-xmark xmark" onclick="hideAddEvent()"></i>
          <h3>Add Event</h3>
          <form action="addEvent.php" method="post">
            <input type="text" placeholder="Event Name" name="eventName" required>
            <input type="datetime-local" placeholder="Event Date" name="eventDate" required>
            <input type="text" placeholder="Event Description" name="eventDesc" required>
            <input type="text" placeholder="Event Image Url" name="eventImg" required>
            <input type="submit" name="add" value="Add Event">
            <input type="reset" name="reset" value="Reset">
          </form>
        </div>
      </div>
      <div class="events-list">
        <table border="3">
          <thead>
            <tr>
              <th>Event Name</th>
              <th>Event Description</th>
              <th>Event Date</th>
              <th>Delete/Edit Event</th>
            </tr>
          </thead>
          <?php
          $dt_qeury = $conn->prepare("SELECT * FROM events");
          $dt_qeury->execute();
          $res = $dt_qeury->get_result();
          while ($dt = $res->fetch_assoc()) {
          ?>
            <tr id="<?php echo ($dt['id_events']) ?>">
              <td title="Event Name :"><?php echo ($dt["event_name"]) ?></td>
              <td title="Event Description :"><?php echo ($dt["event_desc"]) ?></td>
              <td title="Event Date :"><?php echo ($dt["event_date"]) ?></td>
              <td title="Delete Event">
                <div class="buttons">
                  <button id="delbtn" onclick="showConf(<?php echo ($dt['id_events']) ?>)" class="delbt">Delete</button>
                  <button id="editbtn" onclick="showEditEvent(<?php echo ($dt['id_events']) ?>)" class="editbtn">Edit</button>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
        <div id="delete-conf" class="delete-conf">
          <h2>Are you sure ?</h2>
          <div class="choice">
            <a id="no" href="#">
              <h3>No</h3>
            </a>
            <form action="delete-event.php" method="post">
              <input type="hidden" id="idEvent" name="id_events">
              <input type="submit" id="yes" value="Yes">
            </form>
          </div>
        </div>
        <div id="edit-event" class="edit-event">
          <i class="fa-solid fa-xmark xmark" onclick="hideEditEvent()"></i>
          <h3>Edit Event</h3>
          <form action="editEvent.php" method="post">
            <input type="text" placeholder="Event Name" name="eventName" required>
            <input type="datetime-local" placeholder="Event Date" name="eventDate" required>
            <input type="text" placeholder="Event Description" name="eventDesc" required>
            <input type="text" placeholder="Event Image Url" name="eventImg" required>
            <input type="hidden" id="idEvent" name="id_events">
            <input type="submit" name="add" value="Edit Event">
            <input type="reset" name="reset" value="Reset">
          </form>
        </div>
      </div>
    </div>
    <div id="donations" class="donations">
      <h1>Donations</h1>
      <div class="card-section">
        <div class="card">
          <h3>Total donation</h3>
          <p>100$</p>
          <i class="fa-solid fa-hand-holding-dollar"></i>
        </div>
        <div class="card">
          <h3>Donations Today</h3>
          <p>20$</p>
          <i class="fa-solid fa-money-bill-trend-up"></i>
        </div>
        <div class="card">
          <h3>Total Donors</h3>
          <p>70</p>
          <i class="fa-solid fa-users"></i>
        </div>
      </div>
      <div class="dt-details">
        <div class="recent-dt">
          <h2>Recent Donations</h2>
          <table border="3">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Payment Methode</th>
              </tr>
            </thead>
            <?php
            $dt_qeury = $conn->prepare("SELECT * FROM donations");
            $dt_qeury->execute();
            $res = $dt_qeury->get_result();
            while ($dt = $res->fetch_assoc()) {
            ?>
              <tr>
                <td title="Full Name :"><?php echo ($dt["dt_fullname"]) ?></td>
                <td title="Email :"><?php echo ($dt["dt_email"]) ?></td>
                <td title="Date :"><?php echo ($dt["dt_date"]) ?></td>
                <td title="Amount :"><?php echo ($dt["dt_amount"] . "$") ?></td>
                <td title="Payment Method :"><?php echo ($dt["dt_paymethode"]) ?></td>
              </tr>
            <?php
            }
            ?>
          </table>
        </div>
        <div class="top-dt">
        </div>
      </div>
    </div>
    <div id="reports" class="reports">
      <h1>Reports</h1>
      <div class="reports-list">
        <table border="3">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Email</th>
              <th>Location</th>
              <th>Issue Type</th>
              <th>Description</th>
              <th>Attached Photo</th>
            </tr>
          </thead>
          <?php
          $rp_qeury = $conn->prepare("SELECT * FROM reports");
          $rp_qeury->execute();
          $res = $rp_qeury->get_result();
          while ($rp = $res->fetch_assoc()) {
          ?>
            <tr id="<?php echo ($dt['id_events']) ?>">
              <td title="Full Name :"><?php echo ($rp["report_fullname"]) ?></td>
              <td title="Email :"><?php echo ($rp["report_email"]) ?></td>
              <td title="Location :"><?php echo ($rp["report_location"]) ?></td>
              <td title="Issue Type :"><?php echo ($rp["report_issue_type"]) ?></td>
              <td title="Description :"><?php echo ($rp["report_description"]) ?></td>
              <td title="Attached Photo :"><button id="showimg" onclick="showImg('<?php echo ($rp['report_img']) ?>')">Show Image</button></td>
            </tr>
          <?php
          }
          ?>
        </table>
        <div class="imgShow">
          <i class="fa-solid fa-xmark xmark" onclick="hideImg()"></i>
          <img id="attachedPhoto" src="">
        </div>
      </div>
    </div>
  </div>
</body>

</html>