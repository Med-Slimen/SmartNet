<?php
include 'connect.php';
session_start();
$verified = $_SESSION["verified"] ?? "";
if ($verified == "true") {
   $token = $_SESSION["remeber_token"];
   $expire = $_SESSION["remeber_token_expire"];
   $admin_id = $_SESSION["admin_id"];
   $set_token = $conn->prepare("UPDATE admins SET admin_token=?,admin_token_expire=? WHERE admin_id=?");
   $set_token->bind_param("sii", $token, $expire, $admin_id);
   $set_token->execute();
   setcookie("token", $token, $expire);
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
   <link rel="stylesheet" href="css/adminPanel.css" />
   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Playwrite+IN:wght@100..400&display=swap" rel="stylesheet" />
   <link rel="icon" type="image/png" href="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" />
   <script src="index.js"></script>
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
            <li><a class="les-liens" href="#home">Back to client side</a></li>
         </ul>
      </div>
   </div>
   <ul id="menu" class="menu">
      <li><a href="#home">Back to client side</a></li>
   </ul>
   <!-- End Header -->
   <div class="login">
      <div class="container">
         <div class="logo">
            <a href="index.html"><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" alt="" /></a>
         </div>
         <h3>Verification code</h3>
         <form action="checkCode.php" class="login-form" method="post">
            <input type="text" placeholder="Enter the verification code" name="verifCode" required>
            <p style="color: tomato;
    padding: 0 0 0 15px;
    font-size: 17px;
    font-weight: bold;" id="wrong"></p>
            <label>Trust this device ?</label>
            <input type="checkbox" checked onclick="showDeviceName()">
            <input type="text" id="deviceName" required="true" name="deviceName" placeholder="Device Name : e.g., 'Office PC' or 'Home Laptop'">
            <input type="submit" value="Check">
         </form>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <script>
      let verified = "<?= $_SESSION["verified"] ?? "" ?>"
      let trust = "<?= $_SESSION["trust"] ?? "" ?>"
      if (trust == 'false') {
         Swal.fire({
            title: "Oops...",
            text: "Server Probleme",
            icon: "error"
         });
      } else {
         if (verified == "true") {
            window.location.replace("dashboard.php");
         } else if (verified == "false") {
            document.getElementById("wrong").innerHTML = "Wrong code !!"
         }
      }
      <?php unset($_SESSION['verified']); ?>
      <?php unset($_SESSION['trust']); ?>
   </script>
</body>

</html>