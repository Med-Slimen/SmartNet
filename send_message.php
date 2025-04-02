<?php
include 'connect.php';
session_start();
if (isset($_POST["msg"])) {
   $msg = $_POST["msg"];
   $chatroomId = $_POST["chatroomId"];
   $adminId = $_POST["adminId"];
   $adminName = $_POST["adminName"];
   $adminAvatar = $_POST["adminAvatar"];
   $query = $conn->prepare("INSERT INTO messages VALUES('',?,?,?,?,?)");
   $query->bind_param("iisss", $chatroomId, $adminId, $adminName, $adminAvatar, $msg);
   $query->execute();
   if ($query->affected_rows > 0) {
      echo (json_encode("sent"));
   } else {
      echo (json_encode("error"));
   }
}
