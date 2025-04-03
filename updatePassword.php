<?php
include 'connect.php';
if (isset($_POST["newPass"])) {
   $newPass = $_POST["newPass"];
   $query = $conn->prepare("UPDATE admins SET passwords=? WHERE admin_id=?");
   $query->bind_param("si", $newPass, $_SESSION["admin_id"]);
   $query->execute();
   if ($query->affected_rows > 0) {
      $_SESSION["pass_changed"] = "updated";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   } else {
      $_SESSION["pass_changed"] = "error";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   }
}
