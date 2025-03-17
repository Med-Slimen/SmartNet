<?php
include 'connect.php';
session_start();
if (isset($_POST["fileimg"])) {
    if (!empty($_POST["fileimg"])) {
        $imgUrl = $_POST["fileimg"];
    } else {
        $imgUrl = "No Image Attached";
    }
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $issue = $_POST["issue"];
    $description = $_POST["description"];
    $query = $conn->prepare("INSERT INTO reports VALUES('',?,?,?,?,?,?)");
    $query->bind_param("ssssss", $fullname, $email, $location, $issue, $description, $imgUrl);
    $query->execute();
    if ($query->affected_rows > 0) {
        $activiy_type = "New Report";
        $activiy_description = $fullname . " Sent a Report ";
        $icon = "fa-solid fa-circle-exclamation";
        $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
        $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
        $query2->execute();
        if ($query2->affected_rows > 0) {
            $query3 = $conn->prepare("UPDATE noti SET noti_count=noti_count+1 WHERE noti_name='report'");
            $query3->execute();
            if ($query3->affected_rows > 0) {
                $_SESSION['status'] = "Your report has been sent successfully !";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit(0);
            } else {
                echo ("<script>alert('server probleme')</script>");
            }
        } else {
            echo ("<script>alert('server probleme')</script>");
        }
    } else {
        echo ("error");
    }
}
