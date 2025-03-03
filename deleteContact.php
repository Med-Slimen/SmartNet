<?php
include 'connect.php';
if (isset($_POST['id_contact'])) {
    $id_contact = $_POST['id_contact'];
    $query = $conn->prepare("DELETE FROM contact WHERE id_contact=?");
    $query->bind_param("s", $id_contact);
    $query->execute();
    if ($query->affected_rows > 0) {
        header("Location: dashboard.php");
    } else {
        echo ("error");
    }
}
