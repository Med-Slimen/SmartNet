<?php
include 'connect.php';
session_start();
if (isset($_POST["full_name"])) {
    $name = $_POST["full_name"];
    $email = $_POST["email"];
    $amount = $_POST["amount"];
    $payment_method = $_POST["rd"];
    $date = date("Y-m-d h:i:sa");
    $query = $conn->prepare("INSERT INTO donations VALUES('',?,?,?,?,?)");
    $query->bind_param("ssiss", $name, $email, $amount, $payment_method, $date);
    $query->execute();
    if ($query->affected_rows > 0) {
        $activiy_type = "New Donation";
        $activiy_description = $name . " Donated " . $amount . "$";
        $icon = "fa-solid fa-circle-dollar-to-slot";
        $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
        $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
        $query2->execute();
        if ($query2->affected_rows > 0) {
            $query3 = $conn->prepare("UPDATE noti SET noti_count=noti_count+1 WHERE noti_name='donation'");
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
