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
                <a href="index.html"><img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" alt="" /></a>
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
    <p><?php
        session_start();
        echo ("Hello Mr " . $_SESSION["firstname"] . " " . $_SESSION["lastname"])
        ?></p>
    <a href="logout.php">Log out</a>

</body>

</html>