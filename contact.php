<?php
include 'connect.php';
if (isset($_POST["fullname"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $query = $conn->prepare("INSERT INTO contact VALUES ('',?,?,?)");
    $query->bind_param("sss", $fullname, $email, $description);
    $query->execute();
    if ($query->affected_rows > 0) {
        echo ("feedback sent");
    } else {
        echo ("error");
    }
}
