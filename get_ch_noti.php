<?php
include 'connect.php';
if (isset($_POST["admin_id"])) {
   $admin_id = $_POST["admin_id"];
   $query = $conn->prepare("SELECT* FROM chatroom_noti WHERE admin_id=? HAVING noti_count>0");
   $query->bind_param("i", $admin_id);
   $query->execute();
   $res = $query->get_result();
   if ($res->num_rows > 0) {
      $chatroom_noti = [];
      while ($room = $res->fetch_assoc()) {
         $chatroom_noti[strval($room["chatroom_id"])] = $room["noti_count"];
      }
      echo (json_encode($chatroom_noti));
   } else {
      echo (json_encode("empty"));
   }
}
