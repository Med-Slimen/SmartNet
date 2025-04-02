<?php
include 'connect.php';
session_start();
if (isset($_POST["chatroomName"])) {
   $chatroomName = $_POST["chatroomName"];
   $chatroomDescription = $_POST["chatroomDescription"];
   $created_at = date('Y-m-d H:i:s');
   $query = $conn->prepare("INSERT INTO chatrooms VALUES('',?,?,?)");
   $query->bind_param("sss", $chatroomName, $chatroomDescription, $created_at);
   $query->execute();
   if ($query->affected_rows > 0) {
      $_SESSION["chatCreated"] = "done";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   } else {
      $_SESSION["chatCreated"] = "error";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   }
}
