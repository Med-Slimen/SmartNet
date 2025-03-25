<!-- email_template.php -->
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
      <span style="font-weight:bold ;margin-top:10px;font-size: 20px;">Hello <?= $_SESSION["email"] ?>,</span><br>
      <p style="line-height: 2;font-size: 20px;word-spacing: 2;padding:10px;">

         We received your request for a single-use code to use with your SmartNet account.<br>

         Your single-use code is: <?= $_SESSION["code"] ?><br>

         Only enter this code on an official website or app. Don't share it with anyone. We'll never ask for it outside an official platform.<br>

         Thanks,<br>

      <div style="padding: 20px;line-height: 2;font-size: 20px;word-spacing: 2;">
      </div>

      <span style="font-weight:bold ;margin-top:10px;line-height: 2;font-size: 20px;word-spacing: 2;">The SmarNet team</span><br>
      </p>

   </div>
</body>

</html>
<?php
unset($_SESSION["email"]);
?>