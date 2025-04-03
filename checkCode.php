<?php
include 'connect.php';
if (isset($_POST["verifCode"])) {
   $verifCode = $_POST["verifCode"];
   if ($verifCode == $_SESSION["code"]) {
      $_SESSION["verified"] = "true";
      $_SESSION["logged"] = "true";
      unset($_SESSION['code']);
      if (isset($_POST["deviceName"]) && $_POST["deviceName"] != "") {
         $admin_id = $_SESSION['admin_id'];
         $deviceName = $_POST["deviceName"];
         $user_agent = $_SERVER['HTTP_USER_AGENT'];
         $trust_token = bin2hex(random_bytes(32));
         $created_at = date('Y-m-d H:i:s', time());
         $expires_at =  date('Y-m-d H:i:s', strtotime("+5 years"));
         $query = $conn->prepare("INSERT INTO trusted_devices VALUES('',?,?,?,?,?,?)");
         $query->bind_param("isssss", $admin_id, $deviceName, $trust_token, $created_at, $expires_at, $user_agent);
         $query->execute();
         if ($query->affected_rows > 0) {
            setcookie("trusted_token", $trust_token, strtotime("+5 years"));
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit();
         } else {
            $_SESSION["trust"] = "false";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit();
         }
      }
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   } else {
      $_SESSION["verified"] = "false";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   }
}
