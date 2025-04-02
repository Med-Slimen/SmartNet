<?php
include 'connect.php';
session_start();
if (isset($_COOKIE["token"])) {
  $token = $_COOKIE["token"];
  $token_check = $conn->prepare("SELECT* FROM admins WHERE admin_token=? ");
  $token_check->bind_param("s", $token);
  $token_check->execute();
  $res_token = $token_check->get_result();
  if ($res_token->num_rows > 0) {
    $res_token = $res_token->fetch_assoc();
    $_SESSION['firstname'] = $res_token['firstName'];
    $_SESSION['lastname'] = $res_token['lastName'];
    $_SESSION["email"] = $res_token['email'];
    $_SESSION["logged"] = true;
    header("Location: dashboard.php");
  } else {
    setcookie("token", "", 1);
  }
} elseif (isset($_SESSION["logged"])) {
  header("Location: dashboard.php");
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
</head>

<body>
  <!-- Start Header -->
  <div id="header" class="header">
    <div class="container">
      <div class="logo">
        <a href="index.php"><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" alt="" /></a>
      </div>
      <ul class="links">
        <li><a class="les-liens" href="index.php#home">Back to client side</a></li>
      </ul>
    </div>
  </div>
  <div class="bars"></div>
  <ul id="menu" class="menu">
    <li><a href="#home">Back to client side</a></li>
  </ul>
  <!-- End Header -->
  <div class="login">
    <div class="container">
      <div class="logo">
        <a href="index.html"><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" alt="" /></a>
      </div>
      <h3>Sign In</h3>
      <form action="login.php" class="login-form" method="post">
        <input type="email" name="email" placeholder="Email Here" id="email" required />
        <input type="password" name="password" placeholder="Password Here" id="password" required />
        <input type="checkbox" name="remeb" id="remeb" value="on" />
        <label for="remeb">Remember me</label>
        <input type="submit" value="Login" name="submit" id="submit" />
      </form>
    </div>
  </div>

</body>

</html>