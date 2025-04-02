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
      echo (json_encode(("done")));
   } else {
      echo (json_encode(("error")));
   }
}
