<?php
session_start();
if (isset($_POST["verifCode"])) {
   $verifCode = $_POST["verifCode"];
   if ($verifCode == $_SESSION["code"]) {
      $_SESSION["verified"] = "true";
      $_SESSION["logged"] = "true";
      unset($_SESSION['code']);
      header("Location: {$_SERVER["HTTP_REFERER"]}");
   } else {
      $_SESSION["verified"] = "false";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
   }
}
