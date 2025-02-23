<?php
include 'connect.php';
$idEvent = $_POST["id_events"];
echo ($idEvent);
$query = $conn->prepare("DELETE FROM events WHERE id_events = ?");
$query->bind_param("i", $idEvent);
if ($query->execute()) {
    header("Location: dashboard.php");
} else {
    echo ("error");
}
