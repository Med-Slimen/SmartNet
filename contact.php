<?php
include 'connect.php';
session_start();
if (isset($_POST["fullname"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $query = $conn->prepare("INSERT INTO contact VALUES ('',?,?,?)");
    $query->bind_param("sss", $fullname, $email, $description);
    $query->execute();
    if ($query->affected_rows > 0) {
        $activiy_type = "New Feedback";
        $activiy_description = $fullname . " Sent a new feedback";
        $icon = "fa-solid fa-envelope";
        $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
        $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
        $query2->execute();
        if ($query2->affected_rows > 0) {
            $query3 = $conn->prepare("UPDATE noti SET noti_count=noti_count+1 WHERE noti_name='contact'");
            $query3->execute();
            if ($query3->affected_rows > 0) {
                $_SESSION["sent"] = "sent";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit();
            } else {
                $_SESSION["sent"] = "nope";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit();
            }
        } else {
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit();
        }
    } else {
        header("Location: {$_SERVER["HTTP_REFERER"]}");
        exit();
    }
}
