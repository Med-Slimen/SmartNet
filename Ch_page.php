<?php
include 'connect.php';
session_start(); // Start the session
if (isset($_SESSION["logged"])) {
  if (!$_SESSION["logged"]) {
    header("Location: adminPanel.php");
    exit();
  }
} else {
  header("Location: adminPanel.php");
  exit();
}
$timeout_duration = 1800; // 30 minutes (in seconds)

// Check if the last activity time is set
if (isset($_SESSION['LAST_ACTIVITY'])) {
  $time_since_last_activity = time() - $_SESSION['LAST_ACTIVITY'];

  // If the user has been inactive for too long, destroy the session
  if ($time_since_last_activity > $timeout_duration) {
    session_unset();  // Clear session data
    session_destroy(); // Destroy the session
    header("Location: adminPanel.php?timeout=true"); // Redirect to login
    exit();
  }
}

// Update last activity timestamp
$_SESSION['LAST_ACTIVITY'] = time();
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
  <script src="Ch_page.js"></script>
</head>

<body onload="onload()">
  <div id="dropDown-chat-arrow"><i class="fa-solid fa-arrow-down"></i></div>
  <div class="chatrooms">
    <div class="chatrooms_header">
      <h1>Chatrooms</h1>
      <p onclick="showCreateChatroom()" id="plus">
        <i class="fa-solid fa-plus"></i>
      </p>
    </div>
    <!-- <div  class="room">
      <div class="text">
        <h3>Chatroom Name</h3>
        <p>description</p>
      </div>
    </div> -->
  </div>
  <div class="chatroom_messages">
    <div class="overlay">
      <p>No Chatroom Selected</p>
    </div>
    <div style="z-index: 100;position: relative;" class="header">
      <h3 id="chatName"></h3>
      <div class="profile">
        <a href="dashboard.php" target="_blank">Dashboard <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        <img src="<?= $_SESSION['avatar'] ?>" alt="" />
      </div>
    </div>
    <div class="messages" admin_id="<?= $_SESSION["admin_id"] ?>">
      <!-- <div class="message">
        <div class="msg ">
          <div class="content">
            <p id="msg_adminName">Admin Name</p>
            <p>Test</p>
          </div>
          <div class="avatar">

            <img src="images/default_user.png" alt="" />
          </div>
        </div>
      </div> -->
    </div>
    <div class="footer">
      <form id="sendForm" onsubmit="sendMessage(event)">
        <input type="text" placeholder="Send a message" onkeydown="enter(event)" required name="msg" id="inputMessage" />
        <input type="hidden" value="" id="inputChatroomId" name="chatroomId">
        <input type="hidden" value="<?= $_SESSION["admin_id"] ?>" id="inputAdminId" name="adminId">
        <input type="hidden" value="<?= $_SESSION["firstname"] . " " . $_SESSION["lastname"] ?>" id="inputAdminName" name="adminName">
        <input type="hidden" value="<?= $_SESSION["avatar"] ?>" id="inputAdminAvatar" name="adminAvatar">
        <input type="submit" id="sendBtn" value="Send" />
      </form>
    </div>
  </div>
  <div class="createChatroom">
    <p onclick="unshowCreateChatroom()" id="close">
      <i class="fa-solid fa-xmark"></i>
    </p>
    <form onsubmit="createChatroom(event)">
      <label for="">Chatroom Name :</label><br />
      <input type="text" name="chatroomName" required /><br />
      <label for="">Chatroom Description :</label><br />
      <input type="text" name="chatroomDescription" required /><br />
      <input type="submit" value="Create" name="" id="" />
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    let created = "<?= $_SESSION["chatCreated"] ?? "" ?>"
    if (created === "done") {
      Swal.fire({
        title: "Done",
        text: "Chatroom Created successfully",
        icon: "success",
      })
    } else if (created === "error") {
      Swal.fire({
        title: "Oops...",
        text: "Something went wrong",
        icon: "error",
      })
    }
    <?php unset($_SESSION['chatCreated']); ?>
  </script>
</body>

</html>