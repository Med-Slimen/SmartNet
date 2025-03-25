<?php
include 'connect.php';
session_start();
session_unset();
session_destroy();
if (isset($_COOKIE["token"])) {
   $token = $_COOKIE["token"];
   $set_token = $conn->prepare("UPDATE admins SET admin_token=NULL,admin_token_expire=NULL WHERE admin_token=?");
   $set_token->bind_param("s", $token);
   $set_token->execute();
   setcookie("token", "", 1);
}
header("Location: adminPanel.php");
exit();
