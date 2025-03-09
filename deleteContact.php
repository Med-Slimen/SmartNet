<?php
include 'connect.php';
if (isset($_POST['id_contact'])) {
    $id_contact = $_POST['id_contact'];
    $q = $conn->prepare("SELECT contact_fullname FROM contact WHERE id_contact=?");
    $q->bind_param("s", $id_contact);
    $q->execute();
    $res = $q->get_result();
    $contactName = ($res->fetch_assoc())["contact_fullname"];
    $query = $conn->prepare("DELETE FROM contact WHERE id_contact=?");
    $query->bind_param("s", $id_contact);
    $query->execute();
    if ($query->affected_rows > 0) {
        $activiy_type = "Feedback Deleted";
        $activiy_description = $contactName . " Feedback Got Deleted";
        $icon = "fa-solid fa-envelope";
        $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
        $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
        $query2->execute();
        if ($query2->affected_rows > 0) {
            header("Location: contactPanel.php");
        } else {
            echo ("<script>alert('server probleme')</script>");
        }
    } else {
        echo ("error");
    }
}
