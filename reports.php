<?php
include 'connect.php';
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
        echo ("report sent");
    } else {
        echo ("error");
    }
}
