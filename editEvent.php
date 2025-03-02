<?php
include 'connect.php';
if (isset($_POST["id_events"])) {
    $eventId = $_POST["id_events"];
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $eventDesc = $_POST["eventDesc"];
    $eventImg = $_POST["eventImg"];
    $query = $conn->prepare("UPDATE events SET event_name=?, event_desc=?, event_date=?, event_img=?  WHERE id_events=?");
    $query->bind_param("sssss", $eventName, $eventDesc, $eventDate, $eventImg, $eventId);
    $query->execute();
    if ($query->affected_rows > 0) {
        header("Location: dashboard.php");
    } else {
        echo ("<script>alert('server probleme')</script>");
    }
}
