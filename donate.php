<?php
include 'connect.php';

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
        echo ("donations sent !");
    } else {
        echo ("whoops....");
    }
}
