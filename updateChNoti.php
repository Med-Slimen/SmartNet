<?php
include 'connect.php';
if (isset($_POST["chatroomId"])) {
   $admin_id = $_POST["adminId"];
   $chatroomId = $_POST["chatroomId"];
   $query = $conn->prepare("UPDATE chatroom_noti SET noti_count=noti_count+1 WHERE chatroom_id=? AND admin_id!=?");
   $query->bind_param("ii", $chatroomId, $admin_id);
   $query->execute();
   if ($query->affected_rows > 0) {
      echo (json_encode("updated"));
   } else {
      echo (json_encode("nope"));
   }
}
