<?php
include 'connect.php';
session_start();
$query = $conn->prepare("SELECT* FROM messages");
$query->execute();
$res = $query->get_result();
if ($res->num_rows > 0) {
   $messages_details = [];
   while ($room = $res->fetch_assoc()) {
      $messages_details[] = $room;
   }
   echo (json_encode($messages_details));
} else {
   echo (json_encode("nope"));
}
