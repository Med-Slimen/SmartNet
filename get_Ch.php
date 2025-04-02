<?php
include 'connect.php';
session_start();
$query = $conn->prepare("SELECT* FROM chatrooms");
$query->execute();
$res = $query->get_result();
if ($res->num_rows > 0) {
   $chatrooms = [];
   while ($room = $res->fetch_assoc()) {
      $chatrooms[] = $room;
   }
   echo (json_encode($chatrooms));
} else {
   echo (json_encode("nope"));
}
