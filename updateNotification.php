<?php
include 'connect.php';
if (isset($_POST["tabName"])) {
    $tabName = $_POST["tabName"];
    $query = $conn->prepare("UPDATE noti SET noti_count=0 WHERE noti_name=?");
    $query->bind_param("s", $tabName);
    $query->execute();
    header("Location: contactPanel.php");
}
