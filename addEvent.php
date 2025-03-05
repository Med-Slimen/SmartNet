<?php
include 'connect.php';
if (isset($_POST["eventName"])) {
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $eventDesc = $_POST["eventDesc"];
    $eventImg = $_POST["eventImg"];
    $query = $conn->prepare("INSERT INTO events VALUES('',?,?,?,?)");
    $query->bind_param("ssss", $eventName, $eventDesc, $eventDate, $eventImg);
    $query->execute();
    if ($query->affected_rows > 0) {
        header("Location: eventPanel.php");
    } else {
        echo ("<script>alert('server probleme')</script>");
    }
}
