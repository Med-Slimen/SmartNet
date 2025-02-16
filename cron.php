<?php
include 'connect.php';
if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = "male";
    if ($_POST['rad'] === 'female') {
        $gender = 'female';
    }
    $query = $conn->prepare("INSERT INTO `event-register`(`id`, `firstName`, `lastName`, `email`) VALUES ('','$fname','$lname','$email')");
    $query->execute();
    if ($query->affected_rows > 0) {
        echo ("done bra or9od");
    } else {
        echo ("hell nah");
    }
} else {
    echo "nnnoooo";
}
