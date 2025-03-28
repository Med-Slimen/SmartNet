<?php
include 'connect.php';
session_start();
if ($_POST["fullname"]) {
    if (isset($_FILES["report_img"]) && $_FILES["report_img"]["error"] == 0) {
        $targetDir = "images/";
        $fileName = time() . "_" . basename($_FILES["report_img"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["report_img"]["tmp_name"], $targetFilePath)) {
            $imagePath = $targetFilePath;
        } else {
            die("Error uploading file.");
        }
    } else {
        $imagePath = NULL;
    }
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $issue = $_POST["issue"];
    $description = $_POST["description"];
    $query = $conn->prepare("INSERT INTO reports VALUES('',?,?,?,?,?,?)");
    $query->bind_param("ssssss", $fullname, $email, $location, $issue, $description, $imagePath);
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
                $_SESSION['status'] = "done";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit(0);
            } else {
                $_SESSION['status'] = "error";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "error";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "error";
        header("Location: {$_SERVER["HTTP_REFERER"]}");
        exit(0);
    }
}
