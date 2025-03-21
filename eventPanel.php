<?php
include 'connect.php';
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

<body>
  <div id="events" class="events">
    <h1>Events</h1>
    <div class="header-event">
      <h2>Events list</h2>
      <button onclick="showAddEvent()" id="addbt">Add Event</button>
      <div class="add-event">
        <i class="fa-solid fa-xmark xmark" onclick="hideAddEvent()"></i>
        <h3>Add Event</h3>
        <form action="addEvent.php" method="post">
          <input type="text" id="addEvent_name" placeholder="Event Name" name="eventName" required />
          <input type="datetime-local" id="addEvent_date" placeholder="Event Date" name="eventDate" required />
          <input type="text" id="addEvent_desc" placeholder="Event Description" name="eventDesc" required />
          <input type="text" id="addEvent_img" placeholder="Event Image Url" name="eventImg" required />
          <input type="text" id="addEvent_location" placeholder="Event Location" name="eventLocation" required />
          <input type="submit" name="add" value="Add Event" />
          <input type="reset" name="reset" value="Reset" />
        </form>
      </div>
    </div>
    <div class="events-list">
      <?php
      $dt_qeury = $conn->prepare("SELECT * FROM events ORDER BY id_events DESC");
      $dt_qeury->execute();
      $res = $dt_qeury->get_result();

      if ($res->num_rows > 0) {
        while ($dt =
          $res->fetch_assoc()
        ) { ?>
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-calendar-check"></i>
              <span>Event :
                <?php echo ($dt["event_name"]) ?>
              </span>
            </div>
            <div class="button">
              <button onclick="showEventDetails('<?php echo ($dt['event_name']) ?>','<?php echo ($dt['event_desc']) ?>','<?php echo ($dt['event_date']) ?>','<?php echo ($dt['id_events']) ?>','<?php echo ($dt['event_img']) ?>','<?php echo ($dt['event_location']) ?>','<?php echo ($dt['registration_count']) ?>')">
                More Details
              </button>
              <button id="delbtn" onclick="showConf(<?php echo ($dt['id_events']) ?>,'idEvent')" class="delbt">
                Delete
              </button>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <div class="noEvent">
          <h2 style="text-align: center; margin-top:50px;">There is no Event Created</h2>
        </div>
      <?php
      }
      ?>
      <div class="box-details">
        <i class="fa-solid fa-xmark xmark" onclick="hideEventDetails()"></i>
        <h1>Event Details</h1>
        <div class="text">
          <span id="event_id_events" style="display: none"></span>
          <p>Name :</p>
          <span id="old_event_name"></span>
          <p>Description :</p>
          <span id="old_event_desc"></span>
          <p>Date :</p>
          <span id="old_event_date"></span>
          <p>Location :</p>
          <span id="old_event_location"></span>
          <p style="font-size: 18px;">People registred : </p>
          <span id="registration_count"> <i class="fa-solid fa-person"></i></span>

          <span style="visibility: hidden;display:none;" id="old_event_img"></span>
        </div>
        <button id="editbtn" onclick="showEditEvent()" class="editbtn">
          Edit
        </button>
      </div>
      <div id="delete-conf" class="delete-conf">
        <h2>Are you sure ?</h2>
        <div class="choice">
          <a id="no" href="#">
            <h3>No</h3>
          </a>
          <form action="delete-event.php" method="post">
            <input type="hidden" id="idEvent" name="id_events" />
            <input type="submit" id="yes" value="Yes" />
          </form>
        </div>
      </div>
      <div id="edit-event" class="edit-event">
        <i class="fa-solid fa-xmark xmark" onclick="hideEditEvent()"></i>
        <h3>Edit Event</h3>
        <form action="editEvent.php" method="post">
          <input type="text" placeholder="Event Name" id="edit_eventName" name="eventName" required />
          <input type="datetime-local" placeholder="Event Date" id="edit_eventDate" name="eventDate" required />
          <input type="text" placeholder="Event Description" id="edit_eventDesc" name="eventDesc" required />
          <input type="text" placeholder="Event Image Url" id="edit_eventImg" name="eventImg" required />
          <input type="text" placeholder="Event Location" id="edit_eventLocation" name="eventLocation" required />
          <input type="hidden" id="idEvent" name="id_events" />
          <input type="submit" name="add" value="Edit Event" />
          <input type="reset" name="reset" value="Reset" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>