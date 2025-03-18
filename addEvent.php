<?php
include 'connect.php';
if (isset($_POST["eventName"])) {
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $eventDesc = $_POST["eventDesc"];
    $eventImg = $_POST["eventImg"];
    $eventLocation = $_POST["eventLocation"];
    $query = $conn->prepare("INSERT INTO events VALUES('',?,?,?,?,?,'')");
    $query->bind_param("sssss", $eventName, $eventDesc, $eventDate, $eventImg, $eventLocation);
    $query->execute();
    if ($query->affected_rows > 0) {
        $activiy_type = "Creation of Event";
        $activiy_description = $eventName . " Event created";
        $icon = "fa-solid fa-calendar-plus";
        $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
        $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
        $query2->execute();
        if ($query2->affected_rows > 0) {
            header("Location: eventPanel.php");
        } else {
            echo ("<script>alert('server probleme')</script>");
        }
    } else {
        echo ("<script>alert('server probleme')</script>");
    }
}
