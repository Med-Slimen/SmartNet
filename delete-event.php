<?php
include 'connect.php';
$idEvent = $_POST["id_events"];
$q = $conn->prepare("SELECT event_name FROM events WHERE id_events=?");
$q->bind_param("s", $idEvent);
$q->execute();
$res = $q->get_result();
$eventName = ($res->fetch_assoc())["event_name"];
$query = $conn->prepare("DELETE FROM events WHERE id_events = ?");
$query->bind_param("i", $idEvent);
if ($query->execute()) {
    $activiy_type = "Event Deleted";
    $activiy_description = $eventName . " Event Got Deleted";
    $icon = "fa-solid fa-calendar-xmark";
    $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
    $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
    $query2->execute();
    if ($query2->affected_rows > 0) {
        header("Location: eventPanel.php");
    } else {
        echo ("<script>alert('server probleme')</script>");
    }
} else {
    echo ("error");
}
