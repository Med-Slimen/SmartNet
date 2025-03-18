<!-- email_template.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f4;
         padding: 20px;
      }

      img {
         width: 100px;
         max-width: 100%;
      }

      .email-container {
         background: #ededed;
         padding: 20px;
         width: 80%;
         border-radius: 10px;
         margin: 0 auto;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }

      h2 {
         color: blue;
      }

      .emoji {
         display: inline-block;
         width: 1.3em;
         height: 1em;
         font-size: 1.3em;
         line-height: 1;
         vertical-align: middle;
      }
   </style>
</head>

<body>

   <div class="email-container">
      <div style="margin:0 auto;width:fit-content;">
         <img src="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul">
      </div>
      <p style="line-height: 2;font-size: 20px;word-spacing: 2;"><span style="font-weight:bold ;margin-top:10px;">Hello <?= $_SESSION["fname"] ?>,</span><br>
      <div style="padding: 20px;line-height: 2;font-size: 20px;word-spacing: 2;">

         Thank you for registering for <?= $_SESSION["event_name"] ?> Event ! <span class="emoji">&#128519;</span>
         <br>
         <img style="width: 400px;padding:10px ;" src="<?= $_SESSION["event_img"] ?> "><br>
         Here are the details <span class="emoji"> &#128195;</span>:<br>

         Date <span class="emoji"> &#128198;</span> : <?= $_SESSION["event_date"] ?><br>
         Location<span class="emoji"> &#128205;</span>: <a target="_blank" href="<?= $_SESSION["event_location"] ?>">Here</a><br>
         We will send you a reminder one day before the event.<br>
         See you soon!<br>
      </div>

      <span style="font-weight:bold ;margin-top:10px;line-height: 2;font-size: 20px;word-spacing: 2;">The SmarNet team</span><br>
      </p>

   </div>
</body>

</html>