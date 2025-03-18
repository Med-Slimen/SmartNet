<?php
include 'connect.php';
if (isset($_POST["id_events"])) {
    $eventId = $_POST["id_events"];
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $eventDesc = $_POST["eventDesc"];
    $eventImg = $_POST["eventImg"];
    $eventLocation = $_POST["eventLocation"];
    $query = $conn->prepare("UPDATE events SET event_name=?, event_desc=?, event_date=?, event_img=?,event_location=?  WHERE id_events=?");
    $query->bind_param("ssssss", $eventName, $eventDesc, $eventDate, $eventImg, $eventLocation, $eventId);
    $query->execute();
    if ($query->affected_rows > 0) {
        $activiy_type = "Event Editing";
        $activiy_description = $eventName . " Event Edited ";
        $icon = "fa-solid fa-calendar-check";
        $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
        $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
        $query2->execute();
        if ($query2->affected_rows > 0) {
            header("Location: eventPanel.php");
        } else {
            echo ("<script>alert('server probleme')</script>");
        }
    } else {
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
}
