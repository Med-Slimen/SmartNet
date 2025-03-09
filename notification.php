<?php
include 'connect.php';
$query = $conn->prepare("SELECT* FROM noti");
$query->execute();
$res = $query->get_result();
$notification = [];
while ($element = $res->fetch_assoc()) {
    $notification[$element["noti_name"]] = $element["noti_count"];
}
echo json_encode($notification);
