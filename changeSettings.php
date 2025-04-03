<?php
include 'connect.php';
$conn->autocommit(false);
$success = true;
if (isset($_POST["email"])) {
   if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
      $targetDir = "images/";
      $fileName = time() . "_" . basename($_FILES["logo"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath)) {
         $imagePath = $targetFilePath;
         $logo = $conn->prepare("UPDATE settings SET setting_value=? WHERE setting_name='Logo'");
         $logo->bind_param("s", $imagePath);
         $logo->execute();
         if ($logo->affected_rows < 0) {
            $success = false;
            error_log("failed for updating logo ");
         }
      } else {
         $success = false;
         error_log("failed for updating logo ");
      }
   }
   $email = $_POST["email"];
   $number = $_POST["number"];
   $from = $_POST["from"];
   $to = $_POST["to"];
   $fac = $_POST["fac"];
   $insta = $_POST["insta"];
   $link = $_POST["link"];
   $buisness = $from . "-" . $to;
   $queries = [
      "email" => ["UPDATE settings SET setting_value=? WHERE setting_name='email'", $email],
      "number" => ["UPDATE settings SET setting_value=? WHERE setting_name='Pnumber'", $number],
      "buisness_hours" => ["UPDATE settings SET setting_value=? WHERE setting_name='buisness_hours'", $buisness],
      "facebook" => ["UPDATE settings SET setting_value=? WHERE setting_name='facebook'", $fac],
      "instagram" => ["UPDATE settings SET setting_value=? WHERE setting_name='instagram'", $insta],
      "linkedin" => ["UPDATE settings SET setting_value=? WHERE setting_name='linkedin'", $link],
   ];

   foreach ($queries as $name => $queryDetails) {
      $query = $conn->prepare($queryDetails[0]);
      if (!$query) {
         $success = false;
         error_log("failed for " . $name . " " . $conn->error);
         break;
      }
      $query->bind_param("s", $queryDetails[1]);
      if (!$query->execute()) {
         $success = false;
         error_log("failed for " . $name . " " . $query->error);
         break;
      }
      $query->close();
   }
   if ($success) {
      $conn->commit();
      $_SESSION["updated"] = "updated";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   } else {
      $conn->rollback();
      $_SESSION["updated"] = "error";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   }
   $conn->autocommit(true);
}
